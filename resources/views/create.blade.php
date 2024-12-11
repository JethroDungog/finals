<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-6 text-blue-600">Add a New Product</h3>

                    <form action="{{ route('products.store') }}" method="POST" class="mt-4 space-y-4">
                        @csrf 
                        <!-- CSRF protection token -->

                        <!-- Product Name -->
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-cube text-gray-500 dark:text-gray-400"></i>
                            <div class="w-full">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Product Name
                                </label>
                                <input type="text" id="name" name="name" required
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-2 focus:ring-blue-400">
                            </div>
                        </div>

                        <!-- Quantity -->
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-hashtag text-gray-500 dark:text-gray-400"></i>
                            <div class="w-full">
                                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Quantity
                                </label>
                                <input type="number" id="quantity" name="quantity" required step="0.01" min="0"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-2 focus:ring-blue-400">
                            </div>
                        </div>

                        <!-- Price -->
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-dollar-sign text-gray-500 dark:text-gray-400"></i>
                            <div class="w-full">
                                <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Price
                                </label>
                                <input type="number" id="price" name="price" required step="0.01"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-2 focus:ring-blue-400">
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-pencil-alt text-gray-500 dark:text-gray-400"></i>
                            <div class="w-full">
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Description
                                </label>
                                <textarea id="description" name="description" rows="4"
                                    class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 focus:ring-2 focus:ring-blue-400"></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-center mt-6">
                            <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-teal-500 text-white rounded-lg shadow-lg hover:shadow-xl focus:outline-none transform hover:scale-105 transition duration-300 ease-in-out">
                                <i class="fas fa-check-circle mr-2"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
