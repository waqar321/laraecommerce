<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller{

    public function index(){
    	return view('admin.category.index'); 
    }

    public function create(){
    	return view('admin.category.create');
    }
	public function store(CategoryFormRequest $request){

			$validatedData = $request->validated();

            $category = new category;
			$category->name = $validatedData['name'];
    		$category->slug = Str::slug($validatedData['name']);
    		$category->description = $validatedData['description'];
    		
    		if($request->hasFile('image')){                      //return true or false
                $file = $request->file('image');                 // return image object
                $ext = $file->getClientOriginalExtension();      //return image extension
                $filename = time().'.'.$ext;                     //return time + image extension  
                $file->move('uploads/category/', $filename);    //create if not exist directory, and add file to it.
	    		$category->image = $filename;
    		}

    		$category->meta_title = $validatedData['meta_title'];
    		$category->meta_keyword = $validatedData['meta_keyword'];
    		$category->meta_description = $validatedData['meta_description'];
    
            $category->status = $request->status == true ? '1':'0';
    		$category->save();

    		return redirect('admin/category ')->with('message','Category has been added Succesffuly');

	}
    public function edit(Category $category=null){
        echo "Edit and update operation is done by livewire";
        // return view('admin.category.edit', compact('category'));   //product ki id ke object ke sath view me bhejega 
    }
    public function update(CategoryFormRequest $request, $category){    

        echo "Edit and update operation is done by livewire";
        /*$validatedData = $request->validated();
        $category = Category::findOrFail($category);        // findOrFail($id) takes an id & a object of product, 
        //categogy table me jao jo id aai he uska object utha ke le ao.
        
        $category->name = $validatedData['name'];
        $category->slug = Str::slug($validatedData['name']);
        $category->description = $validatedData['description'];
        
        if($request->hasFile('image')){                      //return true or false

            $path = 'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->file('image');                 // return image object
            $ext = $file->getClientOriginalExtension();      //return image extension
            $filename = time().'.'.$ext;                     //return time + image extension  
            $file->move('uploads/category/', $filename);    //create if not exist directory, and add file to it.
            $category->image = $filename;
        }

        $category->meta_title = $validatedData['meta_title'];
        $category->meta_keyword = $validatedData['meta_keyword'];
        $category->meta_description = $validatedData['meta_description'];

        $category->status = $request->status == true ? '1':'0';
        $category->update();

        return redirect('admin/category ')->with('message','Category has been Updated Succesffuly');
*/
    }
    public function delete(CategoryFormRequest $request, $category){
        echo "Delete operation is done by livework";
        // dd($category);
    }
}
