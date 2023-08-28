<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Follower extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'event_user_id',
    ];

    protected $table = 'followers';

    public function eventUsers(){
        return $this->belongsTo(EventUser::class);
    }
}
