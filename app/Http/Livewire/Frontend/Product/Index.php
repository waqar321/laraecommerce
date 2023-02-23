<?php

namespace App\Http\Livewire\Frontend\Product;
use Livewire\Component;
use App\Models\product;

class Index extends Component{

	public $products, $category, $brandInputs=[], $priceInputs;
    protected $queryString = [
        'brandInputs' => ['except' => '', 'as' => 'brand'],   //alias of brandInputs
        'priceInputs' => ['except' => '', 'as' => 'price'],   //alias of brandInputs
    ];

   
	public function mount($category){
		$this->category = $category;
	}

    public function render(){

        $this->products = product::where('category_id', $this->category->id)
                                ->when($this->brandInputs, function($q){    //when means if 
                                    $q->whereIn('brand',$this->brandInputs); //whereIn means check multiple data
                                }) 
                                ->when($this->priceInputs, function($q){   
                                    
                                    $q->when($this->priceInputs== 'High-To-Low',  function($q2){  //High-To-Low 
                                            $q2->orderBy('selling_price','DESC');
                                        })
                                        ->when($this->priceInputs== 'Low-To-High',  function($q2){  //High-To-Low 
                                            $q2->orderBy('selling_price','ASC');
                                        });
                                }) 
                                ->where('status','0')->get();
       // $this->category = "";
        return view('livewire.frontend.product.index', ['products' => $this->products,'category'=> $this->category]);
    }
}
