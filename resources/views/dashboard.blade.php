<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h2 class="text-2xl font-bold mb-4">👋 Welcome, {{ Auth::user()->name }}</h2>
                <p class="mb-4 text-gray-600">This is your Laravel Queue Management Dashboard.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="p-4 bg-blue-100 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">📬 Queued Emails</h3>
                        <p class="text-sm">Monitor background email jobs</p>
                    </div>
                    <div class="p-4 bg-green-100 rounded-lg shadow">
                        <h3 class="text-lg font-semibold">📊 Job Statistics</h3>
                        <p class="text-sm">Track completed and pending jobs</p>
                    </div>
                </div>
                 <form action="{{ route('bulk.email.send.without.queue') }}" method="POST" style="margin-bottom: 10px;">
                    @csrf
                    <button type="submit">Send Bulk Email Without Queue</button>
                </form>

                <form action="{{ route('bulk.email.send.with.queue') }}" method="POST">
                    @csrf
                    <button type="submit">Send Bulk Email With Queue</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
