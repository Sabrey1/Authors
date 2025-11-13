<x-app-layout>
    <x-slot name="header">
        <div class="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Authors List') }}
        </h2>
        <a href="{{ route('authors.create') }}"
            class="bg-green-500 p-2 rounded hover:bg-green-600 text-white shadow-xl inline-block">
            Create Author
        </a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="overflow-x-auto">
                        <form method="GET" action="{{ route('authors.index') }}" class="mb-4">
                            <input type="text" name="search" placeholder="Search by name or email" 
                                value="{{ request('search') }}" class="border p-2 rounded">
                            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Search</button>
                        </form>
                        <table class="w-full text-sm text-left border border-gray-200 dark:border-gray-700 rounded-lg">
                            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 uppercase text-xs font-semibold">
                                <tr>
                                    <th class="px-4 py-3">NO</th>
                                    <th class="px-4 py-3">Name</th>
                                    <th class="px-4 py-3">Email</th>
                                    <th class="px-4 py-3">Website</th>
                                    <th class="px-4 py-3">Birth Date</th>
                                    <th class="px-4 py-3">Country</th>
                                    <th class="px-4 py-3 text-center">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($authors as $author)
                                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-900 transition">
                                        <td class="px-4 py-2">{{ $loop->iteration + ($authors->currentPage() - 1) * $authors->perPage() }}</td>
                                        <td class="px-4 py-2 font-medium text-gray-800 dark:text-gray-100">{{ $author->name }}</td>
                                        <td class="px-4 py-2">{{ $author->email ?? '-' }}</td>
                                        <td class="px-4 py-2">
                                            @if ($author->website)
                                                <a href="{{ $author->website }}" class="text-blue-600 hover:underline" target="_blank">
                                                    {{ $author->website }}
                                                </a>
                                            @else
                                                <span class="text-gray-400">—</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2">{{ $author->birth_date ?? '-' }}</td>
                                        <td class="px-4 py-2">{{ $author->country ?? '-' }}</td>
                                        <td class="px-4 py-2 text-center">
                                            <div class="flex justify-center gap-2">
                                                <a href="{{ route('authors.show', $author->id) }}" class="text-green-600 hover:text-green-800">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                <a href="{{ route('authors.edit', $author->id) }}" class="text-blue-600 hover:text-blue-800">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form method="POST" action="{{ route('authors.destroy', $author->id) }}" onsubmit="return confirm('Are you sure?')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                         <div class="mt-4">
                            {{ $authors->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
