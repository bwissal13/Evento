<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Event;
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
    //     // $data = $request->validate([
    //     //     'user_id' => 'required|exists:users,id',
    //     //     'event_id' => 'required|exists:events,id',
    //     //     'auto_approve' => 'boolean',
    //     // ]);
        
    //     // Add the authenticated user's ID to the data
        
    //     $inp = $request->all();
    //     $inp['user_id'] = Auth::id();
    //     $ap = Event::where("auto_accept" , " = " , $inp["event_id"] )->first();
    //     $inp["auto_accept"] = $ap["auto_accept"];
    //     // dd($inp);

    //     // Create the reservation
    //     Reservation::create($inp);
        
    //     // // Redirect or respond as needed
    //     return redirect()->route('reservations.index')->with('success', 'Reservation created successfully!');
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
    
        // Get the related event and fetch its auto_approve value
        $event = Event::find($input['event_id']);
    
        if ($event) {
            $input['auto_approve'] = $event->auto_accept;
        }
    
        // Create the reservation
        $reservation = Reservation::create($input);
        if ($reservation->status === 'confirmed') {
            // Redirect to the ticket page
            return redirect()->route('tickets.generate', $reservation)->with('success', 'Reservation confirmed. You can download your ticket.');
        }
        // Redirect or respond as needed
        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully!');
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
