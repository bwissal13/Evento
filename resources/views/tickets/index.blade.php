@extends('dashboard.layout')

@section('content')
    <div class="grid grid-cols-12 mx-auto gap-2 sm:gap-4 md:gap-6 lg:gap-10 xl:gap-14 max-w-7xl my-10 px-2">
        <div class="col-span-9">
            <h1 class="font-bold text-lg lg:text-3xl bg-gradient-to-br from-white via-white/50 to-transparent bg-clip-text text-transparent">
                Tickets
            </h1>

            @forelse ($tickets as $ticket)
                <div class="bg-white/10 rounded-lg p-4 mb-4">
                    <p class="font-bold text-lg text-slate-200">Ticket Code: {{ $ticket->ticket_code }}</p>
                    <p class="text-slate-400">Event: {{ $ticket->reservation->event->name }}</p>
                    <!-- Add more ticket details here -->
                </div>
            @empty
                <p class="text-slate-400">No tickets available.</p>
            @endforelse
        </div>
    </div>
@endsection
