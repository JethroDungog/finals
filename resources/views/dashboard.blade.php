<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Centered Box Right Below the Header -->
    <div class="mt-4 bg-light-blue-100 dark:bg-gray-800 shadow-xl rounded-lg p-6 w-full max-w-7xl mx-auto">
        
        <!-- Search Form (Aligned to the Right) -->
        <div class="mb-4 flex justify-end">
            <form method="GET" action="{{ route('products.index') }}" class="flex items-center">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       placeholder="Search products..." 
                       class="w-full max-w-xs px-4 py-2 text-sm border rounded-lg shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-900 dark:border-gray-700 dark:text-gray-300" />
                <button type="submit" 
                        class="ml-2 px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600">
                    Search
                </button>
            </form>
        </div>

        <!-- Table Container -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Product name</th>
                        <th scope="col" class="px-6 py-3">Quantity</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $product->quantity }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $product->description }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ $product->price }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex">
                            <!-- Edit Link -->
                            <a href="{{ route('edit', $product->id) }}" 
                               class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg text-green-600 hover:text-green-800 focus:outline-none focus:text-green-800 disabled:opacity-50 disabled:pointer-events-none dark:text-green-500 dark:hover:text-green-400 dark:focus:text-green-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5 5m0 0l5-5m-5 5V6a2 2 0 012-2h5m5 0a2 2 0 012 2v10m-2 2l-5-5m0 0l5-5" />
                                </svg>
                                Edit
                            </a>
                            

                            <!-- Delete Form -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block ml-6">
                                @csrf
                                @method('DELETE')
                                <button type="button" 
                                        onclick="confirmDelete(this)" 
                                        class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800 disabled:opacity-50 disabled:pointer-events-none dark:text-red-500 dark:hover:text-red-400 dark:focus:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" style="color: red;">
                                        <path d="M6.5 3a1 1 0 00-1 1v.5H3a1 1 0 100 2h1v10a2 2 0 002 2h8a2 2 0 002-2V6.5h1a1 1 0 100-2h-2.5V4a1 1 0 00-1-1h-7zm2 2h3v.5H8.5V5zM7 9a1 1 0 012 0v5a1 1 0 11-2 0V9zm4 0a1 1 0 112 0v5a1 1 0 11-2 0V9z" />
                                    </svg>
                                    Delete
                                </button>
                            </form> 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(button) {
        if (confirm("Are you sure you want to delete this product?")) {
            button.closest('form').submit();
        }
    }
</script>
