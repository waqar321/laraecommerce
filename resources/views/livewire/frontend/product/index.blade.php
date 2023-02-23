<div>

<div class="row">
    <div class="col-md-3">

    @if($category->brands)
       <div class="card">
            <div class="card-header"> <h4>  Brands </h4> </div>
            <div class="card-body">
                <div class="card bg-warning text-white">
                    <label class="d-block">
                      @foreach($category->brands as $brand)   <!-- e.g: 45 id category data jitna he   -->
                           <input type="checkbox" wire:model="brandInputs" value="{{ $brand->name }}" /> {{ $brand->name }} <br>
                      @endforeach
                    </label>
                </div>   
            </div>   
            <div class="card-footer">Select Brand Name </div>
        </div>
    @endif
        
        <div class="card">
            <div class="card-header"> <h4>  Price </h4> </div>
            <div class="card-body">
                <div class="card bg-warning text-white">
                    <label class="d-block"> 
                       <input type="radio" name="priceSort" wire:model="priceInputs" value="High-To-Low" /> High To low  <br>
                       <input type="radio" name="priceSort" wire:model="priceInputs" value="Low-To-High" /> low to High  <br>
                    </label>
                </div>   
            </div>   
            <div class="card-footer">Select Brand Name </div>
        </div>

    </div>
       
    <div class="col-md-9">
        <div class="row">
        	@forelse($products as $product)

                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                        	@if($product->quantity > 0)
                            	<label class="stock bg-success">In Stock</label>
                        	@else 
                            	<label class="stock bg-danger">Out of Stock</label>
                        	@endif

                        	@if($product->productImages->count() > 0)
                        	<a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug)}}">  
                        		<img src="{{ asset($product->productImages[0]->image) }}" alt="{{ $product->name }}">
                        	</a>
                        	@endif

                            </div>
                            <div class="product-card-body">
                                <p class="product-brand"> {{ $product->brand }} </p>
                                <h5 class="product-name">
                                   <a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug)}}">  
                                   		<!-- collections/Mobile/Vivo_s1-->
                                        {{ $product->name }}
                                   </a>
                                </h5>
                                <div>
                                    <span class="selling-price"> {{ $product->selling_price }} </span>
                                    <span class="original-price">{{ $product->original_price }}</span>
                                </div>
                             
                            </div>
                        </div>
                    </div>
                 @empty

                 	<div class="col-md-12">
                 		<div class="p-2">
                 			<h4> No Products Available for {{ $category->name }} </h4>
    	             	</div>
                 	</div>

            @endforelse
        </div>
    </div>
</div>
</div>
