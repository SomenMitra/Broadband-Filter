<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnoController;
use Illuminate\Support\Facades\DB;

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
Route::match(['get','post'],'/filterData',[AnoController::class,'filterData']);
Route::post('/register',[AnoController::class,'store']);
Route::post('/get-sub-fees',[AnoController::class,'get_sub_fees']);
Route::post('/get-sub-type',[AnoController::class,'get_sub_type']);
Route::get('/register',[AnoController::class,'index']);
// Route::match(['get','post'],'/filter',[AnoController::class,'filter']);

Route::get('/', function () {
    return view('welcome');
});


