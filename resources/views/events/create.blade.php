@extends('dashboard.layout')
@section('content')

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6 uppercase">Create Event</h1>
        <form action="{{ route('events.store') }}" method="post">
            @csrf

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="title" class="block mb-2 text-sm font-bold text-white">Event Title</label>
                    <input type="text" id="title" name="title" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Event Title" required />
                </div>
                <div>
                    <label for="description" class="block mb-2 text-sm font-bold text-white">Event Description</label>
                    <textarea id="description" name="description" rows="4" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Event Description" required></textarea>
                </div>
                <div>
                    <label for="date" class="block mb-2 text-sm font-bold text-white">Event Date</label>
                    <input type="date" id="date" name="date" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                </div>
                <div>
                    <label for="location" class="block mb-2 text-sm font-bold text-white">Event Location</label>
                    <input type="text" id="location" name="location" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Event Location" required />
                </div>
                <div>
                    <label for="category" class="block mb-2 text-sm font-bold text-white">Event Category</label>
                    <select id="category" name="category_id" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="available_seats" class="block mb-2 text-sm font-bold text-white">Available Seats</label>
                    <input type="number" id="available_seats" name="available_seats" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Available Seats" required />
                </div>
                <div>
                    <label for="price" class="block mb-2 text-sm font-bold text-white">Price</label>
                    <input type="number" id="price" name="price" step="0.01" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Price" required />
                </div>
                <div>
                    <label for="auto_accept" class="block mb-2 text-sm font-bold text-white">Auto Accept</label>
                    <input type="hidden" name="auto_accept" value="0">
                    <input type="checkbox" id="auto_accept" name="auto_accept" value="1" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
                </div>
            </div>

            <div class="mb-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Event</button>
            </div>
        </form>
    </div>
@endsection
