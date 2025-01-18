<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Create Queue</h1>
        <form action="{{ route('queues.store') }}" method="POST" class="space-y-6">
            @csrf
            <!-- Queue Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Queue Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                    required>
            </div>

            <!-- Date -->
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input 
                    type="date" 
                    name="date" 
                    id="date" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                    required>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button 
                    type="submit" 
                    class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                    Create
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
