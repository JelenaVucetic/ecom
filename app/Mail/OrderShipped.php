<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($status, $order_number, $amount, $card_type, $last_four_digits)
    {
        $this->status = $status;
        $this->order_number = $order_number;
        $this->amount = $amount;
        $this->card_type = $card_type;
        $this->last_four_digits = $last_four_digits;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env("MAIL_USERNAME"))
                    ->view('emails.order');
    }
}
