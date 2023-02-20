<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product_Image;
use App\Models\productColor;
use App\Models\Brand;

class product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
    	'category_id',
    	'name',
		'slug',
		'brand',
		'small_description',
		'description',
		'original_price',
		'selling_price',
		'quantity',
		'trending',
		'status',
		'meta_title',
		'meta_keyword',
		'meta_description',
    ];
    public function category(){
    	return $this->belongsTo(category::class, 'category_id', 'id');    //1 product ki 1 ho categpru hogi.
    }
    /*  	
  		this product belongs to category with category_id
    	ab jub hum view me ja ke product ka data fetch kar rahe honge to us waqt
    	hum category ko name se call karenge to wo call hojaegi q ke product table category se
    	relation me he with the help of foreign key.
        belongsTo ka matlab he ke product table ka jub hum data call karenge to category ki field bhi fatch
        kar sakenge due to belongsTo
	*/
   
    public function productImages(){
    	return $this->hasMany(Product_Image::class, 'product_id', 'id');  //1 product me bohat c images hosakti hen..
    }
    	  
   /*  	product has many images
    	product_id == foreign key && id == primary key
    	productImages ne prduct ki id as a foreign key li hui he or relation banaya hua he,
    	us relation ki waja se hum product_image modal ka data utha sakte hen apne pass.
   */  	
    public function productColors(){  //member   
        return $this->hasMany(productColor::class  , 'product_id', 'id');  
    }
}

