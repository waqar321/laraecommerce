@extends('layouts.admin')

@section('content')
	  

	  <div class="row">
            <div class="col-md-12">
            	<div class="card">
            		<div class="card-header">
	       	  			<h3> Edit Products 
	       	  				<a href="{{ url('admin/product') }} " class="btn btn-danger btn-sm  float-end"> 
	       	  					Back 
	       	  				</a>
	       	  			</h3>
       	  			</div>

			<div class="card-body">  

				@If ($errors->any())
					<div class="alert alert-warning">
						@foreach($errors->all() as $error)
							<div> {{ $error }}</div>
						@endforeach
					</div>
				@endif

			<form action="{{ URL('/admin/products/'.$product->id) }}" method="post" enctype="multipart/form-data">
				@csrf
				@method('PUT')

			  	<ul class="nav nav-tabs" id="myTab" role="tablist">  
				  	
				  	<li class="nav-item" role="presentation">
				    	<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
				    		Home
						</button>
				  	</li>

				  	<li class="nav-item" role="presentation">
				    	<button class="nav-link" id="seotag" data-bs-toggle="tab" data-bs-target="#seotag-pane" type="button" role="tab" aria-controls="seotag-pane" aria-selected="false">
				    		SEO Tags
						</button>
				  	</li>

				  	<li class="nav-item" role="presentation">
				    	<button class="nav-link" id="detail-tab" data-bs-toggle="tab" data-bs-target="#detail-tab-pane" type="button" role="tab" aria-controls="detail-tab-pane" aria-selected="false">
				    		Product Details
				    	</button>
				  	</li>
					<li class="nav-item" role="presentation">
				    	<button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
				    		Product Images
				    	</button>
				  	</li>	
				  	<li class="nav-item" role="presentation">
				    	<button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors-tab-pane" type="button" role="tab" aria-controls="colors-tab-pane" aria-selected="false">
				    		Product colors
				    	</button>
				  	</li>
				</ul>

				<div class="tab-content" id="myTabContent"> 
					<div class="tab-pane fade  border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
					  	<div class="mb-4">
					  		<labl> Category </labl>
					  			<select name="category_id" class="form-control">
					  				@foreach($categories as $category)
					  					<option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected':'' }}>  
					  						{{ $category->name }} 
					  					</option>
					  				@endforeach
					  				<!-- 
										agar $category->id equal he $product->category_id ke to  $category->name show hojae..
										or ye id tab match karti he jub foreign key ke through relation bana hua ho..
					  				-->
					  		</select>
					    </div>

				    	<div class="mb-3">
				    		<label> Product name </label>
				    		<input value="{{ $product->name }}"type="text" name="name" class="form-control"/>
				    	</div>

				    	<div class="mb-3">
				    		<label> Product Slug </label>
				    		<input value="{{ $product->slug }}" type="text" name="slug" class="form-control"/>
				    	</div>
			
					  	<div class="mb-3">
					  		<labl> Select  Brands </labl>
					  			<select name="brand" class="form-control">
					  				@foreach($brands as $brand)
					  					<option value="{{ $brand->id }}" {{ $brand->id == $product->brand?'selected':''}}> 
					  						{{ $brand->name }}
					  				    </option>
					  				    <!-- 
											agar $brand->id equal he $product->brand pe jo id he to select ho warna khali show ho.
					  				    -->
					  				@endforeach
					  		</select>
					    </div>


				    	<div class="mb-2">
				    		<label> Product Small Description </label>
				    		<textarea value="" name="small_description" class="form-control" row="4"> {{ $product->small_description }} </textarea>
				    	</div>

				    	<div class="mb-3">
				    		<label> Product Description </label>
				    		<textarea value="" name="description" class="form-control" row="4">{{ $product->description }}  </textarea>
				    	</div>
				    </div>
					<div class="tab-pane fade border p-3" id="seotag-pane" role="tabpanel" aria-labelledby="seotag" tabindex="0">	
			  		    
			  		    	<div class="mb-3">
				    			<label> Meta Title </label>
				    			<input value="{{ $product->meta_title }}" type="text" name="meta_title" class="form-control"/>
				    		</div>

				    		<div class="mb-3">
				    			<label> Meta Description </label>
				    			<input value="{{ $product->meta_description }}" type="text" name="meta_description" class="form-control"/>
				    		</div>

				    		<div class="mb-3">
				    			<label> Meta Keyword  </label>
				    			<input value="{{ $product->meta_keyword }}" type="text" name="meta_keyword" class="form-control"/>
				    		</div>
			    	</div>	 			  
					<div class="tab-pane fade border p-3" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">	
					  
					   <div class="row">	  		
			
					  		<div class="mb-4">
					  			<div class="mb-3">
					    			<label> Original Price </label>
					    			<input value="{{ $product->original_price }}" type="text" name="original_price" class="form-control"/>
				    			</div>
				    		</div>

					  		<div class="mb-4">
					  			<div class="mb-3">
					    			<label> Selling price </label>
					    			<input value="{{ $product->selling_price }}" type="text" name="selling_price" class="form-control"/>
				    			</div>
				    		</div>

					  		<div class="mb-4">
					  			<div class="mb-3">
					    			<label> Quantity </label>
					    			<input value="{{ $product->quantity }}" type="text" name="quantity" class="form-control"/>
				    			</div>
				    		</div>

					  		<div class="mb-4">
					  			<div class="mb-3">
					    			<label> Trending </label><br>
					    			<input type="checkbox" id="trending" name="trending" {{ $product->trending == '1'?'checked':'' }} style="width:100px">
				    			</div>
				    		</div>

					  		<div class="mb-4">
					  			<div class="mb-3">
					    			<label> Status </label><br/>
					    			<input type="checkbox" name="status"  {{ $product->status == '1'?'checked':'' }} style="width:100px" />
				    			</div>
				    		</div>
					   </div>
					</div> 		  
					<div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">	
				  		
					   <div class="row">	  		
					  		<div class="mb-4">
					  			<label> Upload Product Images </label>
					   			<input type="file" name="image[]" multiple class="form-control" >
					   		</div>	
					   		<div>
					   			@if($product->productImages)
					   				<div class="row">
						   				@foreach($product->productImages as $image) 
					   					<div class="col-md-2">
						   					<img src="{{ asset($image->image) }}" style="width: 80px; height: 80px;" class="me-4" alt="Img">
					   						<a href="{{ URL('admin/product-image/'.$image->id.'/delete')}}" class="d-block"> Remove </a>
					   					</div>
					   					@endforeach
					   				</div>	
					   			@else
					   				<h2> No imaged added </h2>
					   			@endif

					   			  
					   		</div>		  	
						</div> 
					</div> 
					<div class="tab-pane fade border p-3" id="colors-tab-pane" role="tabpanel" tabindex="0">	
					  
					  	<div class="mb-3">
					  		<h4> Add Product Color </h4>
							<label> Select Color</label>
							<hr/>
							<div class="row">
								@forelse($colors as $coloritem)   <!-- wo color ki id uthao jo nhi assign -->
									<div class="col-md-3">
										<div class="p-2 border" mb-3> 

											Color: <input type="checkbox" name="colors[{{ $coloritem->id }}]" value="{{ $coloritem->id }}"> 
											{{ $coloritem->name }}
											<br/>
											Quantity: <input type="number" name="colorquantity[{{ $coloritem->id }}]" style="width:70px; border:1px solid" />
										</div>
									</div>
								@empty
									<div class="col-md-12">
										<h1> No Colors Found </h1>
									</div>
								@endforelse
							</div>		  	
					   </div>
					   <div class="table-responsive">
					   		<table class="table table-sm table-bordered">
				   				<thead>
				   					<tr>
				   						<th> Color Name </th>
				   						<th> Quantity </th>
				   						<th> Delete </th>
				   					</tr>
				   				</thead>
				   				<tbody>

	   								@foreach($product->productColors as $prodColor)   
	   								<!--product ki id 10 ki base pe ProductColor table pe jao or wo sari row uthao -->
				   					
				   					<tr class="product-color-tr"> 
				   						<td> 
				   							@if($prodColor->color)
				   								{{$prodColor->color->name }} <!--color a function in ProductColor -->
				   							@else
				   								No Color Found
				   							@endif
				   																<!--  belongsTo productColor & color
			   																	 color is function in productColor-->
				   						</td>    
				   						<td> 									 
				   							<div class="input-group mb-3" style="width:150px">
												<input type="text" value="{{$prodColor->quantity_id }}" class="productColorQuantity form-control form-control-sm"/>
												<button type="button" id="update" value="{{$prodColor->id }}" class="UpdateProductColorBtn btn btn-primary btn-sm text-white"> Update </button>
											</div>
				   						 </td>
				   						 <td>
												<button type="button" value="{{$prodColor->id }}" class="DeleteProductColor btn btn-danger btn-sm text-white"> Delete </button>
				   						 </td>
				   					</tr>
				   					@endforeach
				   				</tbody>
					   		</table>
					   </div>
				   </div>
					<button type="submit" class="btn btn-primary"> Update </button >
				</div>
			</form>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')
  <script>
     $(document).ready(function(){
   
       $.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

       $(document).on('click', '.UpdateProductColorBtn', function(){
       		
       		var product_id = "{{ $product->id }}";   		 //alert("The value of product:  " + product_id); //e.g:10   
			var prod_color_id = $(this).val();   			 //id in productColor table   e.g:  9,10
		 	var qty = $(this).closest('.product-color-tr').find('.productColorQuantity').val();
			//alert("The value of product:  " + product_id.concat(prod_color_id,qty));

			if(qty <= 0 ){
	         	alert("qty is required");
	         	return false;
         	}

	        var data = {
	         		'product_id': product_id, 			
	         		'qty': qty	
	        };
	        //alert("Product_ID => "+ data.product_id.concat("  Product Qty => " + data.qty));

	        $.ajax({
               type: 'post',
               url:'/admin/product-color/'+prod_color_id,  // /product-color/{prod_color_id}'
               data: data,
               success:function(response){
              		alert(response.message);
               }
            });  
        });

       $(document).on('click', '.DeleteProductColor', function(){
     		var prod_color_id = $(this).val(); 
     		var thisClick = $(this);
     		
     		
     		 $.ajax({
               type: 'get',
               url:'/admin/product-color/'+prod_color_id+"/delete",  // /product-color/{prod_color_id}'
               success:function(response){
              		thisClick.closest('.product-color-tr').remove();
              		alert(response.message);
               }
            }); 

     	});

     });


  </script>

@endsection
<!-- 
			var prod_color_id = $(this).val();   			 //id in productColor table   e.g:  9,10
     		var this = $(this);
     	//	alert(this);

/*	        $.ajax({
               type: 'post',
               url:'/admin/product-color/'+prod_color_id+"/delete",  // /product-color/{prod_color_id}'
               data: data,
               success:function(response){
              		alert(response.message);
               }
            });  
*/ -->