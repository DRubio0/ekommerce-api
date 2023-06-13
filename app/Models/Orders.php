<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'total',
        'order_state'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product')->withPivot('quantity');
    }
}
