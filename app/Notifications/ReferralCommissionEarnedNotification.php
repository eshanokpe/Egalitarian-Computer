<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;
use App\Models\Property;
use Illuminate\Mail\Markdown;

class ReferralCommissionEarnedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $referredUser;
    protected $property;
    protected $amount;
    protected $commissionPercentage = 3; // 3% commission

    /**
     * Create a new notification instance.
     *
     * @param User $referredUser
     * @param Property $property
     * @param float $amount
     */
    public function __construct(User $referredUser, Property $property, float $amount)
    {
        $this->referredUser = $referredUser;
        $this->property = $property;
        $this->amount = $amount;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $referredUserName = e(trim($this->referredUser->first_name . ' ' . $this->referredUser->last_name));
        $purchaseAmount = $this->amount / ($this->commissionPercentage / 100);
        $walletBalance = $notifiable->wallet->balance ?? 0;

        return (new MailMessage)
            ->subject(config('app.name') . ' - Referral Commission Earned!')
            ->greeting('Congratulations ' . e($notifiable->first_name) . '!')
            ->line('You have earned a ' . $this->commissionPercentage . '% referral commission from ' . $referredUserName . '\'s first property purchase.')
            ->line(new Markdown('
                | **Details**          | **Amount**               |
                |----------------------|--------------------------|
                | Referred User        | ' . $referredUserName . ' |
                | Property Purchased   | ' . e($this->property->name) . ' |
                | Purchase Amount      | ' . config('app.currency') . number_format($purchaseAmount, 2) . ' |
                | Commission Rate      | ' . $this->commissionPercentage . '% |
                | **Commission Earned**| **' . config('app.currency') . number_format($this->amount, 2) . '** |
                | New Wallet Balance   | ' . config('app.currency') . number_format($walletBalance + $this->amount, 2) . ' |
            '))
            ->action('View Your Referral Dashboard', route('user.referrals'))
            ->line('Thank you for referring quality users to our platform!')
            ->salutation('Best Regards,<br>' . config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $referredUserName = trim($this->referredUser->first_name . ' ' . $this->referredUser->last_name);
        $purchaseAmount = $this->amount / ($this->commissionPercentage / 100);

        return [
            'notification_status' => 'referral_commission',
            'referred_user_id' => $this->referredUser->id,
            'referred_user_name' => $referredUserName,
            'property_id' => $this->property->id,
            'property_name' => $this->property->name,
            'purchase_amount' => $purchaseAmount,
            'commission_amount' => $this->amount,
            'commission_percentage' => $this->commissionPercentage,
            'message' => 'You earned ' . config('app.currency') . number_format($this->amount, 2) . 
                        ' (' . $this->commissionPercentage . '%) from ' . $referredUserName . '\'s purchase',
            'action_url' => route('user.referrals'),
            'action_text' => 'View Referrals',
            'created_at' => now()->toDateTimeString()
        ];
    }

    /**
     * Get the notification's tags for Horizon.
     *
     * @return array
     */
    public function tags()
    {
        return ['referral', 'commission', 'user:' . $this->referredUser->id];
    }
}