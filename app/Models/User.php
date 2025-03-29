<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
 
    protected $fillable = [
        'first_name',
        'last_name', 
        'email',
        'password',
        'phone', 
        'dob',
        'recipient_id',
        'profile_image', 
        'referral_code',
        'referred_by',
        'transaction_pin',
        'hide_balance',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function virtualAccounts()
    {
        return $this->hasMany(VirtualAccount::class);
    } 

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    public function notifications()
    {
        return $this->morphMany(CustomNotification::class, 'notifiable')->orderBy('created_at', 'desc');
    }
    public function referralsMade()
    {
        return $this->hasMany(ReferralLog::class, 'referrer_id');
    }
    public function referralsReceived()
    {
        return $this->hasMany(ReferralLog::class, 'id');
    }
    
    public function walletTransactions()
    {
        return $this->hasMany(WalletTransaction::class);
    }

    public function successfulReferrals()
    {
        return $this->referrals()
            ->where('status', ReferralLog::STATUS_PAID);
    }

    public function pendingReferrals()
    {
        return $this->referrals()
            ->where('status', ReferralLog::STATUS_PENDING);
    }

    public function totalCommissionEarned()
    {
        return $this->referrals()
            ->where('commission_paid', true)
            ->sum('commission_amount');
    }

    public function potentialCommission()
    {
        return $this->referrals()
            ->where('status', ReferralLog::STATUS_PENDING)
            ->sum('commission_amount');
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => trim($this->first_name . ' ' . $this->last_name),
        );
    }

    

}
 