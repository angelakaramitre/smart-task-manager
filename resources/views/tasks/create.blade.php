<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Create Task
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow rounded">

                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf

                    <!-- Title -->
                    <div class="mb-4">
                        <label class="block font-medium">Title</label>
                        <input type="text"
                               name="title"
                               value="{{ old('title') }}"
                               class="w-full border rounded p-2"
                               required>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label class="block font-medium">Description</label>
                        <textarea name="description"
                                  class="w-full border rounded p-2">{{ old('description') }}</textarea>
                    </div>

                    <!-- Priority -->
                    <div class="mb-4">
                        <label class="block font-medium">Priority</label>
                        <select name="priority" class="w-full border rounded p-2">
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <!-- Due Date -->
                    <div class="mb-4">
                        <label class="block font-medium">Due Date</label>
                        <input type="date"
                               name="due_date"
                               value="{{ old('due_date') }}"
                               class="w-full border rounded p-2">
                    </div>

                    <!-- Reminder -->
                    <div class="mb-6">
                        <label class="block font-medium">Reminder</label>
                        <input type="datetime-local"
                               name="reminder_at"
                               value="{{ old('reminder_at') }}"
                               class="w-full border rounded p-2">
                    </div>

                    <!-- Save Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-black px-4 py-2 rounded transition">
                            Save Task
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
