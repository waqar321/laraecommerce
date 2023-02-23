@extends('layouts.app')

@section('title')
		{{ $category->meta_title }}
@endsection

@section('title_keyword')
		{{ $category->meta_keyword }}
@endsection

@section('meta_description')
		{{ $category->meta_description}}
@endsection



@section('content')
  
 <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4"> {{ $category->slug }}</h4>
                </div>
                    <!--  -->
             <livewire:frontend.product.index :category="$category" />
            
             <!-- livewire:frontend.product.index == it is livewire component, not blade  
				  that index function calls 'frontend.product.index' blade, nd passying above both variables.
				  
             -->

             </div>
        </div>
    </div>

@endsection
