@extends('layouts.admin')

@section('content')

	  <div class="row">
        <div class="col-md-12">
            	@if (session('message'))
            		<div class="alert alert-success"> {{ session('message') }}  </div>
            	@endif

            	<div class="card">
            		<div class="card-header">/
	       	  			<h4> Colors 
	       	  				<a href="{{ url('admin/colors/create') }} " class="btn btn-primary btn-sm  float-end"> Add Colors </a>
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
								<th> Color </th>
								<th> Code </th>
								<th> Status </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
							@foreach($colors as $color)
							<tr>
								<td> {{ $color->id }} </td>
								<td> {{ $color->name }} </td>
								<td> {{ $color->code }} </td>
								<td> {{ $color->status ? 'Hidden':'Visible' }} </td>
								<td>
									<a href="{{ URL('/admin/colors/'.$color->id.'/edit') }}" class="btn btn-sm btn-primary"> Edit </a>
									<a href="{{ URL('admin/colors/'.$color->id.'/delete')  }}" onclick="return confirm('Are you sure you want to delete it?')" class="btn btn-sm btn-danger"> Delete </a>
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

