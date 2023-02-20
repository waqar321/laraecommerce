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
          <form action="{{ URL('admin/colors/create') }}" method="post">
              @csrf
              <div class="mb-3">
                  <label> Color Name</label>
                  <input type="" name="name" class="form-control">
              </div>
              <div class="mb-3">
                  <label> Color Code</label>
                  <input type="" name="code" class="form-control">
              </div>
              <div class="mb-3">
                  <label> Status </label><br/>
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

