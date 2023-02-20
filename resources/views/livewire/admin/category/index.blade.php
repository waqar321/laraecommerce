<div>
    @include('livewire.admin.category.DeleteCategoryModal')
    @include('livewire.admin.category.editCategoryModal')
    @include('livewire.admin.category.AddCategoryModal')


  <div class="row">
	<div class="col-md-12">
		<div class="card">
	        @if(session('message'))
	          <h2>{{ session('message') }}, </h2>
	        @endif  
			<div class="card-header">

	  			<h4> Category	 
	  				<a href="#" wire:click="CreateCategory()" class="btn btn-primary btn-sm float-end" > Add Category </a>
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
   								<!-- <a href="{{ url('admin/category/'.$category->id.'/edit') }} " class="btn btn-success"> Edit</a>   -->
				
                     <button class="btn btn-success" wire:click="editcategory({{ $category->id }})">Edit</button>
                     <button href="#" wire:click="deleteCategory({{ $category->id }})" class="btn btn-danger" >Delete</button>
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

@push('scripts')
    <script>
         window.addEventListener('close-modal', event =>{
            $('#deleteModal').modal('hide');
            $('#editStudentModal').modal('hide');
            $('#CreateStudentModal').modal('hide');
        });
       
        window.addEventListener('show-edit-student-modal', event =>{
            $('#editStudentModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteModal').modal('show');
        });
        window.addEventListener('show-create-student-modal', event =>{
            $('#CreateStudentModal').modal('show');
        });
        
       
    </script>
@endpush