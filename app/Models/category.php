<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\product;
use App\Models\Brand;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
    	'name',
		'slug',
		'description',
		'image',
		'meta_title',
		'meta_keyword',
		'meta_description',
		'status',
    ];
    public function products(){
    	return $this->hasMany(product::Class, 'category_id', 'id');   //1 category ke bohat se product hosakte hen..
    }
    public function brands(){  //member   
        return $this->hasMany(Brand::class  , 'category_id', 'id')->where('status','0');  
    }


}
    //public function category(){
    //    return $this->belongsTo(category::class, 'category_id', 'id');  //1 product ki 1 ho categpru hogi.
    //}