<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>The Task-List (made in Laravel 11)</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    @vite('resources/css/app.css')
    @yield('style')
</head>
<body class="bg-gray-100 text-gray-900 min-h-screen flex flex-col items-center">
    <div class="container mx-auto p-4">
        <header class="text-center mb-2">
            <a href="{{ route('tasks.index') }}">
                <h1 class="text-3xl font-bold">@yield('title')</h1>
            </a>
            <p class="text-gray-600">Stay organized and productive!</p>
            <div x-data="{ flash: true }">
            @if (session()->has('success'))
                <div class="relative mt-4 mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700"
                    role="alert"
                    x-show="flash">
                    <strong class="font-bold">
                        Success!
                    </strong>
                    <div>{{ session('success') }}</div>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6 cursor-pointer"
                            @click="flash = false">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </div>
            @endif
            </div>
        </header>
    </div>
    @if (request()->routeIs('tasks.index'))
        <div class="flex flex-col items-center justify-center mb-8">
            <a href="{{ route('tasks.create') }}">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Make a Task!
                </button>
            </a>
        </div>
    @endif
    @yield('content')
    @if (! request()->routeIs('tasks.index'))
        <div class="flex flex-col items-center justify-center mb-8 mt-8">
            <a href="{{ route('tasks.index') }}">
                <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                    Back to My List
                </button>
            </a>
        </div>
    @endif
    <footer class="bg-white rounded-lg shadow m-4">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400"><a href="/" class="hover:underline">Tasker Lister</a> © 2024. All Rights Reserved.
        </span>
        </div>
    </footer>
</body>
</html>