<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg border border-gray-300">
        <h2 class="text-2xl font-bold text-center text-purple-600 mb-6">Register Without Queue</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register.withoutQueue.submit') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700">Name</label>
                <input id="name" type="text" name="name" required autofocus
                    class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" required
                    class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                    class="w-full px-4 py-2 border rounded-lg">
            </div>

            <button type="submit"
                class="w-full bg-purple-600 text-white py-2 px-4 rounded hover:bg-purple-700 transition duration-200">
                Register
            </button>
        </form>
    </div>
</x-guest-layout>
