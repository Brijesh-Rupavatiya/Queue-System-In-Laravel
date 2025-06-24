<x-app-layout>
    <div class="py-12 bg-gradient-to-br from-gray-100 via-white to-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="bg-white bg-opacity-95 overflow-hidden shadow-2xl sm:rounded-2xl p-10 flex flex-col items-center relative">
                <h2 class="text-3xl font-extrabold text-blue-900 mb-4 tracking-tight">👋 Welcome,
                    {{ Auth::user()->name }}
                </h2>
                <p class="mb-6 text-gray-700 text-center text-lg">Professional Queue Management Dashboard</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full mb-10">
                    <div
                        class="p-6 bg-gradient-to-br from-blue-200 via-white to-blue-100 rounded-2xl shadow text-center hover:shadow-lg transition duration-300 border border-blue-300">
                        <h3 class="text-xl font-bold text-blue-800 flex items-center justify-center gap-2 mb-2">📬
                            Queued Emails Monitoring</h3>
                        <p class="text-base text-blue-700 mb-3">Monitor background requests with precise timing and
                            delivery status.</p>
                        <a href="/telescope/requests" target="_blank"
                            class="inline-block mt-2 bg-blue-700 hover:bg-blue-900 text-white px-5 py-2 rounded-full text-sm font-semibold shadow transition">
                            Monitor Queue Requests
                        </a>
                    </div>
                    <div
                        class="p-6 bg-gradient-to-br from-green-200 via-white to-green-100 rounded-2xl shadow text-center hover:shadow-lg transition duration-300 border border-green-300">
                        <h3 class="text-xl font-bold text-green-800 flex items-center justify-center gap-2 mb-2">📊 Job
                            Statistics</h3>
                        <p class="text-base text-green-700 mb-3">Track completed, pending, and failed jobs in real time.
                        </p>
                        <a href="/telescope/jobs" target="_blank"
                            class="inline-block mt-2 bg-green-700 hover:bg-green-900 text-white px-5 py-2 rounded-full text-sm font-semibold shadow transition">
                            View Job Stats
                        </a>
                    </div>
                </div>

                <div class="flex flex-wrap justify-center gap-4 mb-8 w-full">
                    <form action="{{ route('bulk.email.form', ['type' => 'without-queue']) }}" method="GET">
                        <button type="submit"
                            class="inline-flex items-center gap-2 bg-blue-800 hover:bg-blue-900 text-white px-7 py-3 rounded-full text-base font-semibold shadow-md transition duration-300 ease-in-out">
                            ✉️ Send Bulk Mails Without Queue
                        </button>
                    </form>
                    <form action="{{ route('bulk.email.form', ['type' => 'with-queue']) }}" method="GET">
                        <button type="submit"
                            class="inline-flex items-center gap-2 bg-green-800 hover:bg-green-900 text-white px-7 py-3 rounded-full text-base font-semibold shadow-md transition duration-300 ease-in-out">
                            ⏱️ Send Bulk Mails With Queue
                        </button>
                    </form>
                </div>

                <!-- Telescope Button in bottom right corner -->
                <a href="/telescope/jobs" target="_blank"
                    class="fixed bottom-8 right-8 z-50 bg-gray-900 hover:bg-blue-800 text-white px-7 py-3 rounded-full text-base font-semibold shadow-lg transition duration-300 ease-in-out flex items-center gap-2 border-2 border-blue-200">
                    🚦 Monitor Jobs (Telescope)
                </a>
            </div>
        </div>
    </div>
</x-app-layout>