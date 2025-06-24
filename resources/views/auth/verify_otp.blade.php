<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow-lg border border-gray-300">
        <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6">Enter OTP</h2>
        @if(session('message'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('message') }}
            </div>
        @endif
        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-1">OTP</label>
                <input type="text" name="otp" required class="w-full px-4 py-2 border rounded-lg">
            </div>
            <button type="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700 transition duration-200 font-semibold">
                Verify
            </button>
        </form>
        <a href="{{ route('login') }}" class="block text-center mt-2 text-indigo-600 hover:underline font-semibold">
            &larr; Back to Login
        </a>
    </div>
</x-guest-layout>