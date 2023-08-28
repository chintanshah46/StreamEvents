<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    protected $table = 'subscriptions';

    public function subscribers(){
        return $this->hasMany(Subscriber::class);
    }
}
