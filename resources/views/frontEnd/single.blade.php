@extends('layout.layout')
@section('content')
<section>
    <div class="single-event-wrap">
        <!-- ... other HTML code ... -->
        <div class="single-event-content-wrap grid grid-cols-12 gap-20">
            <div class="event-thumbnail col-span-5 sm:col-span-12 res:col-span-12">
                <div class="thumb-inner">
                    <a href="#">
                        {{-- <img src="{{ asset($event->image) }}" alt="single-event"> --}}
                    </a>
                    <span></span>
                </div>
            </div>
            <div class="event-content-wrap col-span-7 sm:col-span-12 res:col-span-12">
                <div class="event-head clearfix">
                    <div class="category-event">
                        <ul class="category">
                            <li>{{ $event->category->name }}</li>
                        </ul>
                    </div>
                    <div class="the-title">
                        <h2>{{ $event->title }}</h2>
                    </div>
                    <div class="event-date">
                        {{ $event->date}}
                    </div>
                </div>
                <div class="event-content clearfix">
                    <p>{{ $event->description }}</p>
                </div>
                <div class="event-details clearfix">
                    <table class="event-detail-table">
                        <tbody>
                            <tr>
                                <td class="tab-title">Location</td>
                                <td class="tab-content italic">{{ $event->location }}</td>
                            </tr>
                            <tr>
                                <td class="tab-title">Available Seats</td>
                                <td class="tab-content italic">{{ $event->available_seats }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div> 
                
                @auth
                <form method="POST" action="{{ route('reservations.store') }}">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <button type="submit" class="reserve-button bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Reserve
                    </button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</section>
@endsection
