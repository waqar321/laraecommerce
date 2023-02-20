@extends('layouts.admin')

@section('content')
	  

	  <div class="row">
            <div class="col-md-12">
            	@if (session('message'))
            		<div class="alert alert-success"> {{ session('message') }}  </div>
            	@endif

            	<div class="card">
            		<div class="card-header">
	       	  			<h4> Products  
	       	  				<a href="{{ url('admin/product/create') }} " class="btn btn-primary btn-sm  float-end"> Add Product </a>
	       	  			</h4>
       	  			</div>
   	  			</div>
  			</div>
		</div>
			<div class="card-body">     
			 	<table class="table table-bordered table-striped">
			 		<thead>
			 			<tr>
			 			 	<th>ID</th>	
			 			 	<th>Category</th>	
			 			 	<th>Product</th>
			 			 	<th>Price</th>	
			 			 	<th>Quantity</th>	
			 			 	<th>Status</th>	
			 			 	<th>Action</th>	
			 			<tr>
		 			
		 			<tbody>
		 				@forelse($products as $product)
			 				<tr>
			 					<td> {{ $product->id }} </td>
	
				 					@if($product->category)
				 						<td> {{ $product->category->name }} </td>
				 					@else
				 						<td> No Category </td>
				 					@endif
				 					<!-- product table se  category table  ka relation he me with the help 
				 						 of foreign key, humne product modal ke andar 1 function baanaya he
				 						 jiska naam category he or usey humne yahan call kia he jiska code ye he
				 						 $product->category, ye function ye bata rha ke product ka category ke
				 						 table ke asth relaton he to lehaza product caegory ki fields ko call 
				 						 kar sakta he, or is bat ko "BelongsTo" define karta he..
				 					  	 isi liye hum categories ki fields ko call kar sakte hen directly
				 					  	 q ke humne product modal me bataya hua he ke this table 
				 					  	 belongsTo cagory with the help of category_id -->

			 					<td> {{ $product->name }} </td>
			 					<td> {{ $product->selling_price }} </td>
			 					<td> {{ $product->quantity }} </td>
			 					<td> {{ $product->status =='1'?'Hidden':'Visible' }} </td>
			 					<td> 
			 						<a href="{{ URL('admin/products/'.$product->id.'/edit') }}" class="btn btn-sm btn-success"> Edit </a>
			 						<a href="{{ URL('admin/products/'.$product->id.'/delete') }}" onclick="return confirm('Are you sure, you want to delete this data?')" class="btn btn-sm btn-danger"> Delete </a>
			 					</td>
			 				</tr>	
		 				@empty
			 				<tr> 
			 					<td colspan="7"> No Product Available </td>
			 				</tr>	
		 				@endforelse
		 			</tbody>	
			 		
			 		</thead>
			 	</table>
		</div>
@endsection

