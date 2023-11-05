<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\ZoneController;
use App\http\Controllers\RegionController;
use App\http\Controllers\TerritoryController;
use App\http\Controllers\UserRegsController;
use App\http\Controllers\ProductRegController;
use App\http\Controllers\AIPOController;
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


// Route::view('/addRegion', 'region.region');
// Route::view('/addTerritory', 'territory.territory');


Route::view('/addZone', 'zone.zone');
Route::post('/postZone',[ZoneController::class,'store']);

Route::get('/addRegion',[RegionController::class,'getZone']);
Route::post('/postRegion',[RegionController::class,'store']);

Route::get('/addTerritory',[TerritoryController::class,'getTerritory']);
Route::post('/postTerritory',[TerritoryController::class,'store']);

Route::get('/getUser',[UserRegsController::class,'getUser']);
Route::post('/postUser',[UserRegsController::class,'store']);

Route::view('/addSku', 'sku.sku');
Route::post('/postSku',[ProductRegController::class,'store']);

Route::get('/getAIPO',[AIPOController::class,'getAIPO']);
Route::post('/postSku',[AIPOController::class,'store']);
