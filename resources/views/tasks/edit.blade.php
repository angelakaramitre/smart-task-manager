<x-app-layout>
    <div class="max-w-xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

        <form method="POST" action="/tasks/{{ $task->id }}">
            @csrf
            @method('PUT')

            <input
                type="text"
                name="title"
                value="{{ $task->title }}"
                class="w-full border p-2 mb-4"
            >

            <textarea
                name="description"
                class="w-full border p-2 mb-4"
            >{{ $task->description }}</textarea>

            
            <input type="datetime-local" name="reminder_at"
                value="{{ old('reminder_at', $task->reminder_at ?? '') }}">

            <div class="mt-4">
            <button class="bg-gray-800 hover:bg-gray-900 text-white px-4 py-2 rounded transition">
                Update Task
            </button>
            </div>

        </form>
    </div>
</x-app-layout>
