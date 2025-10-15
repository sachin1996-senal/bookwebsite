<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $book->name }}
            </h2>
            <a href="{{ route('books.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white transition">
                Back to Books
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Book Details -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Book Image -->
                        <div class="md:col-span-1 flex justify-center">
                            @if ($book->image)
                                <img src="{{ asset('images/' . $book->image) }}" alt="{{ $book->name }}"
                                    class="w-[200px] h-[280px] object-contain rounded-lg shadow-lg">
                            @else
                                <div
                                    class="w-[200px] h-[280px] bg-gray-200 dark:bg-gray-700 flex items-center justify-center rounded-lg">
                                    <span class="text-gray-400 dark:text-gray-500 text-5xl">📚</span>
                                </div>
                            @endif
                        </div>

                        <!-- Book Information -->
                        <div class="md:col-span-2">
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">{{ $book->name }}
                            </h1>

                            <div class="space-y-3 mb-6">
                                <div class="flex items-center">
                                    <span class="font-semibold text-gray-700 dark:text-gray-300 w-32">Author:</span>
                                    <span class="text-gray-600 dark:text-gray-400">{{ $book->author }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="font-semibold text-gray-700 dark:text-gray-300 w-32">Publisher:</span>
                                    <span class="text-gray-600 dark:text-gray-400">{{ $book->publisher }}</span>
                                </div>
                                <div class="flex items-center">
                                    <span class="font-semibold text-gray-700 dark:text-gray-300 w-32">Price:</span>
                                    @if ($book->discount)
                                        @php
                                            $discountedPrice = $book->price - ($book->price * $book->discount) / 100;
                                        @endphp
                                        <div>
                                            <div class="flex items-center gap-3">
                                                <span class="text-lg text-gray-500 dark:text-gray-400 line-through">
                                                    ${{ number_format($book->price, 2) }}
                                                </span>
                                                <span
                                                    class="bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 px-3 py-1 rounded-full text-sm font-semibold">
                                                    {{ $book->discount }}% OFF
                                                </span>
                                            </div>
                                        </div>
                                    @else
                                        <span class="text-2xl font-bold text-green-600 dark:text-green-400">
                                            ${{ number_format($book->price, 2) }}
                                        </span>
                                    @endif
                                </div>
                                @if ($book->discount)
                                    @php
                                        $discountedPrice = $book->price - ($book->price * $book->discount) / 100;
                                    @endphp
                                    <div class="flex items-center">
                                        <span class="font-semibold text-gray-700 dark:text-gray-300 w-32">Discounted
                                            Price:</span>
                                        <span class="text-2xl font-bold text-green-600 dark:text-green-400">
                                            ${{ number_format($discountedPrice, 2) }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            @if ($book->description)
                                <div class="mb-6">
                                    <h3 class="font-semibold text-gray-700 dark:text-gray-300 mb-2">Description:</h3>
                                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                        {{ $book->description }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Other Books by Same Author -->
            @if ($booksByAuthor->count() > 0)
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Other Books by
                        {{ $book->author }}</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                        @foreach ($booksByAuthor as $relatedBook)
                            <div
                                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                                <a href="{{ route('books.show', $relatedBook->id) }}">
                                    <div class="flex justify-center items-center bg-gray-100 dark:bg-gray-700"
                                        style="height: 140px;">
                                        @if ($relatedBook->image)
                                            <img src="{{ asset('images/' . $relatedBook->image) }}"
                                                alt="{{ $relatedBook->name }}"
                                                class="w-[80px] h-[110px] object-contain">
                                        @else
                                            <span class="text-gray-400 dark:text-gray-500 text-xl">📚</span>
                                        @endif
                                    </div>
                                    <div class="p-3">
                                        <h3
                                            class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate hover:text-blue-600 dark:hover:text-blue-400">
                                            {{ $relatedBook->name }}
                                        </h3>
                                        @if ($relatedBook->discount)
                                            @php
                                                $relatedDiscountedPrice =
                                                    $relatedBook->price -
                                                    ($relatedBook->price * $relatedBook->discount) / 100;
                                            @endphp
                                            <div class="mt-1">
                                                <div class="flex items-center gap-1 flex-wrap">
                                                    <p class="text-xs text-gray-500 dark:text-gray-400 line-through">
                                                        ${{ number_format($relatedBook->price, 2) }}
                                                    </p>
                                                    <span
                                                        class="text-xs bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 px-1 py-0.5 rounded">
                                                        {{ $relatedBook->discount }}% OFF
                                                    </span>
                                                </div>
                                                <div class="flex items-center gap-1">
                                                    <p class="text-xs font-medium text-gray-700 dark:text-gray-300">
                                                        Discounted Price:</p>
                                                    <p class="text-sm font-bold text-green-600 dark:text-green-400">
                                                        ${{ number_format($relatedDiscountedPrice, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        @else
                                            <p class="text-sm font-bold text-green-600 dark:text-green-400 mt-1">
                                                ${{ number_format($relatedBook->price, 2) }}
                                            </p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Other Books by Same Publisher -->
            @if ($booksByPublisher->count() > 0)
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-4">Other Books from
                        {{ $book->publisher }}</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
                        @foreach ($booksByPublisher as $relatedBook)
                            <div
                                class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                                <a href="{{ route('books.show', $relatedBook->id) }}">
                                    <div class="flex justify-center items-center bg-gray-100 dark:bg-gray-700"
                                        style="height: 140px;">
                                        @if ($relatedBook->image)
                                            <img src="{{ asset('images/' . $relatedBook->image) }}"
                                                alt="{{ $relatedBook->name }}"
                                                class="w-[80px] h-[110px] object-contain">
                                        @else
                                            <span class="text-gray-400 dark:text-gray-500 text-xl">📚</span>
                                        @endif
                                    </div>
                                    <div class="p-3">
                                        <h3
                                            class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate hover:text-blue-600 dark:hover:text-blue-400">
                                            {{ $relatedBook->name }}
                                        </h3>
                                        @if ($relatedBook->discount)
                                            @php
                                                $relatedDiscountedPrice =
                                                    $relatedBook->price -
                                                    ($relatedBook->price * $relatedBook->discount) / 100;
                                            @endphp
                                            <div class="mt-1">
                                                <div class="flex items-center gap-1 flex-wrap">
                                                    <p class="text-xs text-gray-500 dark:text-gray-400 line-through">
                                                        ${{ number_format($relatedBook->price, 2) }}
                                                    </p>
                                                    <span
                                                        class="text-xs bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 px-1 py-0.5 rounded">
                                                        {{ $relatedBook->discount }}% OFF
                                                    </span>
                                                </div>
                                                <div class="flex items-center gap-1">
                                                    <p class="text-xs font-medium text-gray-700 dark:text-gray-300">
                                                        Discounted Price:</p>
                                                    <p class="text-sm font-bold text-green-600 dark:text-green-400">
                                                        ${{ number_format($relatedDiscountedPrice, 2) }}
                                                    </p>
                                                </div>
                                            </div>
                                        @else
                                            <p class="text-sm font-bold text-green-600 dark:text-green-400 mt-1">
                                                ${{ number_format($relatedBook->price, 2) }}
                                            </p>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
