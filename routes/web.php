<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ZoneController;
use App\http\Controllers\RegionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::view('/addZone', 'zone.zone');
// Route::view('/addRegion', 'region.region');
Route::view('/addTerritory', 'territory.territory');
Route::view('/addUser', 'user.user');
Route::view('/addSku', 'sku.sku');
Route::view('/aipo', 'AIPO.AIPO');

Route::post('/postZone',[ZoneController::class,'store']);

Route::post('/postRegion',[RegionController::class,'store']);
Route::get('/addRegion',[RegionController::class,'getZone']);