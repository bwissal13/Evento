@extends('dashboard.layout')
@section('content')
<div class="container mx-auto mt-8">
    <h1 class="text-3xl font-semibold mb-6 text-white">Create Category</h1>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf

        <div class="grid gap-6 mb-6 md:grid-cols-2">
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-white dark:text-white">Category Name</label>
                <input type="text" id="name" name="name" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Category Name" required />
            </div>
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-custom-color hover:bg-gray-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300 transition-all duration-300">Create Category</button>
        </div>
    </form>
</div>


@endsection