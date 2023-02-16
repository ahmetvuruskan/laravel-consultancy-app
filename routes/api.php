<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('get-user-details',[UserController::class,'getUserDetails'])->name("admin.users.details");
    Route::post('delete-user',[UserController::class,'deleteUser'])->name("admin.users.delete");
    Route::post('update-user',[UserController::class,'updateUser'])->name("admin.users.update");
});
