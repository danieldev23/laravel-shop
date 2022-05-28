<?php

use App\Http\Controllers\AdminCartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\MenuHomeController;
use App\Http\Controllers\ProductHomeController;
use App\Http\Controllers\CartController;



use Illuminate\Http\Request;

// !Phần Trang chủ
Route::get('/',[HomeController::class,'index']);
Route::get('/services/load-product',[HomeController::class,'loadProduct']);
Route::get('/danh-muc/{id}-{slug}.html',[MenuHomeController::class,'index']);
Route::get('/san-pham/{id}-{slug}.html',[ProductHomeController::class,'index']);
Route::post('/add-cart',[CartController::class,'index']);
Route::get('/carts',[CartController::class,'show']);
Route::post('/update-cart',[CartController::class,'update']);
Route::get('/carts/delete/{id}',[CartController::class,'remove']);
Route::post('/carts',[CartController::class,'addCart']);





// Route::get('/', function () {
//     return view('main');
// });
// * Đăng nhập và xử lí đăng nhập

Route::get('admin/users/login',[LoginController::class,'index'])->name('login');

// ! Đăng xuất

// todo Trang quản trị
Route::get('admin/users/logout',[LoginController::class,'logout']);


Route::post('admin/users/login/store',[LoginController::class,'store']);

Route::middleware(['auth'])->group(function(){

    Route::prefix('admin')->group(function(){


            Route::get('/',[MainController::class,'index'])->name('admin');

            Route::get('main',[MainController::class,'index']);

            // * Phần Menu

            Route::prefix('menus')->group(function(){
                Route::get('add',[MenuController::class, 'create']);
                Route::post('add', [MenuController::class, 'store']);
                Route::get('list',[MenuController::class, 'index']);
                Route::get('edit/{menu}', [MenuController::class, 'show']);
                Route::post('edit/{menu}', [MenuController::class, 'update']);
                Route::delete('destroy',[MenuController::class, 'destroy']);
               });

            // Product
            Route::prefix('products')->group(function(){
                Route::get('add', [ProductController::class, 'create']);
                Route::post('add', [ProductController::class, 'store']);
                Route::get('list', [ProductController::class, 'index']);
                Route::get('edit/{product}', [ProductController::class, 'show']);
                Route::post('edit/{product}', [ProductController::class, 'update']);
                Route::DELETE('destroy', [ProductController::class, 'destroy']);


            });

            //Slider
        #Slider
            Route::prefix('sliders')->group(function () {
                Route::get('add', [SliderController::class, 'create']);
                Route::post('add', [SliderController::class, 'store']);
                Route::get('list', [SliderController::class, 'index']);
                Route::get('edit/{slider}', [SliderController::class, 'show']);
                Route::post('edit/{slider}', [SliderController::class, 'update']);
                Route::DELETE('destroy', [SliderController::class, 'destroy']);
        });

            // Upload
            Route::post('upload/services', [UploadController::class, 'store']);
            #Cart
            Route::get('/customers',[AdminCartController::class,'index']);
            Route::get('/customers/view/{customer}',[AdminCartController::class,'show']);

        });
});
// Menu

