@extends('layouts.admin')

@section('content')

	  <div class="row">
        <div class="col-md-12">
            	@if (session('message'))
            		<div class="alert alert-success"> {{ session('message') }}  </div>
            	@endif

            	<div class="card">
            		<div class="card-header">
	       	  			<h4> Edit Slider 
	       	  				<a href="{{ url('admin/slider') }}" class="btn btn-danger btn-sm  text-white float-end"> Add Slider  </a>
	       	  			</h4>
       	  			</div>
   	  			</div>
  			</div>
		</div>
				<div class="card-body">
          <form action="{{ url('admin/sliders/'.$slider->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              
              <div class="mb-3">
                  <label> Title</label>
                  <input type="text" value="{{ $slider->title}}" name="title" class="form-control">
              </div>
              <div class="mb-3">
                  <label> Description</label>
                  <textarea  name="description" class="form-control" rows="3"> {{ $slider->description }} </textarea>
              </div>
            <div class="mb-3">
                  <label> Image </label>
                  <input type="file" name="image" class="form-control"/> 
                  <img src="{{ asset($slider->image) }}" style="width: 50px; height: 50px;" class="me-4" alt="slider">
				

              </div>

              <div class="mb-3">
                  <label> Status  </label><br/> 	   
                  <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked':'' }} style="width:50px; height:50px;">  							
                  checked=Hidden, UnChecked=Visible  <br/>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary"> Update </button>
              </div>

          </form>
	  			</div>
  			</div>
		</div>
	</div>
@endsection

