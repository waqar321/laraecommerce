<div>
 <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Category Delete</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="destroyCategory">    <!-- it will go to the live function destroyCategory -->
              <div class="modal-body">
                <h6>  Are you sure! You want to delete this data?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit " class="btn btn-primary">Yes. Delete</button>
              </div>
          </form>
        </div>
      </div>
    </div>

  <div class="row">
	<div class="col-md-12">
		<div class="card">
	        @if(session('message'))
	          <h2>{{ session('message') }}, </h2>
	        @endif  
			<div class="card-header">

	  			<h4> Category	 
	  				<a href="{{ url('admin/category/create') }} " class="btn btn-primary btn-sm  float-end"> Add Category </a>
	  			</h4>
	  			</div>
	  			<div class="card-body"> 
         			<table class="table table-bordered table-striped">
         				<thead>
         					<tr>
         						<th> ID </th>
         						<th> Name </th>
         						<th> Status </th>
         						<th> action </th>
         					</tr>
         				</thead>
         				<tbody>
         					@foreach($categories as $category)
         						<tr>
         							<td> {{ $category->id }}</td>
         							<td> {{ $category->name  }}</td>
         							<td> {{ $category->status == '1' ? 'Hidden':'Visible'  }}</td>
         							<td> 
         								<a href="{{ url('admin/category/'.$category->id.'/edit') }} " class="btn btn-success"> Edit</a>  
         								<a href="#" wire:click="deleteCategory({{$category->id}})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-danger" > Delete</a>  
         							</td>
         						</tr>
         					@endforeach
         				</tbody>
         			</table>
         			<div>
     				{{ $categories->links() }}
     			</div>
  			</div>
  		</div>
  	</div>
  </div> 
</div> 