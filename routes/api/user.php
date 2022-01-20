<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\LoginController;
use App\Http\Controllers\api\ContentController;
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

Route::post('user/login',[LoginController::class, 'userLogin'])->name('userLogin');
Route::post('user/register',[LoginController::class, 'userRegister'])->name('userRegister');
Route::get('user/crimereport',[ContentController::class, 'crimereport'])->name('crimereport');
Route::post('user/sendreport',[ContentController::class, 'sendreport'])->name('sendreport');

Route::group( ['prefix' => 'user','middleware' => ['auth:user-api','scopes:user'] ],function(){
   // authenticated staff routes here 
    Route::get('dashboard',[LoginController::class, 'userDashboard']);
    Route::post('logout',[LoginController::class, 'logoutUser'])->name('user.logout');

});