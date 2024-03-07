@extends('dashboard.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6 uppercase">Reservation Details</h1>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <strong>Status:</strong> {{ $reservation->status }}
            </div>
            <div>
                <strong>Auto Approve:</strong> {{ $reservation->auto_approve ? 'Yes' : 'No' }}
            </div>
            <div>
                <strong>User:</strong> {{ $reservation->user->name }}
            </div>
            <div>
                <strong>Event ID:</strong> {{ $reservation->event_id }}
            </div>
            <div>
                <strong>Created At:</strong> {{ $reservation->created_at }}
            </div>
            <div>
                <strong>Updated At:</strong> {{ $reservation->updated_at }}
            </div>
        </div>

       
        @if($reservation->status == 'confirmed')
        <form id="generatePdfForm" action="{{ route('tickets.generate', $reservation->id) }}" method="get" class="mt-6">
            @csrf
            <button type="button" onclick="generatePdf()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm px-4 py-2">Generate PDF Ticket</button>
        </form>
        
        @endif
    </div>

    <script>
        function generatePdf() {
            // Submit the form using JavaScript
            document.getElementById('generatePdfForm').submit();
        }
    </script>
@endsection
