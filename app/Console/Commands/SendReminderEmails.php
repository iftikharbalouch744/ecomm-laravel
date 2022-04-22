<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Notifications\TestEnrollemt;
use Notification;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email notification to user about reminders.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::select('email')->get();
        $enrollmentData = [
            'greeting' => 'Greetings to you',
            'body' => 'You Received an new test notification',
            'enrollemttext' => 'You are allowed to Enrollment',
            'url' => url('/'),
            'thankyou' => 'You have 10 days to enrollment'
        ];
        Notification::send($user, new TestEnrollemt($enrollmentData));
        info('all email send ');
    }


}
