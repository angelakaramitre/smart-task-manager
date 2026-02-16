<h2>Task Reminder</h2>

<p>Hello {{ $task->user->name }},</p>

<p>This is a reminder for your task:</p>

<strong>{{ $task->title }}</strong>

@if($task->description)
<p>{{ $task->description }}</p>
@endif

<p>Due date: {{ $task->due_date }}</p>

<p>Don't forget to complete it!</p>
