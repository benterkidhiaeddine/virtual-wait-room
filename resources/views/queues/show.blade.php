<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <!-- Queue Details -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">{{ $queue->name }} <span class="text-lg text-gray-500">({{ $queue->date }})</span></h1>
            <a href="{{ route('queues.index') }}" class="inline-flex items-center px-4 py-2 mt-4 bg-gray-600 border border-transparent rounded-md font-semibold text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                Back
            </a>
        </div>

        <!-- Patients List -->
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Patients</h2>
            <ul class="divide-y divide-gray-200">
                @forelse ($queue->patients as $patient)
                    <li class="py-4">
                        <span class="text-lg text-gray-800">{{ $patient->first_name }} {{ $patient->last_name }}</span>
                        <span class="text-sm text-gray-500">({{ $patient->birthdate }})</span>
                    </li>
                @empty
                    <li class="py-4 text-gray-500">No patients in this queue.</li>
                @endforelse
            </ul>
        </div>

        <!-- Add Patient Form -->
        <div>
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Add Patient</h2>
            <form action="{{ route('queues.addPatient', $queue->id) }}" method="POST" class="space-y-6">
                @csrf
                <!-- First Name -->
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input 
                        type="text" 
                        name="first_name" 
                        id="first_name" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        required>
                </div>

                <!-- Last Name -->
                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input 
                        type="text" 
                        name="last_name" 
                        id="last_name" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        required>
                </div>

                <!-- Birthdate -->
                <div>
                    <label for="birthdate" class="block text-sm font-medium text-gray-700">Birthdate</label>
                    <input 
                        type="date" 
                        name="birthdate" 
                        id="birthdate" 
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        required>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button 
                        type="submit" 
                        class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                        Add Patient
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
