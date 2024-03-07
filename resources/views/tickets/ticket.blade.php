<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Event Ticket</title>
    <style>
        /* Add your custom styles for the ticket here */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .ticket-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #FF2C55; /* Set the border color to #FF2C55 */
            border-radius: 10px; /* Add border-radius for rounded corners */
            background-color: black; /* Set the container background color to black */
            color: white; /* Set the text color to white */
        }

        .ticket-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .event-details, .reservation-details {
            margin-bottom: 20px;
        }

        .reservation-details p {
            margin-bottom: 10px;
        }

        /* Style the h2 and h3 elements */
        h2, h3 {
            color: #FF2C55; /* Set the text color to #FF2C55 */
            margin-bottom: 10px;
        }

        /* Style strong elements */
        strong {
            color: white; /* Set the text color to white */
        }
    </style>
</head>
<body>

<div class="ticket-container">
    <div class="ticket-header">
        <h2>Your Event Ticket</h2>
    </div>

    <div class="event-details">
        <h3>Event Details</h3>
        <p><strong>Event:</strong> {{ $event->title }}</p>
        <p><strong>Date:</strong> {{ $event->date }}</p>
        <p><strong>Location:</strong> {{ $event->location }}</p>
    </div>

    <div class="reservation-details">
        <h3>Reservation Details</h3>
        <p><strong>Reservation Code:</strong> {{ $randomlyGeneratedCode }}</p>
        <p><strong>User:</strong> {{ $reservation->user->name }}</p>
        <p><strong>Amount:</strong> {{ $event->price }}</p>
        <!-- Add other reservation details as needed -->
    </div>
</div>

</body>
</html>
