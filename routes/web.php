<?php

use Whoops\Run;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\blogController;
use App\Http\Controllers\SSOBrokerController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PermissionRoleController;

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
Route::get('backend/login',[SSOBrokerController::class, 'authenticateToSSO']);
Route::get('authenticateToSSO',[SSOBrokerController::class, 'authenticateToSSO']);
Route::get('authData/{authData}',[SSOBrokerController::class, 'authenticateToSSO']);
Route::get('logout/{sessionId}',[SSOBrokerController::class, 'logout']);
Route::get('changeRole/{role}', [SSOBrokerController::class, 'changeRole'])->name('changeRole');

Route::group(['middleware' => ['SSOBrokerMiddleware']], function () {
    Route::get('/', function(){
       return view('welcome');
    });
 });

 Route::group(['namespace' => 'Admin', 'middleware' => []], function () {
	Route::get('auth/permission_role',[PermissionRoleController::class,'index'])->name('permission_role.index');
	Route::post('auth/permission_role',[PermissionRoleController::class,'store'])->name('permission_role.store');
});

Route::group(['namespace' => 'Admin', 'middleware' => []], function () {
	Route::get('auth/permission/select',[PermissionController::class,'select'])->name('permission.select');
	Route::resource('auth/permission', [PermissionController::class]);
});


Route::get('/blog', [blogController::class,'index']);

Route::get('/blogcreate', [blogController::class,'create']);

Route::post('/store', [blogController::class,'store']);

Route::get('/blog/{id}/edit', [blogController::class,'edit']);

Route::put('/blog {id}', [blogController::class,'update']);

Route::delete('/blog {id}', [blogController::class,'destroy']);



