<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\File;
use App\Models\slider;

class SliderController extends Controller{
    
    public function index(){

    	$sliders = slider::all();
    	return view('admin.slider.index', compact('sliders'));
    }
    public function create(){

    	return view('admin.slider.create');
    }
    public function store(SliderFormRequest $request){
		
		$validatedData = $request->validated();
		
		if($request->hasFile('image')){
				$file = $request->file('image');
				$ext = $file->getClientOriginalExtension();   //.jpg
				$filename = time().'.'.$ext; 				  // 162333.jpg
				$file->move('uploads/slider/', $filename);    // move file to 162333.jpg
				$validatedData['image'] = 'uploads/slider/'.$filename;   //save address in table
	
		}

		$validatedData['status'] = $request->status == true ? '1':'0';	

		slider::create([
			'title' => $validatedData['title'],
			'description' => $validatedData['description'],
			'image' => $validatedData['image'],
			'status' => $validatedData['status'],
		]);
		return redirect('admin/slider')->with('message','Slider added successfully');
    }

    public function edit($edit_id){
    	
    	$slider = slider::findOrFail($edit_id);
      	return view('admin.slider.edit',compact('slider'));
    }
    public function update(SliderFormRequest $request, slider $slider){

        $validatedData = $request->validated();

        if($request->hasFile('image')){
             
                $destintion = $slider->image;               //edit image path
                if(File::exists($destintion)){
                    File::delete($destintion);
                }

                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();   //.jpg
                $filename = time().'.'.$ext;                  // 162333.jpg
                $file->move('uploads/slider/', $filename);    // move file to 162333.jpg
                $validatedData['image'] = 'uploads/slider/'.$filename;   //save address in table
                slider::where('id', $slider->id)->update(['image' => $validatedData['image']]);

        }

        $validatedData['status'] = $request->status == true ? '1':'0';  

        slider::where('id', $slider->id)->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
        ]);
        return redirect('admin/slider')->with('message','Slider Updated successfully');

    }
    public function delete(slider $slider){
	   
        if($slider->count() > 0 ){
         
            $destintion = $slider->image;               //edit image path
            if(File::exists($destintion)){
                File::delete($destintion);
            }
            $slider->delete();

            return redirect('admin/slider')->with('message','Slider Deleted successfully');
        }
        return redirect('admin/slider')->with('message','Slider Did not Deleted!!');
    }
}
