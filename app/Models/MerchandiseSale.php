<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MerchandiseSale extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'event_user_id',
        'merchandise_id',
        'currency_id',
        'amount'
    ];

    protected $table = 'merchandise_sales';

    public function eventUsers(){
        return $this->belongsTo(EventUser::class);
    }

    public function currencies(){
        return $this->belongsTo(Currency::class);
    }

    public function merchandises(){
        return $this->belongsTo(Merchandise::class);
    }
}
