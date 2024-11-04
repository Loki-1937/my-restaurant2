<?php

namespace App\Notifications;
use App\Models\User;
use App\Models\payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendPaymentEmail extends Notification
{
    use Queueable;
    protected $user;
    protected $payment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user,payment $payment)
    {
        $this->user=$user;
        $this->payment=$payment;
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
        ->subject('Your MyRestaurant Payment Notice')
        ->greeting('Hi '. $this->user->name)
        ->line('We have received payment for your order no: '. $this->payment->order_id)
        ->line('Your order is currently being processed and will be dispatched soon')
        // ->action('Notification Action', url('/'))
        ->line('Thank you for using our application!');
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
