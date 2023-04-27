<?php

namespace App\Http\Controllers; 

use App\Models\User;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\Route;

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

Route::middleware('loggedUser')->group(function(){

    Route::get('/dashbord', function () {
        $data['users']=User::where('status',1)->get()->count();
        $data['products']=Product::where('status',1)->get()->count();
        return view('welcome',$data);
    })->name('dashbord');
    
    Route::get('/users',[UserController::class,'index'])->name('users');
    Route::match(['GET','POST'],'/register',[UserController::class,'register'])->name('register');
    Route::get('/deactivate{user_id}',[UserController::class,'deactivate'])->name('user.deactivate');
    Route::get('/activate{user_id}',[UserController::class,'activate'])->name('user.activate');

    //category
    Route::get('/categories',[ProductController::class,'categories'])->name('categories');
    Route::match(['GET','POST'],'/addCategory',[ProductController::class,'addCategory'])->name('category.add');

    //products
    Route::get('/products',[ProductController::class,'index'])->name('products');
    Route::match(['GET','POST'],'/addProduct',[ProductController::class,'add'])->name('product.add');
    Route::match(['GET','POST'],'/edit{product_id}',[ProductController::class,'edit'])->name('product.edit');
    Route::get('/Productdeactivate{product_id}',[ProductController::class,'deactivate'])->name('product.deactivate');
    Route::get('/Productactivate{product_id}',[ProductController::class,'activate'])->name('product.activate');
    Route::match(['GET','POST'],'/assignDistributor{product_id}',[ProductController::class,'assign'])->name('product.assign');

    Route::get('/logout',[HomeController::class,'logout'])->name('logout');
});


//login
Route::match(['GET','POST'],'/',[HomeController::class,'login'])->name('login');
