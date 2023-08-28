<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Currency extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'currecy_code'
    ];

    protected $table = 'currencies';

    public function donations(){
        return $this->hasMany(Donation::class);
    }

    public function merchandiseSales(){
        return $this->hasMany(MerchandiseSale::class);
    }
}
