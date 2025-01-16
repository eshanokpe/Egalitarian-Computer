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

    // Relationship: Referrals received by this user (users who referred by this user)
   


}
 