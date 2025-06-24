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

        <form action="{{ route('register.choice.submit') }}" method="POST">
            @csrf
            <!-- inputs here -->
            <div class="flex flex-col gap-4 mt-6">
                <button type="submit" name="action" value="with_queue"
                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg font-semibold shadow hover:bg-indigo-700 transition duration-200 text-lg">
                    Register with Queue
                </button>
                <button type="submit" name="action" value="without_queue"
                    class="w-full bg-gray-100 text-indigo-700 border border-indigo-600 py-2 px-4 rounded-lg font-semibold shadow hover:bg-indigo-50 transition duration-200 text-lg">
                    Register without Queue
                </button>
            </div>
        </form>
        <a href="{{ url('/') }}" class="block text-center mt-6 text-indigo-600 hover:underline font-semibold">
            &larr; Back to Home
        </a>
    </div>
</x-guest-layout>