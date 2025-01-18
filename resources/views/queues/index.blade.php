<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Queues</h1>
            <a href="{{ route('queues.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Create Queue
            </a>
        </div>
        <ul class="divide-y divide-gray-200">
            @foreach ($queues as $queue)
                <li class="py-4">
                    <a href="{{ route('queues.show', $queue->id) }}" class="text-lg font-medium text-indigo-600 hover:underline">
                        {{ $queue->name }} <span class="text-sm text-gray-500">({{ $queue->date }})</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</x-app-layout>
