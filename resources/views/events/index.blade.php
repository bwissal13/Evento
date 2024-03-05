<!DOCTYPE html>
<html lang="en" class="dark-mode">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-white">

    <div id="last-events" class="bg-gray-900 p-4">
        <h1 class="font-bold py-4 uppercase text-white">Upcoming Events</h1>
        <div class="overflow-x-scroll">
            <table class="w-full whitespace-nowrap">
                <thead class="bg-gray-800">
                    <th class="text-left py-3 px-2 rounded-l-lg text-white">Title</th>
                    <th class="text-left py-3 px-2 text-white">Date</th>
                    <th class="text-left py-3 px-2 text-white">Location</th>
                    <th class="text-left py-3 px-2 text-white">Description</th>
                    <th class="text-left py-3 px-2 rounded-r-lg text-white">Actions</th>
                </thead>
                @foreach($events as $event)
                    <tr class="border-b border-gray-700">
                        <td class="py-3 px-2 font-bold text-white">{{ $event->title }}</td>
                        <td class="py-3 px-2 text-white">{{ $event->date }}</td>
                        <td class="py-3 px-2 text-white">{{ $event->location }}</td>
                        <td class="py-3 px-2 text-white">{{ $event->description }}</td>
                        <td class="py-3 px-2">
                            <div class="inline-flex items-center space-x-3">
                                <a href="{{ route('events.show', $event->id) }}" title="View" class="hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <!-- Icon for View action -->
                                    </svg>
                                </a>
                                <a href="{{ route('events.edit', $event->id) }}" title="Edit" class="hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                </a>
                                <a href="{{ route('events.show', $event->id) }}" title="Edit password" class="hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this event?')">
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

</html>
