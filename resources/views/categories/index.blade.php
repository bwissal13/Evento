{{-- <!DOCTYPE html>
<html lang="en" class="dark-mode">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-white">

    <div id="last-categories" class="bg-gray-900 p-4">
        <h1 class="font-bold py-4 uppercase text-white">Categories</h1>
        <div class="overflow-x-scroll">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-gray-800">
                    <th class="text-left py-3 px-2 rounded-l-lg text-white">Name</th>
                    <th class="text-left py-3 px-2 text-white">Description</th>
                    <th class="text-left py-3 px-2 rounded-r-lg text-white">Actions</th>
                </thead>
                @foreach($categories as $category)
                    <tr class="border-b border-gray-700">
                        <td class="py-3 px-2 font-bold text-white">{{ $category->name }}</td>
                        <td class="py-3 px-2 text-white">{{ $category->description }}</td>
                        <td class="py-3 px-2">
                            <div class="inline-flex items-center space-x-3">
                                <a href="{{ route('categories.show', $category->id) }}" title="View" class="hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <!-- Icon for View action -->
                                    </svg>
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}" title="Edit" class="hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete" class="hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

</body>

</html> --}}

@extends('dashboard.layout')
@section('content')
    <div id="last-categories" class="p-4">
    
        <div class="flex justify-between items-center mb-4">
            <h1 class="font-bold uppercase text-white">Categories</h1>
            <a href="{{ route('categories.create') }}" class="bg-custom-color hover:bg-gray-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300 transition-all duration-300">Add Category</a>
        </div>
        <div class="">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-black/60">
                    <th class="text-left py-3 px-2 rounded-l-lg text-white">Name</th>
                    <th class="text-left py-3 px-2 rounded-r-lg text-white">Actions</th>
                </thead>
                @foreach($categories as $category)
                    <tr class="border-b border-gray-700">
                        <td class="py-3 px-2 font-bold text-white">{{ $category->name }}</td>

                        <td class="py-3 px-2">
                            <div class="inline-flex items-center space-x-3">
                                <a href="{{ route('categories.show', $category->id) }}" title="View" class="hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <!-- Icon for View action -->
                                    </svg>
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}" title="Edit" class="hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" title="Delete" class="hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @endsection
