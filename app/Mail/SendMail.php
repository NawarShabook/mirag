<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;

class SendMail extends Mailable
{
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('Mirag App')  // Set the email subject
            ->view('emails.send')          // Specify the email view
            ->with('data', $this->data);      // Pass data to the view
    }
}
