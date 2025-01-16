<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\SessionAuthenticate;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Middleware\TokenVerificationMiddleware;

//User-part-routing===========================
Route::get('/',[HomeController::class, 'HomePage'])->name('HomePage');
Route::get('/login',[UserController::class, 'LoginPage'])->name('LoginPage');
Route::get('/registration',[UserController::class, 'RegistrationPage'])->name('RegistrationPage');
Route::get('/resetpassword',[UserController::class, 'ResetPasswordPage'])->name('ResetPasswordPage');
Route::get('/sendotp',[UserController::class, 'SendOtpPage'])->name('SendOtpPage');
Route::get('/verifyotp',[UserController::class, 'VerifyOtpPage'])->name('VerifyOtpPage');

//Dashboard-part-routing===========================
Route::get('/dashboard',[DashboardController::class, 'DashboardPage'])->name('DashboardPage')->middleware([SessionAuthenticate::class]);
Route::get('/category',[CategoriesController::class, 'CategoryPage'])->name('CategoryPage')->middleware([SessionAuthenticate::class]);
Route::get('/customer',[CustomerController::class, 'CustomerPage'])->name('CustomerPage')->middleware([SessionAuthenticate::class]);
Route::get('/product',[ProductController::class, 'ProductPage'])->name('ProductPage')->middleware([SessionAuthenticate::class]);
Route::get('/invoice',[InvoiceController::class, 'InvoicePage'])->name('InvoicePage')->middleware([SessionAuthenticate::class]);
Route::get('/profile',[UserController::class, 'ProfilePage'])->name('ProfilePage')->middleware([SessionAuthenticate::class]);

//============================================
//===================================


//user-auth-backend-part==========================
Route::post('/user-registration', [UserController::class, 'userRegistraion'])->name('userRegistraion');
Route::post('/user-login', [UserController::class, 'userLogin'])->name('userLogin');
Route::get('/logout', [UserController::class, 'UserLogout'])->name('UserLogout');
Route::post('/send-otp', [UserController::class, 'SendOtpCode'])->name('SendOtpCode');
Route::post('/verify-otp', [UserController::class, 'VerifyOtp'])->name('VerifyOtp');
Route::post('/reset-password', [UserController::class, 'ResetPassword']);
Route::post('/user-profile', [UserController::class, 'UserProfile'])->middleware([SessionAuthenticate::class]);
Route::post('/user-update', [UserController::class, 'UpdateProfile'])->middleware([SessionAuthenticate::class]);
//user-auth==========================


//Category-list==========================
Route::post('/category-create', [CategoriesController::class, 'CategoryCreate'])->middleware([SessionAuthenticate::class]);
Route::get('/category-list', [CategoriesController::class, 'CategoryList'])->middleware([SessionAuthenticate::class]);
Route::post('/category-delete', [CategoriesController::class, 'CategoryDelete'])->middleware([SessionAuthenticate::class]);
Route::post('/category-update', [CategoriesController::class, 'CategoryUpdate'])->middleware([SessionAuthenticate::class]);
Route::post('/category-by-id', [CategoriesController::class, 'CategoryById'])->middleware([SessionAuthenticate::class]);

//Category-list==========================


//Customer-list==========================
Route::post('/customer-create', [CustomerController::class, 'CustomerCreate'])->middleware([SessionAuthenticate::class]);
Route::get('/customer-list', [CustomerController::class, 'CustomerList'])->middleware([SessionAuthenticate::class]);
Route::post('/customer-delete', [CustomerController::class, 'CustomerDelete'])->middleware([SessionAuthenticate::class]);
Route::post('/customer-update', [CustomerController::class, 'CustomerUpdate'])->middleware([SessionAuthenticate::class]);
Route::post('/customer-by-id', [CustomerController::class, 'CustomerById'])->middleware([SessionAuthenticate::class]);

//Customer-list==========================

//Product-list==========================
Route::post('/product-create', [ProductController::class, 'ProductCreate'])->middleware([SessionAuthenticate::class]);
Route::get('/product-list', [ProductController::class, 'ProductList'])->middleware([SessionAuthenticate::class]);
Route::post('/product-delete', [ProductController::class, 'ProductDelete'])->middleware([SessionAuthenticate::class]);
Route::post('/product-update', [ProductController::class, 'ProductUpdate'])->middleware([SessionAuthenticate::class]);
Route::post('/product-by-id', [ProductController::class, 'ProductById'])->middleware([SessionAuthenticate::class]);
//Product-list==========================


//Invoice-list==========================
Route::post('/invoice-create', [InvoiceController::class, 'InvoiceCreate'])->middleware([SessionAuthenticate::class]);
Route::get('/invoice-list', [InvoiceController::class, 'InvoiceList'])->middleware([SessionAuthenticate::class]);
Route::post('/invoice-details', [InvoiceController::class, 'InvoiceDetails'])->middleware([SessionAuthenticate::class]);
Route::post('/invoice-delete', [InvoiceController::class, 'InvoiceDelete'])->middleware([SessionAuthenticate::class]);

//Invoice-list==========================



