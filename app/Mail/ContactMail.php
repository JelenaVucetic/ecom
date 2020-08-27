<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject('Kontakt Mail')
        ->view('emails.contact')
        ->from($this->details['email'])
        ->subject($this->details['subject']);

        
        if (isset($this->details['image'])) {
            $mail = $mail->attach($this->details['image'], ['as' => $this->details['image'], 'mime' => $this->details['image']]);
        }
        
        return $mail;
    }
}
