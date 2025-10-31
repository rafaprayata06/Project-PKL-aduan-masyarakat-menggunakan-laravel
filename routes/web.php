<?php


use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BanController;
use App\Http\Controllers\CardDetailController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\dashbordrController;
use App\Http\Controllers\DetailStatusController;
use App\Http\Controllers\emailregisterController;
use App\Http\Controllers\jawabController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PetugasOrAdminController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostMasyarakatController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\updateMasyarakatController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('user', [UserController::class, 'index']);
Route::post('user/create', [UserController::class, 'create']);
Route::post('user/login', [UserController::class, 'login']);
Route::get('/user/logout', [UserController::class, 'logout']);

//resource
Route::resource('home', dashbordrController::class)->middleware('CheckBanned');
Route::resource('home-petugas-admin', AdminController::class);
Route::resource('rating', RatingController::class);
Route::resource('jawab', jawabController::class);
Route::resource('berita', PostController::class);
Route::resource('news', PostMasyarakatController::class);
Route::resource('ban', BanController::class);
Route::resource('update', updateMasyarakatController::class);
Route::resource('petugas', PetugasController::class);
Route::resource('email', emailregisterController::class);


//card detail
Route::get('belum-proses', [CardDetailController::class, 'index']);
Route::get('proses', [CardDetailController::class, 'proses']);
Route::get('complate!', [CardDetailController::class, 'selesai']);
Route::get('pengaduan', [CardDetailController::class, 'pengaduan']);
Route::get('belum-petugas', [DetailStatusController::class, 'belum']);
Route::get('proses-petugas', [DetailStatusController::class, 'proses']);
Route::get('selesai-petugas', [DetailStatusController::class, 'selesai']);
Route::get('detail/user', [CardDetailController::class, 'user']);


//authentication petugas

Route::get('petugas-admin!', [PetugasOrAdminController::class, 'index']);
Route::get('petugas-admin/logout', [PetugasOrAdminController::class, 'logout']);
Route::post('petugas-admin/login', [PetugasOrAdminController::class, 'login']);
Route::get('user/detail-profile', [UserController::class, 'detail_profile']);
Route::post('/petugas-admin/create', [PetugasOrAdminController::class, 'create']);
Route::get('/detail/admin', [PetugasOrAdminController::class, 'detail']);
