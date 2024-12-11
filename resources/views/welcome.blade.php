<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Computer Parts</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Add Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            /* Set the background image for the entire page */
            html, body {
                height: 100%;
                margin: 0;
                background-image: url('https://r4.wallpaperflare.com/wallpaper/140/305/272/linux-void-void-linux-arch-linux-hacking-hd-wallpaper-390058cde11aedebd6d7381fc021966d.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
            }

            /* Ensure the body has minimum height */
            body {
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                background-color: rgba(0, 0, 0, 0.4); /* Optional overlay to enhance readability */
            }
        </style>
    </head>
    <body>
        <section class="bg-opacity-50 bg-gray-900 dark:bg-gray-900">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <x-application-logo class="block h-20 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    Computer Parts    
                </a>
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Sign in to your account
                        </h1>
                        <form class="space-y-4 md:space-y-6" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <div class="relative">
                                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 px-3 py-2 text-sm text-gray-500 hover:text-gray-700 focus:outline-none">
                                        <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path d="M15 12A3 3 0 1 1 9 12A3 3 0 0 1 15 12z" />
                                            <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.269 2.943 9.542 7-.374 1.153-1.045 2.204-1.882 3.127m-3.818 1.489c-1.022.463-2.118.739-3.342.739-4.478 0-8.269-2.943-9.542-7a8.94 8.94 0 0 1 2.455-3.875" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <x-primary-button class="ms-3">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                            <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                Don’t have an account yet? 
                                <a href="{{ route('register') }}" class="font-bold text-lg text-white hover:underline">Sign up</a>
                            </p>                            
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <script>
            function togglePassword() {
                const passwordField = document.getElementById('password');
                const eyeIcon = document.getElementById('eye-icon');
                
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    eyeIcon.innerHTML = '<path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z" /><path d="M12 15a3 3 0 1 1 0-6 3 3 0 0 1 0 6z" />'; 
                } else {
                    passwordField.type = 'password';
                    eyeIcon.innerHTML = '<path d="M15 12A3 3 0 1 1 9 12A3 3 0 0 1 15 12z" /><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.269 2.943 9.542 7-.374 1.153-1.045 2.204-1.882 3.127m-3.818 1.489c-1.022.463-2.118.739-3.342.739-4.478 0-8.269-2.943-9.542-7a8.94 8.94 0 0 1 2.455-3.875" />';
                }
            }
        </script>
    </body>
</html>
