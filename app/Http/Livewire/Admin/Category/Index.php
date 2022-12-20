<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

class Index extends Component
{	
	use WithPagination;
	protected $paginationTheme = 'bootstrap';
	public $category_id;

    
    public function render(){	
    	$categories = Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }

    public function deleteCategory($category_id){
    	$this->$category_id = $category_id;
    }

    public function destroyCategory(){

    	$category = Category::find($category_id);   	//category table me jao jahan id ye ho uska object utha ke lao.

  		$path = 'uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        session()->flash('message','Category has been deleted');
    }

}
        