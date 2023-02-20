@extends('layouts.admin')

@section('content')
	  

	  <div class="row">
            <div class="col-md-12">
            	<div class="card">
            		<div class="card-header">
	       	  			<h3> Add Products 
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

			<form action="{{ URL('/admin/products') }}" method="post" enctype="multipart/form-data">
					@csrf

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
				    	<button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
				    		Product Colors
				    	</button>
				  	</li>
				</ul>

				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade  border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
					  	<div class="mb-4">
					  		
					  		<labl> Category </labl>
					  			<select name="category_id" class="form-control">
					  				@foreach($categories as $category)
					  					<option value="{{ $category->id }}"> {{ $category->name }} </option>
					  				@endforeach
					  		</select>
					    </div>

				    	<div class="mb-3">
				    		<label> Product name </label>
				    		<input type="text" name="name" class="form-control"/>
				    	</div>

				    	<div class="mb-3">
				    		<label> Product Slug </label>
				    		<input type="text" name="slug" class="form-control"/>
				    	</div>
			
					  	<div class="mb-3">
					  		<labl> Select  Brands </labl>
					  			<select name="brand" class="form-control">
					  				@foreach($brands as $brand)
					  					<option value="{{ $brand->id }}"> {{ $brand->name }} </option>
					  				@endforeach
					  		</select>
					    </div>


				    	<div class="mb-2">
				    		<label> Product Small Description </label>
				    		<textarea name="small_description" class="form-control" row="4"> </textarea>
				    	</div>

				    	<div class="mb-3">
				    		<label> Product Description </label>
				    		<textarea name="description" class="form-control" row="4"> </textarea>
				    	</div>
				    </div>
					<div class="tab-pane fade border p-3" id="seotag-pane" role="tabpanel" aria-labelledby="seotag" tabindex="0">	
			  		    
			  		    	<div class="mb-3">
				    			<label> Meta Title </label>
				    			<input type="text" name="meta_title" class="form-control"/>
				    		</div>

				    		<div class="mb-3">
				    			<label> Meta Description </label>
				    			<input type="text" name="meta_description" class="form-control"/>
				    		</div>

				    		<div class="mb-3">
				    			<label> Meta Keyword  </label>
				    			<input type="text" name="meta_keyword" class="form-control"/>
				    		</div>
			    	</div>	 			  
					<div class="tab-pane fade border p-3" id="detail-tab-pane" role="tabpanel" aria-labelledby="detail-tab" tabindex="0">	
					  
					   <div class="row">	  		
			
					  		<div class="mb-4">
					  			<div class="mb-3">
					    			<label> Original Price </label>
					    			<input type="text" name="original_price" class="form-control"/>
				    			</div>
				    		</div>

					  		<div class="mb-4">
					  			<div class="mb-3">
					    			<label> Selling price </label>
					    			<input type="text" name="selling_price" class="form-control"/>
				    			</div>
				    		</div>

					  		<div class="mb-4">
					  			<div class="mb-3">
					    			<label> Quantity </label>
					    			<input type="text" name="quantity" class="form-control"/>
				    			</div>
				    		</div>

					  		<div class="mb-4">
					  			<div class="mb-3">
					    			<label> Trending </label><br>
					    			<input type="checkbox" name="trending" style="width:100px">
				    			</div>
				    		</div>

					  		<div class="mb-4">
					  			<div class="mb-3">
					    			<label> Status </label><br>
					    			<input type="checkbox" name="Status" style="width:100px">
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
						</div> 
					</div> 
					<div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">	
					  
					  	<div class="mb-3">
							<label> Select Color</label>
							<hr/>
							<div class="row">
								@forelse($colors as $coloritem)
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
				   </div>
					
					<button type="submit" class="btn btn-primary"> Submit </button >
				</div>
			</form>
				</div>
			</div>
		</div>
	</div>

@endsection

 