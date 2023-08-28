<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchandise extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'name',
        'price'
    ];

    protected $table = 'merchandises';

    public function merchandiseSales(){
        return $this->hasMany(MerchandiseSale::class);
    }
}
