<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Books') }}
            </h2>
            @auth
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('books.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-600 transition">
                        {{ __('Add Book') }}
                    </a>
                @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            @if (session('success'))
                <div
                    class="mb-4 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 rounded-lg">
                    {{ session('success') }}
    </div>
            @endif

            <!-- Search Bar -->
            <div class="mb-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form method="GET" action="{{ route('books.index') }}" class="flex gap-4">
                    <input type="text" name="search" value="{{ $search ?? '' }}"
                        placeholder="Search books by name..."
                        class="flex-1 rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600" />
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white transition">
                        Search
                    </button>
                    @if ($search)
                        <a href="{{ route('books.index') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-600 transition">
                            Clear
                        </a>
                    @endif
                </form>
            </div>

            <!-- Books Grid -->
            @if ($books->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($books as $book)
                        <div
                            class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                            <a href="{{ route('books.show', $book->id) }}">
                                @if ($book->image)
                                    <div class="flex justify-center items-center bg-gray-100 dark:bg-gray-700"
                                        style="height: 200px;">
                                        <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->name }}"
                                            class="w-[120px] h-[160px] object-contain rounded-md shadow-md">
                                    </div>
                                @else
                                    <div class="w-full h-36 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                        <span class="text-gray-400 dark:text-gray-500 text-3xl">📚</span>
                                    </div>
                                @endif
                            </a>

                            <div class="p-4">
                                <a href="{{ route('books.show', $book->id) }}">
                                    <h3
                                        class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-2 hover:text-blue-600 dark:hover:text-blue-400 truncate">
                                        {{ $book->name }}
                                    </h3>
                                </a>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-1">
                                    <span class="font-semibold">Author:</span> {{ $book->author }}
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                                    <span class="font-semibold">Publisher:</span> {{ $book->publisher }}
                                </p>

                                <div class="flex items-center justify-between">
                                    <div>
                                        @if ($book->discount)
                                            @php
                                                $discountedPrice = $book->price - ($book->price * $book->discount / 100);
                                            @endphp
                                            <div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-sm text-gray-500 dark:text-gray-400 line-through">
                                                        ${{ number_format($book->price, 2) }}
                                                    </span>
                                                    <span class="text-xs bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 px-2 py-1 rounded">
                                                        {{ $book->discount }}% OFF
                                                    </span>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="text-sm font-semibold text-gray-700 dark:text-gray-300">Discounted Price:</span>
                                                    <span class="text-lg font-bold text-green-600 dark:text-green-400">
                                                        ${{ number_format($discountedPrice, 2) }}
                                                    </span>
                                                </div>
                                            </div>
                                        @else
                                            <span class="text-lg font-bold text-green-600 dark:text-green-400">
                                                ${{ number_format($book->price, 2) }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-center">
                    <p class="text-gray-600 dark:text-gray-400">
                        @if ($search)
                            No books found matching "{{ $search }}".
                        @else
                            No books available yet.
                        @endif
                    </p>
                </div>
            @endif
            </div>
    </div>
</x-app-layout>
