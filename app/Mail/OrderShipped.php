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
    public function __construct($status, $order_number, $amount,$extra_data, $card_type, $last_four_digits)
    {
        
        $this->status = $status;
        $this->order_number = $order_number;
        $this->amount = $amount;
        $this->extra_data = $extra_data;
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
                    ->view('emails.order')
                    ->with([
                        'status' => $this->status,
                        'order_number' =>  $this->order_number,
                        'extra_data' =>  $this->extra_data,
                        'amount' =>  $this->amount,
                        'card_type' =>  $this->card_type,
                        'last_four_digits' => $this->last_four_digits,
                    ]);;
    }
}
