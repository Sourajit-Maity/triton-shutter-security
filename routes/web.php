<?php

use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\InvitationController;
use App\Http\Controllers\Admin\CmsController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\ReportUserController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
 

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
Route::redirect('/','admin');
Route::redirect('admin','admin/login');
Route::get('/terms', function () {
    return view('terms', ['name' => 'terms']);
});
Route::get('/policy', function () {
    return view('policy', ['name' => 'policy']);
});

Route::group(['prefix' => 'admin', 'middleware'=> 'auth:sanctum'], function(){
    Route::get('profile',[ProfileController::class,'getProfile'])->name('admin.profile');
    Route::get('/dashboard',[AdminDashboard::class,'getDashboard'])->name('admin.dashboard');
    Route::get('/my-demo-mail',[UserController::class,'myDemoMail'])->name('admin.my-demo-mail');

    Route::resources([
        'users' => UserController::class,
        'professions'=>ProfessionController::class,
        'industry' => IndustryController::class,
        'invitation' => InvitationController::class,
        'report-users' => ReportUserController::class,
        'pages' => CmsController::class,
        'country' => CountryController::class,
        'city' => CityController::class,
        'state' => StateController::class,
        'products' => ProductController::class,
    ]);
});

Route::get('clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('clear-compiled');
    return 'Cleared.';
});

