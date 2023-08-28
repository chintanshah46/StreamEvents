<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventUser extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password'
    ];

    protected $table = 'event_users';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function followers(){
        return $this->hasMany(Follower::class);
    }

    public function subscribers(){
        return $this->hasMany(Subscriber::class);
    }

    public function donations(){
        return $this->hasMany(Donation::class);
    }

    public function merchandiseSales(){
        return $this->hasMany(MerchandiseSale::class);
    }
}
