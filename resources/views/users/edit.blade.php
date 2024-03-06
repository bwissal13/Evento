@extends('dashboard.layout')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-6 text-white">Edit User Roles</h1>

        <form action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-white dark:text-white">User Name</label>
                    <input type="text" id="name" name="name" value="{{ $user->name }}" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="User Name" required readonly />
                </div>
            </div>

            <div class="mb-6">
                <label for="roles" class="block mb-2 text-sm font-medium text-white dark:text-white">Select Roles</label>
                <select id="roles" name="roles[]" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" multiple required>
                    @foreach($roles as $roleName => $roleValue)
                        <option value="{{ $roleName }}" {{ $user->hasRole($roleName) ? 'selected' : '' }}>{{ $roleValue }}</option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-6">
                <button type="submit" class="bg-custom-color hover:bg-gray-700 text-white py-2 px-4 rounded-lg focus:outline-none focus:ring focus:border-blue-300 transition-all duration-300">Update User Roles</button>
            </div>
        </form>
    </div>
@endsection
