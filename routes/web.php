<?php
use App\Http\Controllers\userController;
use App\Http\Controllers\produkController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\adminController;
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

//PUBLIK
Route::get('/', [homeController::class,'index']);

Route::get('/produk/{produk:slug}', [produkController::class,'show']);

Route::get('/kategori/{kategori:slug}', [produkController::class,'index_kategori']);
Route::get('/ruangan/{ruangan:slug}', [produkController::class,'index_ruangan']);
Route::get('/jenis/{jenis:slug}', [produkController::class,'index_jenis']);



//LOGIN/REGISTER
Route::get('/login', [loginController::class,'index_login'])->name('login');
Route::post('/login', [loginController::class,'authenticate']);
Route::post('/logout', [loginController::class,'index_logout']);

Route::get('/register', [registerController::class,'index_register']);
Route::post('/register', [registerController::class,'store']);



//USER ONLY
Route::get('/profile', [userController::class,'index_profile'])->middleware('auth');
Route::put('/profile/update', [userController::class, 'updateProfile'])->middleware('auth');



//CART
Route::get('/cart', [produkController::class, 'showCart'])->middleware('auth');;
Route::post('/cart/add', [produkController::class,'addToCart']);
Route::delete('/cart/remove/{id}', [produkController::class,'removeCart']);
Route::post('/cart/pengiriman/redirect', [produkController::class,'redirect']);

//ORDER
Route::get('/cart/pengiriman', [OrderController::class,'showPengiriman'])->middleware('auth');
Route::post('/cart/pengiriman', [OrderController::class,'storePengiriman']);

Route::get('/riwayat-pemesanan', [OrderController::class, 'riwayatPemesanan'])->name('riwayat-pemesanan')->middleware('auth');



//ADMIN
Route::get('/admin', [adminController::class,'index_admin'])->middleware('auth');

Route::get('/admin/Produk', [adminController::class,'admin_produk'])->middleware('auth');
Route::post('/admin/Produk', [adminController::class,'store_produk']);
Route::delete('/admin/Produk/{id}', [adminController::class,'delete_produk']);
Route::get('/{produks:slug}/edit', [adminController::class,'edit_produk']);
Route::put('/admin/Produk/{produks:slug}', [adminController::class,'update_produk']);

Route::get('/admin/User', [adminController::class,'admin_user'])->middleware('auth');

Route::get('/admin/Tipe', [adminController::class,'admin_tipe'])->middleware('auth');

Route::get('/admin/kategori', [adminController::class,'create_kategori'])->middleware('auth');
Route::post('/admin/Tipe/kategori', [adminController::class,'store_kategori']);

Route::get('/admin/jenis', [adminController::class,'create_jenis'])->middleware('auth');
Route::post('/admin/Tipe/jenis', [adminController::class,'store_jenis'])->middleware('auth');

Route::get('/admin/ruangan', [adminController::class,'create_ruangan'])->middleware('auth');
Route::post('/admin/Tipe/ruangan', [adminController::class,'store_ruangan']);
