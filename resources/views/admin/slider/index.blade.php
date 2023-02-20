@extends('layouts.admin')

@section('content')

	  <div class="row">
        <div class="col-md-12">
            	@if (session('message'))
            		<div class="alert alert-success"> {{ session('message') }}  </div>
            	@endif

            	<div class="card">
            		<div class="card-header">
	       	  			<h4> Slider 
	       	  				<a href="{{ url('admin/slider/create') }} " class="btn btn-primary btn-sm  float-end"> Add Slider </a>
	       	  			</h4>
       	  			</div>
   	  			</div>
  			</div>
		</div>
				<div class="card-body"> 

					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th> ID </th>
								<th> Title  </th>
								<th> Description </th>
								<th> Image </th>
								<th> Status </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
							@foreach($sliders as $slider_data)
								<tr>
								 	<td> {{ $slider_data-> id}} </td>
								 	<td> {{ $slider_data-> title}} </td>
								 	<td> {{ $slider_data-> description}} </td>
								 	<td> 
								 		 <img srf="{{ asset($slider_data->image) }}" style="width: 70px; height:70px" alt="">
								 	</td>
								 	<td> {{ $slider_data-> status == '0' ? 'Visible':'Hidden'}} </td>	
								 	<td>
								 		<a href="{{ URL('admin/slider/'.$slider_data->id.'/edit') }}" class="btn btn-success"> Edit </a>
								 		<a href="{{ URL('admin/slider/'.$slider_data->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-danger"> Delete </a>
								 	 </td>
								</tr>
							@endforeach
						</tbody>
					</table>	
	  			</div>
  			</div>
		</div>
	</div>
@endsection

