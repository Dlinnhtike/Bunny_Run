<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/pricing', function () {
    return view('pricing');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/adminApanel', function () {
    return view('admin.login');
});

Route::get("/logout",[AdminController::class,"logout"])->name('logout');
Route::post("/systemuser_login",[AdminController::class,"systemuser_login"])->name('systemuser_login');
Route::get("/system/userlist",[AdminController::class,"user_list"])->middleware('isloggedin');
Route::get("/dashboard",[AdminController::class,"dashboard"])->middleware('isloggedin');
Route::get("/system/creatUser",[AdminController::class,"createUser"])->middleware('isloggedin');
Route::post("/add_system_user",[AdminController::class,"add_system_user"])->middleware('isloggedin');
Route::get("/system/editsystem_user/{id}",[AdminController::class,"editsystem_user"])->middleware('isloggedin');
Route::post("/update_systemuser",[AdminController::class,"update_systemuser"])->name('update_systemuser')->middleware('isloggedin');
Route::get("/system/userprofile",[AdminController::class,"user_profile"])->middleware('isloggedin');