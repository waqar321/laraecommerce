<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TestingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
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
 
Route::get('/', function () {
    return view('welcome');
});

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
// {{ url('admin/category'.$category->id.'/edit') }} 
		
/*		Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
		Route::post('category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
		Route::get('category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
*/

});
