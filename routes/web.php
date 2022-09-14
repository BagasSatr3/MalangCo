<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('dashboard.index');
// });

Route::get('/',[\App\Http\Controllers\HomepageController::class,'index']);
Route::get('/about',[\App\Http\Controllers\HomepageController::class,'about']);
Route::get('/kontak',[\App\Http\Controllers\HomepageController::class,'kontak']);
Route::get('/kategori',[\App\Http\Controllers\HomepageController::class,'kategori']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class,'index']);
});