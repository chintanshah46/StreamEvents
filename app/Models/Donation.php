<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'donations';

    protected $fillable = [
        'event_user_id',
        'currency_id',
        'amount',
        'donation_message',
    ];

    public function eventUsers(){
        return $this->belongsTo(EventUser::class);
    }

    public function currencies(){
        return $this->belongsTo(Currency::class);
    }
}
