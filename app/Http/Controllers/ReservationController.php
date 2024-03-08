<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'event'])->get();

        return view('reservations.index', compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  
    
    // public function store(Request $request)
    // {
    //     // Validate the incoming request data
    //     $request->validate([
    //         'event_id' => 'required|exists:events,id',
    //         'auto_approve' => 'boolean',
    //     ]);
    
    //     // Add the authenticated user's ID to the data
    //     $input = $request->all();
    //     $input['user_id'] = Auth::id();
    
    //     // Check if the user already has a reservation for the event
    //     $existingReservation = Reservation::where('user_id', $input['user_id'])
    //         ->where('event_id', $input['event_id'])
    //         ->first();
    
    //     if ($existingReservation) {
    //         // Check if the reservation is confirmed
    //         if ($existingReservation->status === 'confirmed') {
    //             // Generate a ticket code
    //             $ticketCode = 'TICKET-' . rand(1000, 9999);
    
    //             // Create a new ticket
    //             $ticket = new Ticket([
    //                 'reservation_id' => $existingReservation->id,
    //                 'ticket_code' => $ticketCode,
    //             ]);
    //             $ticket->save();
    
    //             // Redirect to the ticket page
    //             return redirect()->route('tickets.generate', $existingReservation)->with('success', 'Reservation confirmed. You can download your ticket.');
    //         } else {
    //             // Reservation status is not confirmed, show a message
    //             return back()->with('error', 'Reservation status is not confirmed yet.');
    //         }
    //     }
    
    //     // Create the reservation
    //     $reservation = Reservation::create($input);
    
    //     if ($reservation->status === 'confirmed') {
    //         // Generate a ticket code
    //         $ticketCode = 'TICKET-' . rand(1000, 9999);
    
    //         // Create a new ticket
    //         $ticket = new Ticket([
    //             'reservation_id' => $reservation->id,
    //             'ticket_code' => $ticketCode,
    //         ]);
    //         $ticket->save();
    
    //         // Redirect to the ticket page
    //         return redirect()->route('tickets.generate', $reservation)->with('success', 'Reservation confirmed. You can download your ticket.');
    //     } else {
    //         // Reservation status is not confirmed, show a message
    //         return redirect()->route('reservations.index')->with('error', 'Reservation status is not confirmed yet.');
    //     }
    // }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'auto_approve' => 'boolean',
        ]);

        // Add the authenticated user's ID to the data
        $input = $request->all();
        $input['user_id'] = Auth::id();

        // Check if the user already has a reservation for the event
        $existingReservation = Reservation::where('user_id', $input['user_id'])
            ->where('event_id', $input['event_id'])
            ->first();

        // Check if there are available seats in the associated event
        $event = Event::find($input['event_id']);
        if (!$event || $event->available_seats <= 0) {
            // No available seats, show a message
            return back()->with('error', 'No available seats for this event.');
        }

        if ($existingReservation) {
            // Check if the reservation is confirmed
            if ($existingReservation->status === 'confirmed') {
                // Generate a ticket code
                $ticketCode = 'TICKET-' . rand(1000, 9999);

                // Create a new ticket
                $ticket = new Ticket([
                    'reservation_id' => $existingReservation->id,
                    'ticket_code' => $ticketCode,
                ]);
                $ticket->save();

                // Redirect to the ticket page
                return redirect()->route('tickets.generate', $existingReservation)->with('success', 'Reservation confirmed. You can download your ticket.');
            } else {
                // Reservation status is not confirmed, show a message
                return back()->with('error', 'Reservation status is not confirmed yet.');
            }
        }

        // Create the reservation
        $reservation = Reservation::create($input);

        // Update available seats in the associated event
        $event->decrement('available_seats');

        // Save the changes to the database
        $event->save();

        if ($reservation->status === 'confirmed') {
            // Generate a ticket code
            $ticketCode = 'TICKET-' . rand(1000, 9999);

            // Create a new ticket
            $ticket = new Ticket([
                'reservation_id' => $reservation->id,
                'ticket_code' => $ticketCode,
            ]);
            $ticket->save();

            // Redirect to the ticket page
            return redirect()->route('tickets.generate', $reservation)->with('success', 'Reservation confirmed. You can download your ticket.');
        } else {
            // Reservation status is not confirmed, show a message
            return redirect()->route('reservations.index')->with('error', 'Reservation status is not confirmed yet.');
        }
    }

    
    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('tickets.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        // Check if the authenticated user is the owner of the event
        if (Auth::id() == $reservation->event->user_id) {
            return view('reservations.edit', compact('reservation'));
        } else {
            // Redirect or respond with an error if the user is not authorized
            return redirect()->route('reservations.index')->with('error', 'You are not authorized to edit this reservation.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reservation $reservation)
    {
        // Check if the authenticated user is the owner of the event
        if (Auth::id() == $reservation->event->user_id) {
            $request->validate([
                'status' => 'required|in:pending,confirmed,canceled',
            ]);

            $reservation->update(['status' => $request->status]);

            return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
        } else {
            // Redirect or respond with an error if the user is not authorized
            return redirect()->route('reservations.index')->with('error', 'You are not authorized to update this reservation.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Reservation deleted successfully!');
    }
}
