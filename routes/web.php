<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LocalizationController;

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
// Localization
Route::get("locale/{lange}",[LocalizationController::class,'setLang']);

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
Route::get('/registration', function () {
    return view('registration');
});
Route::get('/success_login', function () {
    return view('success_login');
});
Route::get('/userlogin', function () {
    return view('userlogin');
});

Route::post("/login",[PublicController::class,"login"])->name('login');
Route::get("/donthave",[PublicController::class,"donthave"]);
Route::get("/userlogout",[PublicController::class,"userlogout"])->name('userlogout');
Route::get("/order_request",[PublicController::class,"order_request"])->middleware('userloggedin');
Route::get("/order_success",[PublicController::class,"order_success"])->middleware('userloggedin');
Route::get("/userprofile",[PublicController::class,"userprofile"])->middleware('userloggedin');
Route::get("/usersetting",[PublicController::class,"usersetting"])->middleware('userloggedin');
Route::get("/changepassword",[PublicController::class,"changepassword"])->middleware('userloggedin');
Route::get("/onetime_form",[PublicController::class,"onetime_form"]);
/*  system */
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
Route::get("/system/infosystem_user/{id}",[AdminController::class,"infosystem_user"])->middleware('isloggedin');
Route::get('/system/deletesystem_user/{id}',[AdminController::class,"deletesystem_user"])->name('deletesystem_user')->middleware('isloggedin');
Route::post('change_systemuser_password',[AdminController::class,"change_systemuser_password"])->name('change_systemuser_password')->middleware('isloggedin');
Route::get("/system/township",[AdminController::class,"township"])->middleware('isloggedin');
Route::any("/system/create_township",[AdminController::class,"create_township"])->middleware('isloggedin');
Route::any("/system/zone",[AdminController::class,"zone"])->middleware('isloggedin');
Route::get("/system/gettownship",[AdminController::class,"gettownship"])->middleware('isloggedin');
Route::post("/system/create_zone",[AdminController::class,"create_zone"])->middleware('isloggedin');
Route::get("/system/getemplist",[AdminController::class,"getemplist"])->middleware('isloggedin');
/*  office */
Route::get('/office/department',[OfficeController::class,"department"])->middleware('isloggedin');
Route::post('/office/create_dept',[OfficeController::class,"create_dept"])->name('create_dept')->middleware('isloggedin');
Route::post('/office/create_pos',[OfficeController::class,"create_pos"])->name('create_pos')->middleware('isloggedin');
Route::post('/office/update_dept',[OfficeController::class,"update_dept"])->name('update_dept')->middleware('isloggedin');
Route::post('/office/update_pos',[OfficeController::class,"update_pos"])->name('update_pos')->middleware('isloggedin');
Route::get('/office/delete_department/{id}',[OfficeController::class,"delete_department"])->name('delete_department')->middleware('isloggedin');
Route::get('/office/delete_position/{id}',[OfficeController::class,"delete_position"])->name('delete_position')->middleware('isloggedin');
Route::get('/office/branch',[OfficeController::class,"branch"])->middleware('isloggedin');
Route::post('/office/create_branch',[OfficeController::class,"create_branch"])->name('create_branch')->middleware('isloggedin');
Route::get('/office/delete_branch/{id}',[OfficeController::class,"delete_branch"])->name('delete_branch')->middleware('isloggedin');
Route::post('/office/update_branch',[OfficeController::class,"update_branch"])->name('update_branch')->middleware('isloggedin');

/*  Employee */
Route::get('/office/employee',[OfficeController::class,"employee"])->middleware('isloggedin');
Route::get('/office/emplist',[OfficeController::class,"emplist"])->middleware('isloggedin');
Route::get('/ajax_emplist',[OfficeController::class,"ajax_emplist"])->middleware('isloggedin');
Route::get("/office/gettownship",[OfficeController::class,"gettownship"]);
Route::post("/add_employee",[OfficeController::class,"add_employee"])->middleware('isloggedin');
Route::get('/office/delete_emp/{id}',[OfficeController::class,"delete_emp"])->middleware('isloggedin');
Route::get('/office/emp_edit/{id}',[OfficeController::class,"emp_edit"])->middleware('isloggedin');
Route::get('/office/emp_detail/{id}',[OfficeController::class,"emp_detail"])->middleware('isloggedin');
Route::post("/update_employee",[OfficeController::class,"update_employee"])->middleware('isloggedin');
/*  Peoples */
Route::get('/people/users',[PeopleController::class,"users"])->middleware('isloggedin');
Route::post('/people/registration',[PeopleController::class,"registration"])->name('registration');
Route::get('/people/clients',[PeopleController::class,"clients"])->middleware('isloggedin');
Route::get('/people/delimen',[PeopleController::class,"delimen"])->middleware('isloggedin');
Route::get('/people/edit_user/{id}',[PeopleController::class,"edit_user"])->middleware('isloggedin');
Route::post('/people/update_user',[PeopleController::class,"update_user"])->middleware('isloggedin');
Route::get('/people/delete_user/{id}',[PeopleController::class,"delete_user"])->middleware('isloggedin');
Route::get('/people/detail_user/{id}',[PeopleController::class,"detail_user"])->middleware('isloggedin');
Route::post('/people/create_delimen',[PeopleController::class,"create_delimen"])->middleware('isloggedin');
Route::get('/people/edit_delimen/{id}',[PeopleController::class,"edit_delimen"])->middleware('isloggedin');
Route::post('/poeple/update_men',[PeopleController::class,"update_men"])->name('update_men')->middleware('isloggedin');
Route::get('/people/delete_delimen/{id}',[PeopleController::class,"delete_delimen"])->middleware('isloggedin');
/*  Orders */
Route::get('/order/member',[OrderController::class,"member_order_list"])->middleware('isloggedin');
Route::post('/order/create',[OrderController::class,"add_order"])->middleware('userloggedin');
Route::get('/order/onetime',[OrderController::class,"onetime_order_list"])->middleware('isloggedin');
Route::get('/order/client',[OrderController::class,"client_order_list"])->middleware('isloggedin');
Route::get('/order/detail/{id}',[OrderController::class,"order_detail"])->middleware('isloggedin');
