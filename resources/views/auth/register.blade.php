<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg border border-gray-300">
        <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Register Your Account</h2>

        @if(session('message'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('message') }}
            </div>
        @endif

        @if(session('error'))
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                {{ session('error') }}
            </div>
        @endif

        {{-- <form method="POST" action="{{ route('register.choice.submit') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1" for="name">Name</label>
                <input type="text" name="name" id="name" required class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1" for="email">Email</label>
                <input type="email" name="email" id="email" required class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1" for="password">Password</label>
                <input type="password" name="password" id="password" required class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-1" for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="flex justify-between">
                <button type="submit" name="action" value="with_queue" class="bg-indigo-600 text-white px-5 py-2 rounded-lg">Register With Queue</button>
                <button type="submit" name="action" value="without_queue" class="bg-gray-600 text-white px-5 py-2 rounded-lg">Register Without Queue</button>
            </div>
        </form> --}}
        <form action="{{ route('register.choice.submit') }}" method="POST">
            @csrf
            <!-- inputs here -->
            <button type="submit" name="action" value="with_queue">Register with Queue</button>
            <button type="submit" name="action" value="without_queue">Register without Queue</button>
        </form>

    </div>
</x-guest-layout>
