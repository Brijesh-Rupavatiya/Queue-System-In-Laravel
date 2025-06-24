<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Queue System in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-br from-indigo-100 via-white to-indigo-200 min-h-screen text-gray-800">

    <div class="min-h-screen flex flex-col justify-center items-center px-4">
        <div class="bg-white bg-opacity-90 rounded-2xl shadow-2xl p-10 max-w-xl w-full flex flex-col items-center">
            <div class="flex items-center mb-4">
                <svg class="w-12 h-12 text-indigo-600 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h1 class="text-4xl font-extrabold text-indigo-700">Queue System in Laravel</h1>
            </div>
            <p class="text-lg text-center max-w-xl mb-8 text-gray-600">
                Efficiently handle background tasks with Laravel Queues.<br>
                Real-time &amp; delayed job execution for modern web apps.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 w-full justify-center mb-6">
                <a href="{{ route('register') }}"
                    class="flex-1 bg-indigo-600 text-white px-6 py-3 rounded-full font-semibold shadow hover:bg-indigo-700 text-center transition">
                    Register
                </a>
                <a href="{{ route('login') }}"
                    class="flex-1 bg-gray-800 text-white px-6 py-3 rounded-full font-semibold shadow hover:bg-gray-900 text-center transition">
                    Login
                </a>
            </div>

            <div class="flex items-center justify-center space-x-2 mb-2">
                <span class="inline-block w-2 h-2 bg-indigo-400 rounded-full"></span>
                <span class="inline-block w-2 h-2 bg-indigo-500 rounded-full"></span>
                <span class="inline-block w-2 h-2 bg-indigo-600 rounded-full"></span>
            </div>

            <footer class="mt-6 text-sm text-gray-500 text-center">
                © 2025 <span class="font-semibold text-indigo-600">QueueMaster Seminar</span> <br>
                By Brijesh Rupavatiya – MCA VNSGU
            </footer>
        </div>
    </div>

</body>

</html>