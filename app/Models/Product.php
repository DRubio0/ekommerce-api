<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\ReturnTypePass;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'price',
        'stock',
        'brand',
        'image',
        'image_url',
        'description',
        'sku','state',
        'subcategory_id'
    ];
    //funtion to pass to id a name
    public function subcategory()
    {
        return $this->belongsTo(Subcategories::class);
    }
}
