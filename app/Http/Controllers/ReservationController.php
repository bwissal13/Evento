<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;

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
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'event_id' => 'required|exists:events,id',
            'auto_approve' => 'boolean',
        ]);
    
        Reservation::create($data);
    
        return redirect()->route('reservations.index')->with('success', 'Reservation created successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('reservations.edit', compact('reservation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
    
        $data = $request->validate([
            'auto_approve' => 'boolean',
        ]);
    
        $reservation->update($data);
    
        return redirect()->route('reservations.index')->with('success', 'Reservation updated successfully!');
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
