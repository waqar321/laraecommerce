@extends('layouts.app')

@section('title', 'Home Page')


@section('content')



<!-- 
<div id="carouselExampleCaptions" class="carousel slide">
  
 	  <div class="carousel-inner">

		@foreach($sliders as $key => $slideItem)
	    <div class="carousel-item {{ $key == 0 ? 'active':'' }} active">
		
		       @if($slideItem->image)

			      <img src="{{ asset($slideItem->image) }}" class="d-block w-100" alt="testing">
		       @endif
	    
	      <div class="carousel-caption d-none d-md-block">
		        <h5>{{ $slideItem->title }} </h5>
		        <p>{{ $slideItem->description}} </p>
	      </div>
	    </div>
    	@endforeach

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->
<div id="carouselExampleCaptions" class="carousel slide">
  
  <div class="carousel-inner">

  	@foreach($sliders as $key => $slideItem)
	    <div class="carousel-item {{ $key == '0' ? 'active':'' }}">
	      <img src="{{ asset($slideItem->image) }}" class="d-block w-100" alt="...">
			<div class="carousel-caption d-none d-md-block">
                <div class="custom-carousel-content">
                    <h1> {{ $slideItem->title }} </h1> to Boost your Brand Name &amp; Sales
                    <p> {{ $slideItem->description}} </p>
                    <div> 
                        <a href="#" class="btn btn-slider"> Get Now </a>
                    </div>
                </div>
            </div>
	    </div>
    @endforeach
   

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endsection

