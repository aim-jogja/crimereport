<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
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

Route::post('police/login',[LoginController::class, 'policeLogin'])->name('policeLogin');
Route::post('police/register',[LoginController::class, 'policeRegister'])->name('policeRegister');

Route::group( ['prefix' => 'police','middleware' => ['auth:police-api','scopes:police'] ],function(){
   // authenticated staff routes here 
    Route::get('dashboard',[LoginController::class, 'policeDashboard']);
    Route::post('logout',[LoginController::class, 'logoutPolice'])->name('police.logout');
    Route::get('profil', [App\Http\Controllers\api\police\HomeController::class, 'profil']);
});