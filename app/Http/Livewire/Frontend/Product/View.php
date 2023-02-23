<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component{

	public $category, $product;

	public function mount($category, $product){
		$this->category = $category;
		$this->product = $product;
	}

    public function render(){
    	
        return view('livewire.frontend.product.view',[
        	'category' => $this->category,
        	'product' => $this->product
        ]);
    }
}


// able: array:14 [▼
//     0 => "category_id"
//     1 => "name"
//     2 => "slug"
//     3 => "brand"
//     4 => "small_description"
//     5 => "description"
//     6 => "original_price"
//     7 => "selling_price"
//     8 => "quantity"
//     9 => "trending"
//     10 => "status"
//     11 => "meta_title"
//     12 => "meta_keyword"
//     13 => "meta_description"