<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
    use HasFactory;
    protected $table = 'products_images';
    protected $fillable = [
    	'product_id',
    	'image',
    ];
    public function products(){
    	return $this->belongsTo(product::class, 'product_id', 'id');    //1 product ki 1 image hogi.
    }


}
