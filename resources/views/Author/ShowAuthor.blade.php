<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                   
                    <div class="overflow-x-auto">
                        <h1 class="text-2xl font-bold mb-4">Author: {{$author->name}} </h1>
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-6">Email:</div>
                            <div class="col-span-6"> {{$author->email}}</div>
                            <div class="col-span-6">Website:</div>
                            <div class="col-span-6">{{$author->website}}</div>
                            <div class="col-span-6">Phone:</div>
                            <div class="col-span-6">{{$author->phone}}</div>
                            <div class="col-span-6">Biography:</div>
                            <div class="col-span-6">{{$author->biography}}</div>
                            <div class="col-span-6">Date:</div>
                            <div class="col-span-6">{{$author->birth_date}}</div>
                            <div class="col-span-6">Country:</div>
                            <div class="col-span-6">{{$author->country}}</div>
                        </div>
                    </div>
                    <form action="" class="flex justify-center gap-4 mt-4">
                        <a href="{{ route('authors.index') }}" class="bg-red-500 p-2 rounded hover:bg-red-600 text-white text-center shadow-xl inline-block w-[100px]">Back</a>
                        <a href="{{ route('authors.edit', $author->id) }}"
                            class="bg-green-500 p-2 text-center rounded hover:bg-green-600 text-white shadow-xl inline-block w-[100px]">
                            Edit
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
