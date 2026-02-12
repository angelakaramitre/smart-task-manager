<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">My Tasks</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">
                @forelse ($tasks as $task)
            <div class="bg-white shadow-md rounded-lg p-4 mb-4 border">

                <!-- Title -->
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $task->title }}
                    </h3>

                    <!-- Completed Badge -->
                    @if($task->completed)
                        <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full">
                            Completed
                        </span>
                    @else
                        <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">
                            Pending
                        </span>
                    @endif
                </div>

                <!-- Description -->
                <p class="text-sm text-gray-600 mt-2">
                    {{ $task->description }}
                </p>

                <!-- Priority -->
                <p class="text-xs text-gray-500 mt-1">
                    Priority: <span class="font-medium capitalize">{{ $task->priority }}</span>
                </p>

                <!-- Buttons -->
                <div class="flex gap-2 mt-4">

                    <!-- Edit Button -->
                    <a href="{{ route('tasks.edit', $task) }}"
                    class="bg-gray-800 hover:bg-gray-900 text-white text-sm px-3 py-1 rounded transition">
                        Edit
                    </a>

                    <!-- Toggle Button -->
                    <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <button type="submit"
                            class="bg-gray-800 hover:bg-gray-900 text-white text-sm px-3 py-1 rounded transition">
                            {{ $task->completed ? 'Mark as Pending' : 'Mark as Done' }}
                        </button>
                    </form>

                </div>
            </div>

        @empty
            <p class="text-gray-500">No tasks found.</p>
        @endforelse

            </div>
            <a href="{{ route('tasks.create') }}"
            class="inline-block mb-4 bg-green-600 text-black px-4 py-2 rounded">
            + New Task
            </a>
        </div>
    </div>
    
</x-app-layout>
