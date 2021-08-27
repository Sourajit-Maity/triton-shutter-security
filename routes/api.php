<?php

use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CmsController;
use App\Http\Controllers\API\InvitationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// user controller routes
Route::post("register", [UserController::class, 'register']);
Route::post("login", [UserController::class, 'login']);
Route::post("social-login", [UserController::class, 'socialsignup']);
Route::post("email-verification", [UserController::class, 'emailverification']);
Route::post("otp-verification", [UserController::class, 'otpverification']);
Route::post("forgot-password", [UserController::class, 'forgot_password']);
Route::get("industry/all", [UserController::class, 'getindustry']);
Route::get("profession/all", [UserController::class, 'getprofession']);
Route::get("get-homepage", [CmsController::class, 'gethomepage']);

Route::get("get-user-list/{industry_id}/{profession_id}", [UserController::class, 'getuserlist']);

// sanctum auth middleware routes
Route::middleware('auth:api')->group(function() {
    Route::get("user", [UserController::class, "user"]);
    Route::post("edit-my-profile", [UserController::class, "editprofile"]);
    Route::patch('/update-user/{user}',[UserController::class,'updateuser']);
    Route::post("user-profile-update", [UserController::class, "profileUpdate"]);
    Route::post("change_password", [UserController::class, "password_change"]);
    // Route::resource('tasks', TaskController::class);    //patch/put   =>  x-www-form-urlencode
    Route::resource('invites', InvitationController::class); 

    //Route::get("get-user-list/{industry_id}/{profession_id}", [UserController::class, 'getuserlist']);

});