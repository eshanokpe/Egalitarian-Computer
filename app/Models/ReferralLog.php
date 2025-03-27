<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferralLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'referrer_id',
        'referred_id',
        'referral_code',
        'referred_at',
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class, 'referrer_id');
    }

    public function referrer()
    { 
        return $this->belongsTo(User::class, 'referrer_id');
    }

    
    public function referred()
    {
        return $this->belongsTo(User::class, 'referred_id');
    }
}
 