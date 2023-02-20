<?php

namespace App\Http\Livewire\Admin\Brand;
use App\Models\Brand;
use App\Models\Category;
use WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Livewire\Component;

class Index extends Component
{

	public $brand_id, $name, $slug, $status, $category_id;

    public function render(){
       
        $categories = Category::where('status','0')->get();
        $brands = Brand::orderBy('id','DESC')->paginate(5);
        // return view('livewire.admin.category.index', ['categories' => $categories]);
        return view('livewire.admin.brand.index', ['brands' => $brands, 'categories' => $categories])
                    ->extends('layouts.admin')
                    ->section('content'); 
    }
    
    public function CreateBrand(){
        $this->dispatchBrowserEvent('show-create-brand-modal');    
    }

    public function storeBrand(){
    	
        $validatedData = $this->validate([
                'name' => 'required|string',
                'slug' => 'required|string',
                'status'  => 'nullable',
        ]);

        $Brand = new Brand;
        $Brand->name = $this->name;
        $Brand->slug = $this->slug;
        $Brand->status = $this->status == true ? '1':'0';
        $category_id = $this->category_id;

        $Brand->save();

       session()->flash('message', 'Brand has been added successfully');
       $this->dispatchBrowserEvent('close-modal');
	   $this->CloseAddBrand();
    }

    public function CloseAddBrand(){
        
        $this->name = null;
        $this->slug = null;
        $this->status = null;
        $this->category_id = null;
        $this->dispatchBrowserEvent('close-modal');
    }

    public function editbrand($id){
           // $this->editcategoryId = $id;category = new ;
            $brand = Brand::where('id', $id)->first();
            $this->editbrandId = $brand->id;
            $this->name = $brand->name;
            $this->slug = $brand->slug;
            $this->status = $brand->status;
            $this->category_id = $brand->category_id;

            $this->dispatchBrowserEvent('show-edit-brand-modal');
    }

    public function editBrandData(){
        // dd($this->editbrandId);
        $this->category_id; 
        $brand = Brand::where('id', $this->editbrandId)->first();
       
        $brand->name = $this->name;
        $brand->slug = Str::slug($this->slug);
        $brand->status = $this->status;
        $category_id = $this->category_id;
        $brand->update();
        session()->flash('message', 'Student has been updated successfully');

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteBrand($id){
        $this->brand_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }
    
    public function destroyBrand(){
        // dd($this->category_id);
        $brand = brand::find($this->brand_id);     //category table me jao jahan id ye ho uska object utha ke lao.
        $brand->delete();

        session()->flash('message','Category has been deleted');
        $this->dispatchBrowserEvent('close-modal');
        $this->category_id = '';
    }


}
