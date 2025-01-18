<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PropertyValuationPredictionNotification extends Notification
{
    use Queueable;

    protected $property;
    protected $percentageIncrease;
    protected $marketValue;

    /**
     * Create a new notification instance.
     *
     * @param $property
     * @param $percentageIncrease
     */
    public function __construct($property, $percentageIncrease, $marketValue)
    {
        $this->property = $property;
        $this->marketValue = $marketValue;
        $this->percentageIncrease = $percentageIncrease;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database']; // You can include 'mail', 'sms', etc.
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Property Valuation Prediction Update')
            ->line('The valuation prediction for property ' . $this->property->name . ' has been updated.')
            ->line('Market Value: ₦' . number_format($this->marketValue, 2))
            ->line('Future Market Value: ₦' . number_format($this->marketValue, 2))
            ->line('Future Date: ₦' . number_format($this->marketValue, 2))
            ->line('Percentage Increase: ' . ceil($this->percentageIncrease). '%')
            ->action('View Property', url('user/properties/' . $this->property->id))
            ->line('Thank you for using our platform!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'notification_status' => 'PropertyValuationPredictionNotification',
            'property_id' => $this->property->id,
            'property_name' => $this->property->name,
            'market_value' => $this->property->price,
            'percentage_increase' => ceil($this->percentageIncrease),
        ];
    }
}
