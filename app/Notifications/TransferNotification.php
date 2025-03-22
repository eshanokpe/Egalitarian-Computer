<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;


// class TransferNotification extends Notification
// {
//     use Queueable;

//     /**
//      * Create a new notification instance.
//      *
//      * @return void
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Get the notification's delivery channels.
//      *
//      * @param  mixed  $notifiable
//      * @return array
//      */
//     public function via($notifiable)
//     {
//         return ['mail'];
//     }

//     /**
//      * Get the mail representation of the notification.
//      *
//      * @param  mixed  $notifiable
//      * @return \Illuminate\Notifications\Messages\MailMessage
//      */
//     public function toMail($notifiable)
//     {
//         return (new MailMessage)
//                     ->line('The introduction to the notification.')
//                     ->action('Notification Action', url('/'))
//                     ->line('Thank you for using our application!');
//     }

//     /**
//      * Get the array representation of the notification.
//      *
//      * @param  mixed  $notifiable
//      * @return array
//      */
//     public function toArray($notifiable)
//     {
//         return [
//             //
//         ];
//     }
// }


class TransferNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $user;
    private $amount;
    private $type;

    public function __construct($user, $amount, $type)
    {
        $this->user = $user;
        $this->amount = $amount;
        $this->type = $type; // "Sender" or "Recipient"
    }

    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Property Transfer Confirmation')
            ->greeting("Hello {$notifiable->name},")
            ->line("Your transfer request has been successfully processed.")
            ->line("**Amount:** {$this->amount}")
            ->line("**{$this->type}:** {$this->user->name} ({$this->user->email})")
            ->action('View Details', url('/user/dashboard'))
            ->line('Thank you for using our service!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => "Transfer of {$this->amount} was successful. {$this->type}: {$this->user->name}.",
            'url' => url('/user/dashboard')
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'message' => "Transfer of {$this->amount} was successful. {$this->type}: {$this->user->name}.",
        ]);
    }
}
