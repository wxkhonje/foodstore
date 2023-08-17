<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class welcomemail extends Mailable
{
    use Queueable, SerializesModels;
    public $dynamicMessage;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $dynamicMessage)
    {
        $this->dynamicMessage = $dynamicMessage;
        //Log::error($this->dynamicMessage);
        //$this->$dynamicMessage = "Welcome to Laravel emails";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        //Works like a champ
       return $this->view('emails.welcome')
                    ->with('data', $this->dynamicMessage);
        
       //Log::info('Email Successfully Sent');

        /*return $this->markdown('emails.welcome', [
            'message' => $dynamicMessage,
        ]);*/

        /*return $this->view('emails.welcome')
        ->with([
            'message' => 'Hello, this is the body of the email.',
        ]);*/
    }
}
