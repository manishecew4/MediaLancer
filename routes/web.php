<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;

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

// Route::get('/', function () {
//     return view('user.home');
//     // return view('welcome');
// });

Route::get('/employee', [EmployeeController::class, 'EmpDetails'])->name('user.emp_details');
Route::post('/employee/rating', [EmployeeController::class, 'Rating'])->name('user.rating');
Route::post('/employee/comment', [EmployeeController::class, 'Comment'])->name('user.comment');



Route::get('/1', function () {
    // return view('user.home');
    return view('welcome');
});

Route::get('searchs', function(){
    return view("search_result");
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::get('/vendor_reg', [App\Http\Controllers\EmployeeController::class, 'ShowRegister'])->name('vendor_reg');
Route::post('/vendor_register', [App\Http\Controllers\EmployeeController::class, 'VendorRegister'])->name('vendor_register');

// Ajax Search
Route::get('/search-photographers', [App\Http\Controllers\HomeController::class, 'AjaxSearch'])->name('ajax_search');


/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/booking', [BookingController::class, 'ReqBooking'])->name('req_booking');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    // login route
    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin');
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    // main pages
    Route::get('/admin/category&sub', [CategoryController::class, 'Form'])->name('admin.category');
    Route::match(array('GET', 'POST'), '/admin/category', [CategoryController::class, 'AddCategory'])->name('admin.add_category');
    Route::match(array('GET', 'POST'), '/admin/category/edit', [CategoryController::class, 'EditCategory'])->name('admin.cat.edit-cat');
    Route::match(array('GET'), '/admin/category/delete', [CategoryController::class, 'DeleteCategory'])->name('admin.cat.delete-cat');

    Route::get('/admin/category&sub/list', [CategoryController::class, 'ListCategory'])->name('admin.list_category');
    Route::match(array('GET', 'POST'), '/admin/sub_category', [CategoryController::class, 'AddSubCategory'])->name('admin.add_sub_category');
    Route::match(array('GET', 'POST'), '/admin/sub_category/edit', [CategoryController::class, 'EditSubCategory'])->name('admin.subcat.edit-cat');
    Route::match(array('GET'), '/admin/sub_category/delete', [CategoryController::class, 'DeleteSubCategory'])->name('admin.subcat.delete-cat');

    Route::match(array('GET'), '/admin/booking', [BookingController::class, 'Booking'])->name('admin.booking');

    Route::match(array('GET'), '/admin/employee/list', [EmployeeController::class, 'EmpList'])->name('admin.emp_list');

    Route::match(array('GET'), '/admin/employee/sample', [EmployeeController::class, 'Sample'])->name('admin.sample');
    Route::match(array('GET'), '/admin/employee/sample/video', [EmployeeController::class, 'SampleVideo'])->name('admin.sample_video');


    Route::match(array('GET'), '/admin/employee/is_approve', [EmployeeController::class, 'Approve'])->name('admin.approve');
    Route::match(array('GET'), '/admin/booking/is_approve/{id}', [BookingController::class, 'BookingApprove'])->name('admin.booking_approve');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:vendor'])->group(function () {

    Route::get('/vendor', [HomeController::class, 'vendorHome'])->name('vendor');
    Route::get('/vendor/home', [HomeController::class, 'vendorHome'])->name('vendor.home');
    Route::get('/vendor/portfolio', [EmployeeController::class, 'Portfolio'])->name('vendor.portfolio');

    Route::post('/vendor/portfolio/photo', [EmployeeController::class, 'PortfolioForPhoto'])->name('vendor.portfolio_photo');
    Route::post('/vendor/portfolio/video', [EmployeeController::class, 'PortfolioForVideo'])->name('vendor.portfolio_video');

    Route::get('/vendor/profile', [EmployeeController::class, 'Profile'])->name('vendor.profile');
    Route::post('/vendor/profile/save', [EmployeeController::class, 'ProfileSave'])->name('vendor.profile_save');

    Route::post('/vendor/profile/images', [EmployeeController::class, 'Image'])->name('vendor.images');
    Route::post('/vendor/profile/videos', [EmployeeController::class, 'Video'])->name('vendor.videos');


    Route::get('/vendor/my-booking', [BookingController::class, 'VendorBookings'])->name('vendor.vendor_bookings');
});


// ajax route