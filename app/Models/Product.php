<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;
class Product extends Model
{
    use HasFactory;

    protected $table = "products";

    public function catagory()
    {
       return $this->belongsTo(Catagory::class,'catagory_id');
    }
}
