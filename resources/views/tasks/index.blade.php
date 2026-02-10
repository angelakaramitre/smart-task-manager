<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">My Tasks</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">
                @forelse ($tasks as $task)
                    <div class="border-b py-3">
                        <h3 class="font-bold">{{ $task->title }}</h3>
                        <p class="text-sm text-gray-600">
                            Status: {{ $task->status }} | Priority: {{ $task->priority }}
                        </p>
                    </div>
                @empty
                    <p>No tasks yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
