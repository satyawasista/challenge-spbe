<?php

use App\Http\Controllers\blogController;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

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

Route::get('/blog', [blogController::class,'index']);

Route::get('/blogcreate', [blogController::class,'create']);

Route::post('/store', [blogController::class,'store']);

Route::get('/blog/{id}/edit', [blogController::class,'edit']);

Route::put('/blog {id}', [blogController::class,'update']);

Route::delete('/blog {id}', [blogController::class,'destroy']);



