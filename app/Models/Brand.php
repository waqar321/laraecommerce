<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = 'brands';
    protected $fillable = [
    	'name',
		'slug',
		'status',
		'category_id'
    ];

   
    public function category(){  //member   
        return $this->belongsTo(category::class  , 'category_id', 'id');  
    }

}
