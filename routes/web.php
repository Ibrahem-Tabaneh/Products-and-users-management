<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use  App\Http\Controllers\user\UserController;
use  App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\product\newproductcontroller;
use App\Http\Middleware\is_admin;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//home
Route::get('/',[UserController::class,'HomeUser'])->name('HomePage');

//user
Route::group(['middleware' => ['auth']], function () {
    // الطرق الخاصة بالإدارة تذهب هنا
    Route::get('/userpage',[UserController::class,'PageUser'])->name('userpage');
    Route::get('/show_product/{id}',[newproductcontroller::class, 'show_product'])->name('show_product');
    Route::get('/edit_profile/{id}',[UserController::class,'edit_profile'])->name('edit_profile');
    Route::post('/store_profile/{id}',[UserController::class,'store_profile'])->name('store_prfile');
    Route::get('/addProductToWishlist/{id}',[newproductcontroller::class,'addProductToWishlist'])->name('addProductToWishlist');
// في web.php

Route::get('/removeProductFromWishlist/{id}',[newproductcontroller::class ,'removeProductFromWishlist'])
    ->name('removeProductFromWishlist');

    
    

});


//admin mangment users


Route::group(['middleware' => ['auth', 'is_admin']], function () {
    // الطرق الخاصة بالإدارة تذهب هنا
    Route::get('/adminpage',[AdminController::class,'index'])->name('admin.index');
Route::get('/delete/{id}',[AdminController::class,'delete'])->name('delete');
Route::get('/edit/{id}',[AdminController::class,'edit'])->name('edit');
Route::post('/store/{id}',[AdminController::class,'store'])->name('store');
Route::get('/active/{id}',[AdminController::class,'active'])->name('active');
Route::get('/show_active_accounts',[AdminController::class,'show_active_accounts'])->name('show_active_accounts');
Route::get('/show_disable_accounts',[AdminController::class,'show_disable_accounts'])->name('show_disable_accounts');
Route::get('/show_admins',[AdminController::class,'show_admins'])->name('show_admins');
Route::get('/disable_all',[AdminController::class,'disable_all'])->name('disable_all');
Route::get('/active_all',[AdminController::class,'active_all'])->name('active_all');
Route::get('/showInterestedUsers/{id}',[newproductcontroller::class,'showInterestedUsers'])->name('showInterestedUsers');
Route::get('/search_name',[newproductcontroller::class,'search_name'])->name('search');



});
//if not accept
Route::get('/page_wait_accept',[AdminController::class,'page_wait_accept']);



// admin mangment products
Route::group(['middleware' => ['auth', 'is_admin']], function () {
    // الطرق الخاصة بالإدارة تذهب هنا
    Route::get('/create',[newproductcontroller::class, 'create'])->name('create_product');
Route::post('/store_products',[newproductcontroller::class, 'store'])->name('store_products');
Route::get('/index_products',[newproductcontroller::class, 'index'])->name('index_products');
Route::get('/delete_product/{id}',[newproductcontroller::class, 'delete_product'])->name('delete_product');
Route::get('/edit_product/{id}',[newproductcontroller::class, 'edit_product'])->name('edit_product');
Route::post('/store_update/{id}',[newproductcontroller::class, 'store_update'])->name('store_update');

});





  
    

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
