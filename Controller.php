<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// Assuming you have a User model that has an email attribute
use App\Models\User;

class MailController extends Controller
{
    // This method sends an email message using queue immediately
    public function sendMail()
    {
        // Get the users you want to send the email to, for example, all users
        $users = User::all();

        // Loop through the users and dispatch a job to the queue for each email
        foreach ($users as $user) {
            Mail::to($user->email)->queue(new MyEmail());
        }

        // Alternatively, you can use the chunk method to avoid loading all users into memory
        User::chunk(100, function ($users) {
            foreach ($users as $user) {
                Mail::to($user->email)->queue(new MyEmail());
            }
        });
    }

}
