<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Notification;
use App\Notifications\TestEnrollemt;

class RecordController extends Controller
{
    public function list(){
        $trending_products= Product::where('trending','1')->take(15)->get();
        return response()->json($trending_products);
    }

    public function inviteuseremail()
    {
        $user = User::select('email')->get();
        $enrollmentData = [
            'greeting' => 'Greetings to you',
            'body' => 'You Received an new test notification',
            'enrollemttext' => 'You are allowed to Enrollment',
            'url' => url('/'),
            'thankyou' => 'You have 10 days to enrollment'
        ];

        // echo "<pre>";
        // print_r($user);
        // die('herer');
        Notification::send($user, new TestEnrollemt($enrollmentData));
        dd('emails done');
    }
}
