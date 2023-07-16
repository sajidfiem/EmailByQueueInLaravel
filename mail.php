<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    // You can define any public properties that you want to pass to the email view
    public $name;

    // The constructor method accepts any parameters that you want to pass to the email view
    public function __construct($name)
    {
        // Assign the parameters to the public properties
        $this->name = $name;
    }

    // The build method defines how to build the email message
    public function build()
    {
    
        return $this->subject('Welcome to Laravel')
                    ->view('emails.welcome');
    }
}
