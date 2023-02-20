<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\This;


class Index extends Component
{	
	use WithPagination;
    use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $category_id;
    public $editcategoryId, $name, $slug, $description, $meta_title, $meta_keyword, $meta_description, $EditImage;
    public $CreatecategoryId, $Cname, $Cslug, $Cdescription, $Cmeta_title, $Cmeta_keyword, $Cmeta_description, $Cimage;
    public $status;

    public function render(){	
    	$categories = Category::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.category.index', ['categories' => $categories]);
    }

    public function CreateCategory(){               //this shows pop added form  
         $this->dispatchBrowserEvent('show-create-student-modal');    
    }
    public function CreateCategoryData(){           //this closes add form after inserting in db
        
            $validatedData = $this->validate([
                'Cname' => 'required',
                'Cslug' => 'required',
                'Cdescription' => 'required',
                'Cimage' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
                'Cmeta_title' => 'required',
                'Cmeta_keyword' => 'required',
                'Cmeta_description' => 'required',
            ]);

            if(!empty($this->Cimage)){
                $Cimage = $this->Cimage->store('uploads/category','public');         //php artisan storage:link, this will save at 
                // http://localhost:8000/storage/uploads/category/SXbWtdksKmALVSfHitAzp3PDViicamJLLlROdQsX.jpg
                // dd($this->Cimage);   // ye pura object pass karega image ka..
                //  dd($Cimage);         // ye image ka address pass karega
            }
            $category = new category;
            $category->name = $this->Cname;
            $category->slug = $this->Cslug;
            $category->description = $this->Cdescription;
            $category->image = $Cimage;
            $category->meta_title = $this->Cmeta_title;
            $category->status = $this->status == true ? '1':'0';
            $category->meta_keyword = $this->Cmeta_keyword;
            $category->meta_description = $this->Cmeta_description;
    
            $category->save();
            session()->flash('message', 'Category has been Added successfully');
            $this->CloseCreate();
            // $this->dispatchBrowserEvent('close-modal');  
    }
    public function CloseCreate(){
        $this->Cname = "";
        $this->Cslug = "";
        $this->Cdescription = "";
        $this->Cimage = "";
        $this->Cmeta_title = "";
        $this->Cmeta_keyword = "";
        $this->Cmeta_description = "";
        $this->dispatchBrowserEvent('close-modal');
    }
    public function editcategory($id){
           // $this->editcategoryId = $id;
            $Category = Category::where('id', $id)->first();
            $this->editcategoryId = $Category->id;
            $this->name = $Category->name;
            $this->slug = $Category->slug;
            $this->description = $Category->description;
            $this->EditImage = $Category->image;
            $this->meta_title = $Category->meta_title;
            $this->meta_keyword = $Category->meta_keyword;
            $this->meta_description = $Category->meta_description;

            $this->dispatchBrowserEvent('show-edit-student-modal');
    }

    public function editCategoryData(){

        $category = Category::where('id', $this->editcategoryId)->first();
        
        // $destintion = 'storage/'.$this->EditImage;            //edit image path
        // if(File::exists($destintion)){
        //        //File::delete($destintion);
        //    }            
        
        // if(!empty($this->EditImage)){
           
        //     $Cimage = $this->EditImage->store('uploads/category','public');         //php artisan storage:link, this will save at 
        // }
           
        dd("image doesn't exist");
        $category->name = $this->name;
        $category->slug = Str::slug($this->slug);
        $category->description = $this->description;
        $category->image = $Cimage;
        $category->meta_title = $this->meta_title;  
        $category->status = $this->status == true ? '1':'0';
        $category->meta_keyword = $this->meta_keyword;
        $category->meta_description = $this->meta_description;
        $category->update();
        session()->flash('message', 'Student has been updated successfully');

        //For hide modal after add student success
        $this->dispatchBrowserEvent('close-modal');

    }
    public function CloseEdit(){
        $this->editcategoryId = '';
        $this->name = '';
        $this->slug = '';
        $this->description = '';
        $this->meta_title = '';
        $this->meta_keyword = '';
        $this->meta_description = '';
        $this->dispatchBrowserEvent('close-modal');
    }

    public function deleteCategory($id){
        $this->category_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation-modal');
    }
    public function destroyCategory(){
        // dd($this->category_id);
        $category = Category::find($this->category_id);     //category table me jao jahan id ye ho uska object utha ke lao.
        $category->delete();

        session()->flash('message','Category has been deleted');
        $this->dispatchBrowserEvent('close-modal');
        $this->category_id = '';
    }

}
        