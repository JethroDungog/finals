<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="container p-4">
                        <div class="max-w-sm space-y-6 mx-auto">
                            <!-- Name Field -->
                            <div class="mb-6">
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-200 rounded-lg text-sm p-4 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-neutral-600"
                                    placeholder="Name" value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Quantity Field -->
                            <div class="mb-6">
                                <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-white">Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="mt-1 block w-full border-gray-200 rounded-lg text-sm p-4 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-neutral-600"
                                    placeholder="Quantity" value="{{ old('quantity', $product->quantity) }}">
                                @error('quantity')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Description Field -->
                            <div class="mb-6">
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-white">Description</label>
                                <textarea name="description" id="description" class="mt-1 block w-full border-gray-200 rounded-lg text-sm p-4 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-neutral-600"
                                    placeholder="Description" rows="5">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Price Field -->
                            <div class="mb-6">
                                <label for="price" class="block text-sm font-medium text-gray-700 dark:text-white">Price</label>
                                <input type="text" name="price" id="price" class="mt-1 block w-full border-gray-200 rounded-lg text-sm p-4 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-neutral-600"
                                    placeholder="Price" value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <p class="text-red-500 text-sm">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-500 text-white hover:bg-teal-600 focus:outline-none focus:bg-teal-600 disabled:opacity-50 disabled:pointer-events-none">
                                    Update
                                </button>
                            </div>

                            <!-- Back Button -->
                            <div class="mt-4">
                                <a href="{{ route('products.index') }}" class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium rounded-lg border border-transparent bg-gray-600 text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
