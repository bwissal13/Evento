@extends('dashboard.layout')
@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-6">Edit Event</h1>
        <form action="{{ route('events.update', $event->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-white dark:text-white">Event Title</label>
                    <input type="text" id="title" name="title" value="{{ $event->title }}" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Event Title" required />
                </div>
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-white dark:text-white">Event Description</label>
                    <textarea id="description" name="description" rows="4" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Event Description" required>{{ $event->description }}</textarea>
                </div>
                <div>
                    <label for="date" class="block mb-2 text-sm font-medium text-white dark:text-white">Event Date</label>
                    <input type="date" id="date" name="date" value="{{ \Carbon\Carbon::parse($event->date)->format('Y-m-d') }}" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>
                <div>
                    <label for="location" class="block mb-2 text-sm font-medium text-white dark:text-white">Event Location</label>
                    <input type="text" id="location" name="location" value="{{ $event->location }}" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Event Location" required />
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-white dark:text-white">Event Category</label>
                    <select id="category" name="category_id" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $event->category_id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="available_seats" class="block mb-2 text-sm font-medium text-white dark:text-white">Available Seats</label>
                    <input type="number" id="available_seats" name="available_seats" value="{{ $event->available_seats }}" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Available Seats" required />
                </div>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-custom-color hover:bg-gray-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300 transition-all duration-300">Update Event</button>

            </div>
           
        </form>
    </div>
@endsection