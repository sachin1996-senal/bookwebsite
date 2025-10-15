<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Browse Books Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="flex items-center mb-4">
                        <span class="text-4xl mr-4">📚</span>
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Browse Books</h3>
                    </div>
                    <p class="text-gray-600 dark:text-gray-400 mb-4">
                        Explore our collection of books. Search, filter, and discover your next read.
                    </p>
                    <a href="{{ route('books.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-600 transition">
                        View Books
                    </a>
                </div>

                {{-- @if(auth()->user()->role === 'admin')
                    <!-- Add Book Card (Admin Only) -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <span class="text-4xl mr-4">➕</span>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Add Book</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Add new books to the collection. Manage your library inventory.
                        </p>
                        <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 bg-green-600 dark:bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 dark:hover:bg-green-600 transition">
                            Add New Book
                        </a>
                    </div>

                    <!-- Admin Badge -->
                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 overflow-hidden shadow-sm sm:rounded-lg p-6 text-white">
                        <div class="flex items-center mb-4">
                            <span class="text-4xl mr-4">👑</span>
                            <h3 class="text-xl font-semibold">Admin Access</h3>
                        </div>
                        <p class="mb-4">
                            You have full administrative privileges to manage the book collection.
                        </p>
                        <p class="text-sm opacity-90">
                            You can add, edit, and delete books from the system.
                        </p>
                    </div>
                @else
                    <!-- User Info Card -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <div class="flex items-center mb-4">
                            <span class="text-4xl mr-4">👤</span>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">My Profile</h3>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 mb-4">
                            Manage your account settings and personal information.
                        </p>
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white transition">
                            Edit Profile
                        </a>
                    </div>
                @endif --}}
            </div>
        </div>
    </div>
</x-app-layout>
