<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-bind:class="{ 'dark': darkMode }" x-init="$watch('darkMode', value => localStorage.setItem('darkMode', value))">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Inventory') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">
            <!-- Sidebar -->
            <aside class="w-30 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700" x-data="{ open: false }">
                <div class="h-full flex flex-col">
                    <!-- Logo with Toggle -->
                    <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex justify-center items-center">
                        <!-- Toggle button -->
                        <button @click="open = !open" class="focus:outline-none">
                            <x-application-logo class="h-16 w-16 fill-current text-gray-800 dark:text-gray-200" />
                        </button>
                    </div>
            
                    <!-- Collapsible Menu -->
                    <nav x-show="open" 
                        x-transition:enter="transition ease-out duration-300 transform" 
                        x-transition:enter-start="opacity-0 scale-95" 
                        x-transition:enter-end="opacity-100 scale-100" 
                        x-transition:leave="transition ease-in duration-200 transform" 
                        x-transition:leave-start="opacity-100 scale-100" 
                        x-transition:leave-end="opacity-0 scale-95"
                        class="flex-1 px-4 py-6 space-y-2"
                    >
                        <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md">
                        <svg
  class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
  aria-hidden="true"
  xmlns="http://www.w3.org/2000/svg"
  fill="currentColor"
  viewBox="0 0 24 24"
>
  <path d="M3 3H10V10H3V3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M14 3H21V7H14V3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M14 11H21V21H14V11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M3 14H10V21H3V14Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                        <a href="{{ route('create') }}" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6" {{ $attributes }}>
    <!-- Box Outline -->
    <rect x="3" y="6" width="18" height="12" rx="2" ry="2" stroke="currentColor" stroke-width="2" fill="none" />
    <!-- Top Flaps -->
    <path d="M3 6 L12 2 L21 6" stroke="currentColor" stroke-width="2" fill="none" />
    <!-- Horizontal Lines -->
    <line x1="6" y1="10" x2="18" y2="10" stroke="currentColor" stroke-width="2" />
    <line x1="6" y1="14" x2="18" y2="14" stroke="currentColor" stroke-width="2" />
    <!-- Vertical Lines -->
    <line x1="6" y1="10" x2="6" y2="14" stroke="currentColor" stroke-width="2" />
    <line x1="18" y1="10" x2="18" y2="14" stroke="currentColor" stroke-width="2" />
</svg>

                            <span class="ms-3">Create</span>
                        </a>
                        <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md">
                            <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.2 0 4-1.8 4-4s-1.8-4-4-4-4 1.8-4 4 1.8 4 4 4zm0 2c-2.7 0-8 1.3-8 4v2h16v-2c0-2.7-5.3-4-8-4z"/>
                            </svg>
                            <span class="ms-3">Profile</span>
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-block w-full text-left px-3 py-1 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md">
                                Log Out
                            </button>
                        </form>
                    </nav>
                </div>
            </aside>
            
            <!-- Main Content -->
            <div class="flex-1">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    {{-- <header class="bg-white dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header> --}}
                @endisset

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
        </div>
    </body>
</html>
