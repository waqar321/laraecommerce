@extends('layouts.app')

@section('title')
		{{ $product->meta_title }}
@endsection

@section('title_keyword')
		{{ $product->meta_keyword }}
@endsection

@section('meta_description')
		{{ $product->meta_description}}
@endsection



@section('content')
    
    <!-- create a livewire component:  php artisan make:livewire Frontend/Product/View  -->
   
   <div>
         <livewire:frontend.product.view :category="$category" :product="$product"  />

   </div>
    


@endsection
