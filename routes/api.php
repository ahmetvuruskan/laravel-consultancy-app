<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TestController;
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
Route::middleware(['xss'])->group(function (){
Route::middleware('auth:sanctum')->group(function () {
    Route::post('get-user-details',[UserController::class,'getUserDetails'])->name("admin.users.details");
    Route::post('delete-user',[UserController::class,'deleteUser'])->name("admin.users.delete");
    Route::post('update-user',[UserController::class,'updateUser'])->name("admin.users.update");
    Route::post("slider/delete/",[CmsController::class,"deleteSlider"])->name("admin.cms.sliders.delete");
    Route::post("packages/search",[PackageController::class,"search"])->name("admin.package.search");
    Route::post("professions/search",[ProfessionController::class,"search"])->name("admin.profession.search");
    Route::post("products/add",[ProductController::class,"add"])->name("api.save.products");
    Route::post("products/delete",[ProductController::class,"delete"])->name("api.delete.products");
    Route::post("make-admin",[UserController::class,"makeAdmin"])->name("api.make.admin");
    Route::post("make-psychologist",[UserController::class,"makePsychologist"])->name("api.make.psychologist");
    Route::post("blog/sil",[CmsController::class,"blogDelete"])->name("api.blog.delete");
    Route::post("updateTimes",[AppointmentController::class,'updateTimes'])->name("api.update.times");
    Route::post("delete",[TestController::class,"delete"])->name("api.admin.test.delete");
    Route::post("get-available-times",[AppointmentController::class,"getAvailableTimes"])->name("api.get.available.times");
    Route::post("create-appointment",[AppointmentController::class,"createAppointment"])->name("api.create.appointment");
    Route::post("update_available_times",[AppointmentController::class,"updateAvailableTimes"])->name("api.update.available.times");
    Route::post("getPrices",[ProductController::class,"getPrices"])->name("api.get.prices");
});

    Route::post("products/getProductsByProfession",[ProductController::class,"getProductsByProfession"])->name("api.getproductsbyprofession");
});
