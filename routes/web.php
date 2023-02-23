<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TestingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
// use App\Models\slider;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/testing_vue_Js', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);

Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
Route::get('/collections/{category_slug}/{product_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'productsView']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth', 'isAdmin')->group(function(){
		
	Route::get('Dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
	
		//category routes
	Route::controller(CategoryController::class)->group(function () {
	    Route::get('/category', 'index');
	    Route::post('/category', 'store');
	    Route::get('/category/create', 'create');
	    Route::get('/category/{category}/edit', 'edit'); 	//product ki id ke sath edit function me bhejega
	    Route::put('/category/{category}', 'update');
	    Route::put('/category/{category}', 'delete');		 
	});

	
	Route::controller(ProductController::class)->group(function () {
	    Route::get('/product/create', 'create');
	    Route::get('/product', 'index');
	    Route::post('/products', 'store');
	    Route::get('/products/{product}/edit', 'edit'); 	//product ki id ke sath edit function me bhejega
	    Route::put('/products/{product_id}', 'update'); 	 	// admin/products/25	
	    Route::get('/product-image/{image_id}/delete', 'destroyImage'); 	 	// admin/product-image/9/delete
	    Route::get('/products/{pro duct_id}/delete', 'delete'); 	 	// admin/products/25	
	    Route::post('/product-color/{prod_color_id}', 'updateProdColorQty'); 	 	// admin/products/25	
		Route::get('/product-color/{prod_color_id}/delete', 'DeleteProdColorQty'); 	

	});
	
	Route::controller(ColorController::class)->group(function () {
	    Route::get('/colors', 'index');
	    Route::get('/colors/create', 'create');
	    Route::post('/colors/create', 'store');
        Route::get('/colors/{color_id}/edit', 'edit'); 		//admin/colors/1/edit
        Route::post('/colors/{color_id}', 'update'); 	 	// admin/products/25	
	    Route::get('/colors/{color_id}/delete', 'delete'); 	 	// admin/colors/1/delete
	}); 

	Route::controller(SliderController::class)->group(function () {
	    Route::get('/slider', 'index');
	    Route::get('/slider/create', 'create');
	    Route::post('/slider/create', 'store');
 		Route::get('/slider/{slider_id}/edit', 'edit'); 		//admin/slider/1/edit
 		Route::post('/sliders/{slider}', 'update'); 			//admin/sliders/1
        Route::get('/slider/{slider}/delete', 'delete'); 	 	// admin/slider/25	
	 
	}); 

	Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);
	
});  

/*		Route::get('category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
*/


