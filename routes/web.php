<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingsController;
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

Route::middleware(['share',"xss"])->group(function (){
    Route::get("giris-yap",[AuthController::class,"login"])->middleware("checkSession")->name("login");
    Route::post("userCheck",[AuthController::class,"userCheck"])->name("checkUser");
    Route::get("cikis-yap",[AuthController::class,'logout'])->name("logout");
    Route::middleware(["adminAccess"])->prefix("admin")->group(function (){
        Route::get("/",[AdminController::class,"index"])->name("admin.index");
        Route::prefix("ayarlar")->group(function (){
            Route::get("/",[SettingsController::class,"index"])->name("admin.settings.index");
            Route::get("duzenle/{id}",[SettingsController::class,'editSettings'])->name("admin.settings.edit");
            Route::post("guncelle/{id}",[SettingsController::class,"updateSetting"])->name("admin.settings.update");
        });
    });

});
