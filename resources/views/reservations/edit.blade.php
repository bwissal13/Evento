@extends('dashboard.layout')
@section('content')

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-6 uppercase">Edit Reservation</h1>
        <form action="{{ route('reservations.update', $reservation->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="status" class="block mb-2 text-sm font-bold text-white">Reservation Status</label>
                    <select id="status" name="status" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                        @foreach(['pending', 'confirmed', 'canceled'] as $status)
                            <option value="{{ $status }}" {{ $reservation->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                        @endforeach
                    </select>
                </div>
             
            </div>

            <div class="mb-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-bold rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update Reservation</button>
            </div>
        </form>
    </div>
@endsection
