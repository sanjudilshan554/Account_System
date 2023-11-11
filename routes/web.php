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

// LOGIN ROUTING(MAIN)
Route::view('/', 'login.login')->name('login');

// ZONE PART
Route::get('/addZone',[ZoneController::class,'getZone'])->name('Zone');
Route::post('/postZone',[ZoneController::class,'store']);
Route::get('/zoneView',[ZoneController::class,'zoneView'])->name('zoneView');
Route::get('/zoneUpdateView/{id}',[ZoneController::class,'zoneUpdateView'])->name('zoneUpdateView');
Route::post('/zoneUpdateView/{id}',[ZoneController::class,'zoneUpdate'])->name('zoneUpdate');

// REGION PART
Route::get('/addRegion',[RegionController::class,'getRegion'])->name('Region');
Route::post('/postRegion',[RegionController::class,'store']);
Route::get('/regionView',[RegionController::class,'regionView'])->name('regionView');
Route::get('/updateReigonView/{id}',[RegionController::class,'updateReigonView'])->name('updateReigonView');
Route::post('/updateReigonView/{id}',[RegionController::class,'updateRegion'])->name('updateRegion');

// TERRITORY PART
Route::get('/addTerritory',[TerritoryController::class,'getTerritory'])->name('Territory');
Route::post('/postTerritory',[TerritoryController::class,'store']);
Route::get('/terrView',[TerritoryController::class,'terrView'])->name('terrView');
Route::get('/updateTerrView/{id}',[TerritoryController::class,'updateTerrView'])->name('updateTerrView');
Route::post('/updateTerrView/{id}',[TerritoryController::class,'updateTerr'])->name('updateTerr');
Route::get('get-regions/{id}',[TerritoryController::class,'getRegions']);

// GET USER LOGIN PAGES
Route::get('/getUser',[UserRegsController::class,'getUser'])->name('userRegistration');
Route::post('/postUser',[UserRegsController::class,'store']);
Route::post('/postLogin',[UserRegsController::class,'login'])->name('userLogin');

// PRODUCT REGISTRATION
Route::get('/addSku',[ProductRegController::class,'getSku'])->name('ProductRegistration');
Route::post('/postSku',[ProductRegController::class,'store']);

// ADD INDIVIDUAL PURCHASE ORDER
Route::get('/getAIPO',[AIPOController::class,'getAIPO'])->name('AIPO');
Route::post('/postAIPO',[AIPOController::class,'store']);
Route::get('/get-territories/{zid}/{rid}',[AIPOController::class,'getTerr']);
Route::get('/get-territories/{id}',[AIPOController::class,'getTerrForPov']);
Route::get('/fetchPONumbers',[AIPOController::class,'getPoNumber']);

// GET PURCHASE ORDER VIEW 
Route::get('/getPOV',[AIPOController::class,'getPOV'])->name('POV');
Route::get('/fetchAiposData',[AIPOController::class,'getPovTable'])->name('PovTable');


// ROUTING BACK TO HOME
Route::get('/homeBack',[UserRegsController::class,'redirectHome'])->name('homeBackView');
Route::get('/homeBackUser',[UserRegsController::class,'redirectHomeUser'])->name('homeBackViewUser');