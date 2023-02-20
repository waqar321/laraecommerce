@extends('layouts.admin')

@section('content')

	  <div class="row">
        <div class="col-md-12">
            	@if (session('message'))
            		<div class="alert alert-success"> {{ session('message') }}  </div>
            	@endif

            	<div class="card">
            		<div class="card-header">
	       	  			<h4> Add Slider 
	       	  				<a href="{{ url('admin/slider') }} " class="btn btn-danger btn-sm  text-white float-end"> Back </a>
	       	  			</h4>
       	  			</div>
   	  			</div>
  			</div>
		</div>
				<div class="card-body">
          <form action="{{ URL('admin/slider/create') }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                  <label> title</label>
                  <input type="text" name="title" class="form-control">
              </div>
              <div class="mb-3">
                  <label> Description</label>
                  <textarea  name="description" class="form-control" rows="3"> </textarea>
              </div>
            <div class="mb-3">
                  <label> Image </label>
                  <input type="file" name="image" class="form-control"/>
              </div>

              <div class="mb-3">
                  <label> Status  </label><br/>
                  <input type="checkbox" style="width:50px; height:50px;" name="status"> checked=Hidden, UnChecked=Visible  <br/>
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary"> Save </button>
              </div>

          </form>
	  			</div>
  			</div>
		</div>
	</div>
@endsection

