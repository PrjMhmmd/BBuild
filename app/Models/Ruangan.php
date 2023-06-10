<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable=['name','slug'];
    public function produks(){
        return $this->hasMany(Produk::class);
    }
}
