<!DOCTYPE html>
<html lang="en" class="dark-mode">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-white">

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-6">Create Category</h1>
        <form action="{{ route('categories.store') }}" method="post">
            @csrf

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-white dark:text-white">Category Name</label>
                    <input type="text" id="name" name="name" class="dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Category Name" required />
                </div>
              
            </div>

            <div class="mb-6">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Category</button>
            </div>
        </form>
    </div>

</body>

</html>
