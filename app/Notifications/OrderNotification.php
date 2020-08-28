<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;

    private $payment;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($payment)
    {
          $this->payment = $payment;      
         
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        
        return (new MailMessage)
                    ->subject('Informacije o porudžni')
                    ->greeting('Poštovani,')             
                    ->line('Hvala što koristite naše usluge.')
                    ->line('Detalji transakcije:')
                    ->line('Status: ' . $this->payment->result)
                    ->line('Broj Porudžbine: ' . $this->payment->transaction_id)
                    ->line('Autorizacioni kod: ' . $this->payment->extra_data)
                    ->line('Ukupna cijena: ' . $this->payment->amount)
                    ->line('Tip kartice: ' . $this->payment->card_type)
                    ->line('Poslednje 4 cifre: ' . $this->payment->last_four_digits);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
