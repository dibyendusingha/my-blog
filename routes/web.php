<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\admincontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SystemController;
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

Auth::routes();

Route::get('/'               , [SystemController::class,'first_page'])->name('first_page');

Route::get('/register-user'  , [LoginController::class,'reg_page'])->name('admin-page');
Route::get('/login-user'     , [LoginController::class,'login_page']);
Route::post('/user-reg'      , [LoginController::class,'save_reg'])->name('submit.reg');
Route::post('/user-login'    , [LoginController::class,'save_login'])->name('submit.login');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('admin')->group(function () {
    Route::get('/home'          , [admincontroller::class,'index_page'])->name('home');
    Route::get('/add-article'   , [admincontroller::class,'blog_page']);

    Route::get('/edit-article/{id}'     , [admincontroller::class,'edit_article']);
    Route::post('/add-article'          , [admincontroller::class,'add_article']);
    Route::get('/delete_article/{id}'   , [admincontroller::class,'delete_article']);
    Route::post('/update-article/{id}'  , [admincontroller::class,'update_article']);   

});


