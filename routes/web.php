<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontEndPageController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\CalendarController;
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
// Burası urlleri tanımladığımız yer herkese açık olanlar var yada admine açık olanlar var
Route::middleware(['share', "xss"])->group(function () {

    Route::prefix("/")->group(function (){ // Burası herkese açık
        Route::get("/", [FrontEndPageController::class, 'index'])->name("frontend.index");
        Route::get("sayfalar/{slug}", [FrontEndPageController::class, "pages"])->name("frontend.pages");
        // Teşekkür ederim aşkım . E> <3
    });
    Route::get("giris-yap", [AuthController::class, "login"])->middleware("checkSession")->name("login");
    Route::post("userCheck", [AuthController::class, "userCheck"])->name("checkUser");
    Route::get("cikis-yap", [AuthController::class, 'logout'])->name("logout");
    Route::middleware(["checkToken","adminAccess"])->prefix("admin")->group(function () { // Burası adminlere açık
        Route::get("/", [AdminController::class, "index"])->name("admin.index");
        Route::prefix("ayarlar")->group(function () {
            Route::get("/", [SettingsController::class, "index"])->name("admin.settings.index");
            Route::get("duzenle/{id}", [SettingsController::class, 'editSettings'])->name("admin.settings.edit");
            Route::post("guncelle/{id}", [SettingsController::class, "updateSetting"])->name("admin.settings.update");
        });
        Route::prefix("paketler")->group(function () {
            Route::get("/", [PackageController::class, "index"])->name("admin.packages.index");
            Route::get("ekle", [PackageController::class, "addPackage"])->name("admin.packages.add");
            Route::post("insert", [PackageController::class, "insertPackage"])->name("admin.packages.insert");
            Route::get("duzenle/{id}", [PackageController::class, "edit"])->name("admin.packages.edit");
            Route::post("update/{id}", [PackageController::class, "update"])->name("admin.packages.update");
            Route::get("delete/{id}", [PackageController::class, "delete"])->name("admin.packages.delete");
        });
        Route::prefix("cms")->group(function (){
            Route::get("slider",[CmsController::class,"sliderIndex"])->name("admin.cms.slider");
            Route::get("slider/ekle",[CmsController::class,"sliderAdd"])->name("admin.cms.sliders.add");
            Route::get("slider/duzenle/{id}",[CmsController::class,"sliderEdit"])->name("admin.cms.sliders.edit");
            Route::post("slider/update/{id}",[CmsController::class,"sliderUpdate"])->name("admin.cms.sliders.update");
            Route::post("slider/insert",[CmsController::class,"sliderInsert"])->name("admin.cms.sliders.insert");
            Route::get("blok",[CmsController::class,"indexBlocks"])->name("admin.cms.blocks");
            Route::get("blok/duzenle/{id}",[CmsController::class,"blocksEdit"])->name("admin.cms.blocks.edit");
            Route::post("blok/update",[CmsController::class,"blockUpdate"])->name("admin.cms.blocks.update");
        });
        Route::prefix("kullanicilar")->group(function () {
            Route::get("/", [UserController::class, "index"])->name("admin.users.index");
        });

    });
    Route::middleware(["psychologistAccess"])->prefix("psikolog")->group(function () { // Burası psikologlara açık
        Route::get("/", [AdminController::class, "psychologistIndex"])->name("psychologist.index");
        Route::get("randevular", [CalendarController::class, "index"])->name("psychologist.calendar");
    });
});
