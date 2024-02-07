<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BukuController::class, 'welcome']);
Route::get('/history', [HistoryController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/buku', [BukuController::class, 'index'])->name('seachbook');
Route::get('/searchbook', [BukuController::class, 'index'])->name('searchbook');
Route::get('/resetsearchbook', [BukuController::class, 'resetSearch'])->name('resetsearchbook');
Route::get('/filterbook', [BukuController::class, 'filterbook'])->name('filterbook');
Route::get('/buku/{slug}', [BukuController::class, 'detail']);
Route::post('/buku/{title}', [RentController::class, 'store'])->name('rentbook');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('admin');

Route::get('/dashboard/user', [DashboardController::class, 'user'])->middleware('admin');
Route::get('/dashboard/user/addpetugas', [PetugasController::class, 'index'])->middleware('admin');
Route::post('/dashboard/user/addpetugas', [PetugasController::class, 'store'])->middleware('admin');

Route::delete('/dashboard/user{id}', [UserController::class, 'destroy'])->name('userdelete');
Route::get('/dashboard/user/edituser/{id}', [UserController::class, 'index'])->middleware('admin');
Route::post('/dashboard/user/edituser/{id}', [UserController::class, 'edit'])->name('edituser');
Route::get('/dashboard/user/edituser/edituserpassword/{id}', [UserController::class, 'edituserpassword'])->middleware('admin');
Route::post('/dashboard/user/edituser/edituserpassword/{id}', [UserController::class, 'userpassword'])->middleware('admin');

Route::get('/dashboard/rent', [DashboardController::class, 'rent'])->middleware('admin');;
Route::get('/dashboard/rent/pdf', [DashboardController::class, 'pdf'])->middleware('admin');;
Route::post('/dashboard/rent/{rentId}', [RentController::class, 'update'])->name('returnbook');
Route::put('/dashboard/rent/{rentId}', [RentController::class, 'reject'])->name('rentreject');

Route::get('/dashboard/book', [DashboardController::class, 'book'])->middleware('admin');
Route::get('/dashboard/book/addbook', [BookController::class, 'index'])->middleware('admin');
Route::post('/dashboard/book/addbook', [BookController::class, 'store'])->middleware('admin');
Route::get('/dashboard/book/editbook/{slug}', [BookController::class, 'edit'])->middleware('admin');
Route::post('/dashboard/book/{slug}', [BookController::class, 'update'])->name('editbook');
Route::delete('/dashboard/book{slug}', [BookController::class, 'destroy'])->name('bookdelete');

