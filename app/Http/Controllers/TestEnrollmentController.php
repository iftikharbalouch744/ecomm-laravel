<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\TestEnrollemt;
use Illuminate\Http\Request;
use Notification;
class TestEnrollmentController extends Controller
{
    public function sendTestNotification(){
        $user = User::all();
        $enrollmentData = [
            'greeting' => 'Greetings to you',
            'body' => 'You Received an new test notification',
            'enrollemttext' => 'You are allowed to Enrollment',
            'url' => url('/'),
            'thankyou' => 'You have 10 days to enrollment'
        ];
        Notification::send($user, new TestEnrollemt($enrollmentData));
        dd('emails done');
       // $user->notify(new TestEnrollemt($enrollmentData));

        return response()->json($user);
    }
}
