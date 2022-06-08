<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MFamilyController;
use App\Http\Controllers\TCustomersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

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

Route::match(['GET', 'POST'],'/', [AuthController::class, 'index'])->name('logins');


Route::middleware('auth:sanctum')->get('user', [UserController::class, 'index'])->name('user.index');
//Route::post('user', [UserController::class, 'indexpost'])->name('user.indexpost');

//Create User
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user/create', [UserController::class, 'store'])->name('store');

//Edit User
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('edit');
Route::post('/user/update/{id}', [UserController::class, 'update'])->name('update');

//Delete User
Route::post('/user/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');

Route::get('/user/search', [UserController::class, 'getSearchAjax'])->name('search');

//Route::match(['GET', 'POST'], '/logins', [\App\Http\Controllers\UserController::class, 'postlogin'])->name('login');

Route::get('customer', [TCustomersController::class , 'index'])->name('customer');

//Edit Customer
Route::get('/customer/edit/{id}', [TCustomersController::class, 'edit'])->name('customer.edit');
Route::post('/customer/update/{id}', [TCustomersController::class, 'update'])->name('customer.update');

Route::get('/tcustomer/search', [TCustomersController::class, 'getSearchAjax'])->name('tCustomerSearch');

Route::get('mfamily', [MFamilyController::class , 'index'])->name('mfamily.index');

Route::get('/mfamily/search', [MFamilyController::class, 'getSearchAjax'])->name('mFamilySearch');
//Create family
Route::get('/mfamily/create', [MFamilyController::class, 'create']);
Route::post('/mfamily/create', [MFamilyController::class, 'store'])->name('mfamily.store');
Route::put('/mfamily/create', [MFamilyController::class, 'testConnection'])->name('testConnection');


