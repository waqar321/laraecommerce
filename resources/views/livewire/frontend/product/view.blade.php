<div>
 <!--    
category
product -->
<div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">

                    	@if($product->productImages)
                        	<a href="{{ url('/collections/'.$product->category->slug.'/'.$product->slug)}}">  
                        		<img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="{{ $product->name }}">
                        	</a>
                    	@else
                    			No Image Exist
                    	@endif

                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                           
                            @if($product->quantity > 0)
                            	 <label class="label-stock bg-success">In Stock</label>
                        	@else 
                            	 <label class="label-stock bg-danger">Out of Stock</label>
                        	@endif

                        </h4>
                        <hr>
                        <p class="product-path">
                            Home /  {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price"> ${{ $product->selling_price }}</span>
                            <span class="original-price"> ${{ $product->original_price }}</span>
                        </div>
                        <div>

                            @if($product->productColors)
                            	@foreach($product->productColors as $productColor)
                            		<input type="radio" name="colorSelection" value="{{ $productColor->color_id }}">
                            		 {{ $productColor->color->name }} <br>
                            	@endforeach
                            @endif

                        </div>
                        
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" />
                                <span class="btn btn1"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <a href="" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </a>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                 {{ $product->small_description }}
                               
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                  {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    	

</div>
