@extends('layouts.admin')

@section('content')
    		
 	  <div class="row">
            <div class="col-md-12">
            	<div class="card">
            		<div class="card-header">

       	  			<h4> Add Category	 
       	  				<a href="{{ url('admin/category') }} " class="btn btn-primary btn-sm  float-end"> Back </a>
       	  			</h4>
       	  			</div>
       	  			<div class="card-body"> 
						<form action="http://localhost:8000/admin/category/" method="post" enctype="multipart/form-data">
			
							@csrf
							<div class="row">
								<div class="col-md-6 mb-3">   <!-- Name div -->
									<label> Name</label>
									<input type="text" name="name" class="form-control"/>
								</div>
								<div class="col-md-6 mb-3">   <!-- Slug div -->
									<label> Slug</label>
									<input type="text" name="slug" class="form-control"/>
								</div>	
								<div cl ass="col-md-6 mb-3">   <!-- Description div -->
                                	<label> Description</label>
                                	<textarea name="description" class="form-control" rows="3"> </textarea>
                           		 </div>
								<div cl ass="col-md-6 mb-3">  <!-- Image div -->
									<label> Image</label>
									<input type="file" name="image" class="form-control"/>
								</div>
								<div class="col-md-6 mb-3"> 	<!-- Status div -->
									<label> Status</label><br/>
									<input type="checkbox" name="status"/>
								</div>
								
								<div class="col-md-12" mb-3>
									<h4> SEO tags </h4>
								</div>
								<br>
								<div cl ass="col-md-12 mb-3"> 	<!-- Meta Title div -->
									<label> Meta Title</label>
									<input type="text" name="meta_title" class="form-control"/>
								</div>
								<div cl ass="col-md-12 mb-3"> 	<!-- Meta Keyword div -->
									<label> Meta Keyword</label>
									<textarea name="meta_keyword" class="form-control" rows="3"> </textarea>
								</div>
								<div cl ass="col-md-12 mb-3"> 	<!-- Meta Description div -->
									<label> Meta Description </label>
									<textarea name="meta_description" class="form-control" rows="3"> </textarea>
								</div>
								<div cl ass="col-md-12 mb-3">	<!-- button div -->
										<button type="submit" class="btn btn-primary float-end"> Save </button>
								</div>		
							</div>
						</form>
					</div>
       	  		</div>
       	  	</div>
       	  </div>

@endsection