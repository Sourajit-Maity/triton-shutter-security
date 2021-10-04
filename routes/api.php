<?php

use App\Http\Controllers\API\TaskController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CmsController;
use App\Http\Controllers\API\InvitationController;
use App\Http\Controllers\API\FCMController;
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

 Route::get("get-user-list/{industry_id}/{profession_id}/{looking_for}/{offering}/{latitude}/{longitude}/{radius}", [UserController::class, 'getuserlist']);
//Route::get("get-user-list/{industry_id}/{profession_id}/{looking_for}/{offering}", [UserController::class, 'getuserlist']);
//Route::post('/search', [UserController::class,'filter']);
Route::get('/chat-firebase', [FCMController::class, 'chatFirebase'])->name('chat-firebase');

// sanctum auth middleware routes
Route::middleware('auth:api')->group(function() {
    Route::get("user", [UserController::class, "user"]);
    Route::post("edit-my-profile", [UserController::class, "editprofile"]);
    Route::post("sink-location", [UserController::class, "sinklocation"]);
    Route::patch('/update-user/{user}',[UserController::class,'updateuser']);
    Route::post("user-profile-update", [UserController::class, "profileUpdate"]);
    Route::post("change_password", [UserController::class, "password_change"]);
    // Route::resource('tasks', TaskController::class);    //patch/put   =>  x-www-form-urlencode
    Route::resource('invites', InvitationController::class); 
    Route::get("user/all", [UserController::class, 'getAllUser']);
    Route::post('/search', [UserController::class,'filter']);
    Route::get('/last-filter-data', [UserController::class,'lastFilterData']);
    Route::post('/store-filter-data', [UserController::class,'storeFilterData']);
    Route::post('/get-filter-data', [UserController::class,'getFilterData']);

    // Route::post('/save-tokens', [FCMController::class,'index']);
    // Route::post('/save-token', [FCMController::class, 'saveToken'])->name('save-token');
    // Route::get('/get-token', [FCMController::class, 'getToken'])->name('get-token');

    Route::post('/save-user-setting', [UserController::class, 'saveUserSetting'])->name('save-user-setting');
    Route::get('/get-user-setting', [UserController::class, 'getUserSetting'])->name('get-user-setting');
    // Route::post('/send-notification', [FCMController::class, 'sendNotification'])->name('send.notification');

    //Route::get("get-user-list/{industry_id}/{profession_id}", [UserController::class, 'getuserlist']);

    Route::post('/send-chat-request', [FCMController::class, 'sendChatRequest'])->name('send-chat-request');
    Route::post('/accept-chat-request', [FCMController::class, 'acceptChatRequest'])->name('accept-chat-request');
    Route::post('/cancel-chat-request', [FCMController::class, 'canceltChatRequest'])->name('cancel-chat-request');
    Route::get('/get-chat-details', [FCMController::class, 'getChatDetails'])->name('get-chat-details');
    Route::get('/get-chat-request-details', [FCMController::class, 'getChatRequestDetails'])->name('get-chat-request-details');

});