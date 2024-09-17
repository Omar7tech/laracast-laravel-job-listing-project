<!DOCTYPE html>
<html data-theme="light"> <!-- Add class to control theme -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="min-h-full">
        <nav class="bg-gray-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-8 w-8 rounded-full"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJnp1Ys8aDzwqRWPLFzVO1XF3IDh0nhXkdXA&s" alt="Your Company">
                        </div>
                        <!-- Navigation Links -->
                        <div class="ml-10 flex space-x-4">
                            <x-nav-link url="/">Home</x-nav-link>
                            <x-nav-link url="about">About</x-nav-link>
                            <x-nav-link url="contact">Contact</x-nav-link>
                            <x-nav-link url="jobs"
                                class="{{ !Auth::check() ? 'cursor-not-allowed opacity-50 pointer-events-none ' : '' }}">Jobs</x-nav-link>
                        </div>
                    </div>

                    <!-- Right-side links -->
                    <div class="ml-auto space-x-4">
                        @guest
                            <x-nav-link url="login">Login</x-nav-link>
                            <x-nav-link url="register">Register</x-nav-link>
                        @else
                            <!-- Logout Form -->
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit"
                                    class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                    Logout
                                </button>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        @if (isset($heading))
            <header class="bg-white shadow">
                <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between items-center">
                    <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading }}</h1>
                    @auth
                        <x-create-job-btn>Create job</x-create-job-btn>
                    @endauth
                </div>
            </header>
        @endif


        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>
