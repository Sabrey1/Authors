
<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg overflow-hidden">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                         <form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="text-center text-3xl">
                                <h1>Edit Author</h1>
                            </div>
                            <div>
                                <label for="name">
                                    <span class="text-gray-700 dark:text-gray-300 text-lg font-semibold">Name</span>
                                </label>
                                <br>
                                <input type="text" name="name" id="name" value="{{ $author->name }}" class="w-full rounded-sm" placeholder="Please Enter Author Name">
                            </div>
                            <div class="mt-3">
                                <label for="email">
                                    <span class="text-gray-700 dark:text-gray-300 text-lg font-semibold">Email</span>
                                </label>
                                <br>
                                <input type="email" name="email" id="email" value="{{ $author->email }}" class="w-full rounded-sm" placeholder="Please Enter Email">
                            </div>
                            <div class="mt-3">
                                <label for="website">
                                    <span class="text-gray-700 dark:text-gray-300 text-lg font-semibold">Website</span>
                                </label>
                                <br>
                                <input type="text" name="website" id="website" value="{{ $author->website }}" class="w-full rounded-sm" placeholder="Please Enter website">
                            </div>
                            <div class="mt-3">
                                <label for="phone">
                                    <span class="text-gray-700 dark:text-gray-300 text-lg font-semibold">Phone</span>
                                </label>
                                <br>
                                <input type="number" name="phone" id="phone" value="{{ $author->phone }}" class="w-full rounded-sm" placeholder="Please Enter Phone">
                            </div>
                            <div class="mt-3">
                                <label for="biography">
                                    <span class="text-gray-700 dark:text-gray-300 text-lg font-semibold">Biography</span>
                                </label>
                                <br>
                                <input type="text" name="biography" id="biography" value="{{ $author->biography }}" class="w-full rounded-sm" placeholder="Please Enter biography">
                            </div>
                            <div class="mt-3">
                                <label for="birth_date">
                                    <span class="text-gray-700 dark:text-gray-300 text-lg font-semibold">Date</span>
                                </label>
                                <br>
                                <input type="date" name="birth_date" id="birth_date" value="{{ $author->birth_date }}" class="w-full rounded-sm" placeholder="Please Enter website">
                            </div>
                            <div class="mt-3">
                                <label for="country">
                                    <span class="text-gray-700 dark:text-gray-300 text-lg font-semibold">Country</span>
                                </label>
                                <br>
                                <select id="country" name="country"
                                    class="w-full rounded-sm border-gray-300 focus:ring focus:ring-blue-200 focus:border-blue-400 p-2">
                                    <option value="" disabled {{ $author->country ? '' : 'selected' }}>Please select your country</option>
                                    <option value="Cambodia" {{ $author->country == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
                                    <option value="Vietnam" {{ $author->country == 'Vietnam' ? 'selected' : '' }}>Vietnam</option>
                                    <option value="Laos" {{ $author->country == 'Laos' ? 'selected' : '' }}>Laos</option>
                                    <option value="Malaysia" {{ $author->country == 'Malaysia' ? 'selected' : '' }}>Malaysia</option>
                                    <option value="Singapore" {{ $author->country == 'Singapore' ? 'selected' : '' }}>Singapore</option>
                                    <option value="Philippines" {{ $author->country == 'Philippines' ? 'selected' : '' }}>Philippines</option>
                                    <option value="Indonesia" {{ $author->country == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                                </select>
                            </div>
                        <div class="mt-4 flex gap-4">
                            <a href="{{ route('authors.index') }}" class="bg-red-500 p-2 rounded text-white hover:bg-red-600 w-full text-center">Cancel</a>
                            <button type="submit" class="bg-green-500 p-2 rounded text-white hover:bg-green-600 w-full">Save</button>
                        </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
