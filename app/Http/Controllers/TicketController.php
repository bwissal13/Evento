<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Reservation;
use PDF;
use Dompdf\Options;

class TicketController extends Controller
{
  

// public function generate($reservation)
// {
//     // Logic to fetch reservation and related event details
//     $reservation = Reservation::findOrFail($reservation);
//     $event = $reservation->event;

//     // Generate a random ticket code
//     $randomlyGeneratedCode = 'TICKET-' . rand(1000, 9999);

//     // Generate PDF content (you may need to customize this based on your needs)
//     $pdf = PDF::loadView('tickets.ticket', compact('reservation', 'event', 'randomlyGeneratedCode'));

//     // Return the PDF as a download
//     return $pdf->download('ticket.pdf');
// }
// In your TicketController.php



public function generate($reservation)
{
    // Logic to fetch reservation and related event details
    $reservation = Reservation::findOrFail($reservation);
    $event = $reservation->event;

    // Generate a random ticket code
    $randomlyGeneratedCode = 'TICKET-' . rand(1000, 9999);

    // Save ticket information to the database
    $ticket = new Ticket([
        'reservation_id' => $reservation->id,
        'ticket_code' => $randomlyGeneratedCode,
    ]);
    $ticket->save();

    // Generate PDF content (you may need to customize this based on your needs)
    $pdf = PDF::loadView('tickets.ticket', compact('reservation', 'event', 'randomlyGeneratedCode'));

    // Return the PDF as a download
    return $pdf->download('ticket.pdf');
}

}

