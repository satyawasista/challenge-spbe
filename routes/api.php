<?php

use App\Http\Controllers\API\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('blogs', [BlogController::class,'index']);
Route::post('blog/store', [BlogController::class,'store']);
Route::get('blogs/show/{id}', [BlogController::class,'show']);
Route::post('blog/update/{id}', [BlogController::class,'update']);
Route::get('blogs/destroy{id}', [BlogController::class,'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
