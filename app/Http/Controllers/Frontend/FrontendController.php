<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\slider;
use App\Models\category;
use App\Models\product;
use App\Models\productColor;
use App\Models\Brand;
// use App\Models\slider;

class FrontendController extends Controller{
	
	public function index(){

		$sliders = slider::where('status','0')->get();
    	return view('frontend.index', compact('sliders'));
	}   
	public function categories(){

		$categories = category::where('status','0')->get(); 
    	return view('frontend.collections.category.index', compact('categories'));
	}
	public function products($category_slug){ 

		$category = category::where('slug',$category_slug)->first();
		if($category){	
			$products = $category->products()->get(); 		//int category model we have product function hasMany	
			 	
			return view('frontend.collections.products.index', compact('products','category'));  
		}else{
			return redirect()->back();
		}
	}
} 


