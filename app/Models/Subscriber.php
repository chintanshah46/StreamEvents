<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'event_user_id',
        'subscription_id'
    ];

    protected $table = 'subscribers';

    public function eventUsers(){
        return $this->belongsTo(EventUser::class);
    }

    public function subscriptions(){
        return $this->belongsTo(Subscription::class);
    }
}
