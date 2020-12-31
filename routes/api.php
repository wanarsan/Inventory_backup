<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('getproduct', [App\Http\Controllers\Api\ProductController::class, 'index']);
// Route::post('/addproduct', [App\Http\Controllers\Api\ProductController::class, 'store']);

Route::get('getproduct', [App\Http\Controllers\Api\ProductController::class, 'index']);
Route::post('addproduct', [App\Http\Controllers\Api\ProductController::class, 'store']);
Route::get('product/{id}', [App\Http\Controllers\Api\ProductController::class, 'show']);
Route::delete('delete/{id}', [App\Http\Controllers\Api\ProductController::class, 'destroy']);
Route::put('edit/{id}', [App\Http\Controllers\Api\ProductController::class, 'update']);

Route::get('getmaterial', [App\Http\Controllers\Api\MaterialController::class, 'index']);
Route::post('addmaterial', [App\Http\Controllers\Api\MaterialController::class, 'store']);
Route::get('material/{id}', [App\Http\Controllers\Api\MaterialController::class, 'show']);
Route::delete('deletematerial/{id}', [App\Http\Controllers\Api\MaterialController::class, 'destroy']);
Route::put('editmaterial/{id}', [App\Http\Controllers\Api\MaterialController::class, 'update']);


Route::get('getsubmaterial/{product_ref}', [App\Http\Controllers\Api\SubmaterialController::class, 'show']);
Route::delete('subdelete/{contents}', [App\Http\Controllers\Api\SubmaterialController::class, 'destroy']);
// Notice!!
Route::get('getsublistmaterial', [App\Http\Controllers\Api\SubmaterialController::class, 'index']);