<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard_Controller;
use App\Http\Controllers\User_Controller;
use App\Http\Controllers\Post_Controller;
use App\Http\Controllers\Category_Controller;
use App\Http\Controllers\LayOutController;
use App\Http\Controllers\MessenController;

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


Route::get('/admin/dashboard',[Dashboard_Controller::class,'index']);

Route::get('/admin/user',[User_Controller::class,'index']);
Route::get('/admin/user/add',[User_Controller::class,'add']);
Route::get('/admin/user/edit/{id}',[User_Controller::class,'edit']);
Route::get('/admin/user/del',[User_Controller::class,'del']);

Route::post('/admin/user/process',[User_Controller::class,'process']);
Route::post('/admin/user/delete',[User_Controller::class,'delete']);
Route::post('/admin/user/changePass',[User_Controller::class,'changePass']);

Route::get('/admin/post',[Post_Controller::class,'index']);
Route::get('/admin/post/add',[Post_Controller::class,'add']);
Route::get('/admin/post/edit/{id}',[Post_Controller::class,'edit']);
Route::get('/admin/post/del',[Post_Controller::class,'del']);
Route::post('/admin/post/process',[Post_Controller::class,'process']);
Route::post('/admin/post/delete',[Post_Controller::class,'delete']);

Route::get('/admin/category',[Category_Controller::class,'index']);
Route::get('/admin/category/add',[Category_Controller::class,'add']);
Route::get('/admin/category/edit/{id}',[Category_Controller::class,'edit']);
Route::get('/admin/category/del',[Category_Controller::class,'del']);
Route::post('/admin/category/process',[Category_Controller::class,'process']);
Route::post('/admin/category/delete',[Category_Controller::class,'delete']);

Route::get('/admin/mess',[MessenController::class,'index']);
Route::post('/admin/mess/add',[MessenController::class,'add']);


Route::get('/login',[User_Controller::class,'login']);
Route::get('/logout',[User_Controller::class,'logout']);

Route::post('/processLogin',[User_Controller::class,'processLogin']);

//Session
Route::get('/createSession',[User_Controller::class,'createSession']);
Route::get('/getSession',[User_Controller::class,'getSession']);
Route::get('/deleteSession',[User_Controller::class,'deleteSession']);

//layout
Route::get('/{any?}', [LayOutController::class,'index']);

