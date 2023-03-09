<?php

use App\Http\Controllers\GeneralController;
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

Route::get('/', [GeneralController::class, 'home'])->name('welcome');
Route::get('/ticket', [GeneralController::class, 'ticket'])->name('u.ticket');
Route::get('/lomba', [GeneralController::class, 'lomba'])->name('u.lomba');
Route::get('/cast', [GeneralController::class, 'cast'])->name('u.cast');
Route::get('/user', [GeneralController::class, 'user'])->name('u.user');

Route::get('/bloglist', [GeneralController::class, 'blog'])->name('u.blog');
Route::get('/blog/d/', [GeneralController::class, 'blogdetail'])->name('u.blog.detail');


Route::get('/menumain', function () {return view('layouts.menu-main');})->name('menumain');
Route::get('/menushare', function () {return view('layouts.menu-share');})->name('menushare');
Route::get('/menucolors', function () {return view('layouts.menu-colors');})->name('menucolors');
Route::get('/menufooter', function () {return view('layouts.menu-footer');})->name('menufooter');
