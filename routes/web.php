<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaidtixController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Models\Daftar;
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
Route::get('/lombaku', [GeneralController::class, 'lomba'])->name('u.lomba');
Route::get('/cast', [GeneralController::class, 'cast'])->name('u.cast');
Route::get('/myuser', [GeneralController::class, 'user'])->name('u.user');

Route::group(['middleware'=>['guest']], function(){
    Route::get('/login', [UserController::class, 'flogin'])->name('flogin');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/register', [UserController::class, 'fregister'])->name('fregister');
    Route::post('/register', [UserController::class, 'register'])->name('register');

    Route::fallback(function () {
        return redirect()->route('flogin')->with('gagal', 'Anda harus login terlebih dahulu');
    });
});

Route::group(['middleware'=>['auth']], function(){
    Route::post('/ordernow', [OrderController::class, 'ordernow'])->name('ordernow');
    Route::get('/checkout/{uuid}', [OrderController::class, 'fcheckout'])->name('cust.checkout');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::post('/order/response', [OrderController::class, 'response'])->name('order.response');
    Route::get('/invoice/{uuid}', [OrderController::class, 'finvoice'])->name('cust.invoice');
    Route::get('/myticket/{uuid}', [PaidtixController::class, 'index'])->name('cust.ticket');
    Route::get('/mylomba/{uuid}', [DaftarController::class, 'ShowDaftarSaya'])->name('cust.mylomba');

    Route::post('/updateimg/{id}', [UserController::class, 'newupdateimg'])->name('cust.updatepp');
    Route::post('/daftarlomba', [DaftarController::class, 'daftarlomba'])->name('daftarlomba');
    Route::post('/updatecatatan', [DaftarController::class, 'updatecatatan'])->name('updatelomba');
    Route::post('/updatecatatanadmin/{id}', [DaftarController::class, 'updatecatatanadmin'])->name('updatelombaadmin');

    Route::get('/editprofile', [UserController::class, 'usershow'])->name('cust.edit');
    Route::put('/updateprofile/{id}', [UserController::class, 'update'])->name('cust.update');

    Route::middleware(['role:admin'])->group(function () {
        Route::get('/setting', [GeneralController::class, 'setting'])->name('setting');
        Route::get('/scan', [TicketController::class, 'scan'])->name('scan');
        Route::post('/scantiket', [TicketController::class, 'scantiket'])->name('scantiket');
        Route::resource('/story', StoryController::class);
        Route::resource('/slide', SlideController::class);
        Route::resource('/lomba', LombaController::class);
        Route::resource('/ourblog', BlogController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/ticketing', TicketController::class);
        Route::resource('/daftar', DaftarController::class);

        Route::post('/tolakdaftar/{id}', [DaftarController::class, 'tolak'])->name('daftar.tolak');
        Route::post('/tinjaudaftar/{id}', [DaftarController::class, 'tinjau'])->name('daftar.tinjau');


    });

    Route::middleware(['role:user'])->group(function () {
        Route::fallback(function () {
            return redirect()->route('welcome')->with('error', 'Gomen, Ada Error');
        });
    });
});

Route::get('/blog', [GeneralController::class, 'blog'])->name('u.blog');
Route::get('/blog/d/{uuid}', [BlogController::class, 'blogdetail'])->name('u.blog.detail');


Route::get('/menumain', function () {return view('layouts.menu-main');})->name('menumain');
Route::get('/menushare', function () {return view('layouts.menu-share');})->name('menushare');
Route::get('/menucolors', function () {return view('layouts.menu-colors');})->name('menucolors');
Route::get('/menufooter', function () {return view('layouts.menu-footer');})->name('menufooter');
Route::get('/offline', function () {return view('laravelpwa::offline');})->name('menufooter');


Route::controller(FacebookController::class)->group(function(){
    Route::get('auth/facebook', 'redirectToFacebook')->name('auth.facebook');
    Route::get('auth/facebook/callback', 'handleFacebookCallback');
});

Route::controller(GoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});


