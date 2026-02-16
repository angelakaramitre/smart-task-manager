<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Mail\TaskReminderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendTaskReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-task-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->toDateString();

       $tasks = Task::whereDate('due_date', $tomorrow)
                ->where('completed', false)
                ->get();

        foreach ($tasks as $task) {
            Mail::to($task->user->email)
                ->send(new TaskReminderMail($task));
        }

            $this->info('Task reminders sent!');
    }
}
