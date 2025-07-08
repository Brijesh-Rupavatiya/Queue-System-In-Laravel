<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Compose Bulk Email</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-200 min-h-screen flex items-center justify-center">
    <!-- Modal Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
        <!-- Modal Box -->
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl p-0">
            <!-- Modal Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h2 class="text-xl font-semibold text-gray-800">
                    Compose Bulk Email ({{ $type == 'with-queue' ? 'With Queue' : 'Without Queue' }})
                </h2>
                <a href="{{ route('dashboard') }}"
                    class="text-gray-500 hover:text-indigo-600 px-3 py-1 rounded transition text-sm border border-gray-300">Back</a>
            </div>
            <!-- Modal Body -->
            <div class="p-6">
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST"
                    action="{{ $type == 'with-queue' ? route('bulk.send.with.queue') : route('bulk.email.send.without.queue') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-1">Subject</label>
                        <input type="text" name="subject" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 font-semibold mb-1">Message Body</label>
                        <textarea name="body" rows="8" required
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-400"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-indigo-600 text-white py-2 px-6 rounded hover:bg-indigo-700 transition font-semibold shadow">
                            Send
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>