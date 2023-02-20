
<div>
	@include('livewire.admin.brand.AddBrandModal')
	@include('livewire.admin.brand.EditBrandModal')
	@include('livewire.admin.brand.DeleteBrandModal')


<!--  View Brand -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
			   @if(session('message'))
	          		<h2>{{ session('message') }}, </h2>
       		 @endif  
				<div class="card-header">
					<h4> Brand List 
						
						<a href="#" wire:click="CreateBrand()" class="btn btn-primary btn-sm float-end" > Add Brands </a>
					</h4>
				</div>
				<div class="card-body">
					<table class="table table-bordered table-stiped">
						<thead>
							<tr>
								<th> ID </th>
								<th> Name  </th>
								<th> Slug </th>
								<th> Status </th>
								<th> Action </th>
							</tr>
						</thead>
						<tbody>
					  		@foreach($brands as $brand)					  
	     						<tr>
	     							<td> {{ $brand->id }}</td>
	     							<td> {{ $brand->name  }}</td>
	     							<td> {{ $brand->slug  }}</td>
	     							<td> {{ $brand->status == '1' ? 'Hidden':'Visible'  }}</td>   
	     							<td> 
	     								<button class="btn btn-success" wire:click="editbrand({{ $brand->id }})">Edit</button>
                     					<button href="#" wire:click="deleteBrand({{ $brand->id }})" class="btn btn-danger" >Delete</button>
         							</td> 
	     						</tr>

         					@endforeach

						  </tbody>
					</table>
				</div>
			</div>
		</div>	
	</div>
</div>

@push('scripts')
    <script>
         window.addEventListener('close-modal', event =>{
            $('#addbrandmodal').modal('hide');
            $('#editBrandModal').modal('hide');
            $('#deleteModal').modal('hide');
        });
       
        window.addEventListener('show-edit-brand-modal', event =>{
             $('#editBrandModal').modal('show');
        });

        window.addEventListener('show-delete-confirmation-modal', event =>{
            $('#deleteModal').modal('show');
        });

        window.addEventListener('show-create-brand-modal', event =>{
             $('#addbrandmodal').modal('show');
        });
       
       
    </script>
@endpush