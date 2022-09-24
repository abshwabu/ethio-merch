<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = "orders";

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        $this->hasMany(OrderItem::class);
    }
    
    public function shipping()
    {
        $this->hasOne(Shipping::class);
    }

    public function transaction()
    {
        $this->hasOne(Transaction::class);
    }
}
