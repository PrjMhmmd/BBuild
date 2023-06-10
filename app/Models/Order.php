<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detail_orders(){
        return $this->hasMany(Detail_order::class);
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class);
    }

}
