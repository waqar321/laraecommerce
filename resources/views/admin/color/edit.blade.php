@extends('layouts.admin')

@section('content')

	  <div class="row">
        <div class="col-md-12">
            	@if (session('message'))
            		<div class="alert alert-success"> {{ session('message') }}  </div>
            	@endif

            	<div class="card">
            		<div class="card-header">
	       	  			<h4> Colors 
	       	  				<a href="{{ url('admin/colors') }} " class="btn btn-danger btn-sm  text-white float-end"> Add Colors </a>
	       	  			</h4>
       	  			</div>
   	  			</div>
  			</div>
		</div>
		<div class="card-body">    
			<form action="{{ url('admin/colors/'.$color->id) }}" method="post">
				@csrf
				
              <div class="mb-3">
                  <label> Color Name</label>
                  <input value="{{ $color->name }}" type="text" name="name" class="form-control">
              </div>
              <div class="mb-3">
                  <label> Color Code</label>
                  <input value="{{ $color->code }}" type="text" name="code" class="form-control">
              </div>
              <div class="mb-3">
                  <label> Status </label><br/>
                  <input type="checkbox" name="status" {{ $color->status ? 'checked':'' }} style="width:50px; height:50px;" >
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

