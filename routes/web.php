<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sliderController;
use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Config;


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
   return view('home');
});

Route::get('/about', function () {
   return "About";
});
// Route::get('/admin/user', function () {
//     return "admin/user";
// });


/******======================================GROUP====================================******/  
//cach dat 1 :
/*** 
 * @$prefixAdmin = 'admin123';
***/
//cach dat 2 :
/****
 * @$prefixAdmin = config('z_vn.url.prefix_Admin');
 ***/

//cach dat 3:
/*** neu trong file config\z_vn chua dinh nghia @prefix_Admin thi gia tri la @prefix_Admin = default ****/



//cach 1 : 
/*******
Route::prefix($prefixAdmin)->group(function () {
    Route::get('/user', function () {
        return "admin/user";
    });
    Route::get('/slider', function () {
        return "admin/slider";
    });
    Route::get('/category', function () {
        return "admin/category";
    });
});
********/
//cach 2:
/****
Route::group(['prefix' => $prefixAdmin], function (){
    Route::get('/user', function () {
        return "admin/user";
    });
    Route::get('/slider', function () {
        return "admin/slider";
    });
    Route::get('/category', function () {
        return "admin/category";
    });
});
****/
//cach 3 :
    $prefixAdmin = config::get('z_vn.url.prefix_Admin','default');
    
    Route::group(['prefix' => $prefixAdmin], function (){

    Route::get('/user', function () {
        return "admin/user";
    });      
    $prefixSlider = config('z_vn.url.prefix_Slider');

    Route::group(['prefix' => $prefixSlider], function (){
        
        /**** Cach su dung Controller  ******/  
            
            Route::get('/{id?}', [sliderController::class, 'index']);
            
            //cach 1 : [ Route::get('/user/{id}', [UserController::class, 'show']); ]
            
            Route::get('/edit/{id?}', [sliderController::class, 'edit'])->where('id','[0-9]+');
            
            //cach 2 :
            /****
            Route::get('/edit/{id}', function($id) {
                return "slider/edit ".$id;
            })->where('id','[0-9]+');
             ***/
            
            Route::get('/delete/{id?}', [sliderController::class, 'delete'])->where('id','[0-9]+');
            
            Route::get('change-status-{status}/{id?}', [categoryController::class, 'status'])->where('id','[0-9]+');
    });
    //category :::
    
    $prefixCategory = config('z_vn.url.prefix_Category');
    
    Route::group(['prefix' => $prefixCategory], function (){
        
              Route::get('/', [categoryController::class, 'index']);
              
              Route::get('edit/{id?}', [categoryController::class, 'edit'])->where('id','[0-9]+');
              
              Route::get('delete/{id?}', [categoryController::class, 'delete'])->where('id','[0-9]+');
              
              Route::get('change-status-{status}/{id?}', [categoryController::class, 'status'])->where('id','[0-9]+');
                  
    });
    //My Test :
        Route::redirect('/here', '/there');
});
    
// Route::get('/category/{id}', function($id) {
//    return "category".$id;
// })->where('id','[0-9]+');

// Route::get('/category/{name?}', function($name = 'Duytuan') {
//     return "category ".$name;
// })->where('name', '[A-Za-z]+');















