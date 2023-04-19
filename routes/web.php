<?php

use App\Models\Orders;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontEndPageController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CommentController;
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

Route::middleware(['share'])->group(function () {
    Route::prefix("/")->group(function (){
        Route::get("/", [FrontEndPageController::class, 'index'])->name("frontend.index");
        Route::get("sayfalar/{slug}", [FrontEndPageController::class, "pages"])->name("frontend.pages");
        Route::get("iletisim", [FrontEndPageController::class, "contact"])->name("frontend.contact");
        Route::post("contactForm", [FrontEndPageController::class, "contactForm"])->name("frontend.contactForm");
        Route::get("uzman/detay/{slug}", [FrontEndPageController::class, "psychologistDetail"])->name("frontend.psychologist.detail");
        Route::get("bloglar/{slug}", [FrontEndPageController::class, "blogDetail"])->name("frontend.blog.detail");
        Route::get("bloglar", [FrontEndPageController::class, "blog"])->name("frontend.blog");
        Route::get("kendini-test-et", [FrontEndPageController::class, "tests"])->name("frontend.test");
        Route::get("kendini-test-et/{slug}", [FrontEndPageController::class, "testDetail"])->name("frontend.test.detail");
        Route::get("uzman/{slug}",[FrontEndPageController::class, "psychologist"])->name("frontend.psychologist");
        Route::middleware("loginRequired")->group(function (){
            Route::get("randevu-al", [FrontEndPageController::class, "getAppoinment"])->name("frontend.appointment");
            Route::get("randevu-al/{id?}", [FrontEndPageController::class, "createAppoinment"])->name("frontend.create.appointment");
            Route::post("sanal-pos", [FrontEndPageController::class, "virtualTerminal"])->name("frontend.virtualTerminal");
        });
    });
    Route::get("giris-yap", [AuthController::class, "login"])->middleware("checkSession")->name("login");
    Route::get("kayit-ol", [AuthController::class, "register"])->middleware("checkSession")->name("register");
    Route::post("userCheck", [AuthController::class, "userCheck"])->name("checkUser");
    Route::post("registerUser", [AuthController::class, "registerUser"])->name("registerUser");
    Route::get("cikis-yap", [AuthController::class, 'logout'])->name("logout");
    Route::middleware(["checkToken","adminAccess"])->prefix("admin")->group(function () { // Burası adminlere açık
        Route::get("/", [AdminController::class, "index"])->name("admin.index");
        Route::prefix("yorumlar")->group(function () {
            Route::get("/", [CommentController::class, "comments"])->name("admin.comments.index");
        });
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
            Route::get("sayfalar",[CmsController::class,"pagesIndex"])->name("admin.cms.pages");
            Route::post("sayfalar/update/{id}",[CmsController::class,"pagesUpdate"])->name("admin.cms.pages.update");
            Route::get("sayfalar/duzenle/{id}",[CmsController::class,"pagesEdit"])->name("admin.cms.pages.edit");
        });
        Route::prefix("blog")->group(function(){
            Route::get("/",[CmsController::class,"blogIndex"])->name("admin.blog.index");
            Route::get("ekle",[CmsController::class,"blogAdd"])->name("admin.blog.add");
            Route::post("insert",[CmsController::class,"blogInsert"])->name("admin.blog.insert");
            Route::get("duzenle/{id}",[CmsController::class,"blogEdit"])->name("admin.blog.edit");
            Route::post("update",[CmsController::class,"blogUpdate"])->name("admin.blog.update");
        });
        Route::prefix("test")->group(function (){
            Route::get("/",[TestController::class,"index"])->name("admin.test.index");
            Route::get("ekle",[TestController::class,"add"])->name("admin.test.add");
            Route::post("insert",[TestController::class,"insert"])->name("admin.test.insert");
            Route::get("duzenle/{id}",[TestController::class,"edit"])->name("admin.test.edit");
            Route::post("update/{id}",[TestController::class,"update"])->name("admin.test.update");
        });
        Route::prefix("kullanicilar")->group(function () {
            Route::get("/", [UserController::class, "index"])->name("admin.user.list.index");
        });
        Route::prefix("satıslar")->group(function () {
            Route::get("/", [OrderController::class, "index"])->name("admin.orders.list");
            Route::get("detay/{id}", [OrderController::class, "detail"])->name("admin.orders.show");
        });
    });
    Route::middleware(["psychologistAccess"])->prefix("psikolog")->group(function () { // Burası psikologlara açık
        Route::get("/", [AdminController::class, "psychologistIndex"])->name("psychologist.index");
        Route::get("randevular", [CalendarController::class, "index"])->name("psychologist.calendar");
        Route::get("gorusmeler",[CalendarController::class ,"interviews"])->name("psychologist.interviews");
        Route::get("profil",[UserController::class,"profile"])->name("psychologist.profile");
        Route::post("profil/guncelle",[UserController::class,"updateProfile"])->name("psychologist.profile.update");
    });
    Route::middleware("userAccess")->prefix("kullanici")->group(function () {
        Route::get("/", [AdminController::class, "userIndex"])->name("admin.users.index");
        Route::get("gorusmelerim",[CalendarController::class ,"userInterviews"])->name("admin.user.interviews");
        Route::get("randevu-ekle/{id}",[CalendarController::class ,"createInterview"])->name("admin.users.create.appointment");
    });
});

