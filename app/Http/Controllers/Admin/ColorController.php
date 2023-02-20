<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use Illuminate\Http\Request;
use App\Models\color;

class ColorController extends Controller{
    	
    public function index(){
    	$colors = Color::all();
    	return view('admin.color.index',compact('colors'));
    }
    public function create(){
    	return view('admin.color.create');
    }		
    public function store(ColorFormRequest $request){
		
		$validatedData = $request->validated();
		$validatedData['status'] = $request->status == true ? '1':'0';
		Color::create($validatedData);
		
		return redirect('/admin/colors')->With('message','Color added successfully!');
    }
    public function edit(int $color_id){
    	
    	$color = color::findOrFail($color_id);
      	return view('admin.color.edit',compact('color'));
    }
    public function update(ColorFormRequest $request, int $color_id){

    	$validatedData = $request->validated();
    	/*
    	if($request->status==true){
    			$request->status = 1;
    			$validatedData['status'] = $request->status; 
    	}else{
    			$request->status = 0;
    			$validatedData['status'] = $request->status; 
    	}
    	*/
		$validatedData['status'] = $request->status == true ? '1':'0';  // if status true arha to 1 return kardo warna 0
		Color::find($color_id)->update($validatedData);
		
		return redirect('/admin/colors')->With('message','Updated added successfully!');
	
    }
    public function delete(int $color_id){
		$color = color::findOrFail($color_id);      
        $color->delete();

		return redirect('/admin/colors')->With('message','Color Has Been Delete successfully!');
    }	
}
