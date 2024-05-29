<?php

use App\Models\Petugas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\MasyarakatController;

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
    return view('index');
});

// LOGOUT
Route::get('/logout',[LoginController::class, 'postLogout']);

// ROUTE Login & Register Admin
Route::get('formLoginAdmin',[LoginController::class, 'formLoginAdmin']);
Route::post('postLoginAdmin',[LoginController::class, 'postLoginAdmin']);
Route::get('formRegisAdmin',[LoginController::class, 'formRegisAdmin']);
Route::post('postRegisAdmin',[LoginController::class, 'postRegisAdmin']);

// ROUTE Login & Register Masyarakat
Route::get('formLoginMasyarakat',[LoginController::class, 'formLoginMasyarakat']);
Route::post('postLoginMasyarakat',[LoginController::class, 'postLoginMasyarakat']);
Route::get('formRegisMasyarakat',[LoginController::class, 'formRegisMasyarakat']);
Route::post('postRegisMasyarakat',[LoginController::class, 'postRegisMasyarakat']);

// ROUTE MASYARAKAT (ketika sudah login)
Route::get('masyarakat/home',[MasyarakatController::class, 'homeMasyarakat']);
Route::get('masyarakat/homeLelang',[MasyarakatController::class, 'homeLelang']);
// route penawaran lelang untuk masyarakat
Route::get('masyarakat/get-lelang-details/{id_lelang}',[MasyarakatController::class, 'modalLelang']); //Modal Card
Route::get('masyarakat/detailPenawaran/{id_lelang}',[MasyarakatController::class, 'detailPenawaran']);
Route::post('masyarakat/postPenawaran/{id_lelang}',[MasyarakatController::class, 'postPenawaran']); // penawaran lelang
// route edit penawaran lelang masyarakat
Route::get('masyarakat/editDetailPenawaran/{id_history}',[MasyarakatController::class, 'editDetailPenawaran']);
Route::post('masyarakat/postEditPenawaran/{id_history}',[MasyarakatController::class, 'postEditPenawaran']); // edit penawaran lelang
Route::get('masyarakat/deletePenawaran/{id_history}',[MasyarakatController::class, 'deletePenawaran']); // delete penawaran lelang

Route::get('masyarakat/formHistoryLelang',[MasyarakatController::class, 'formHistoryLelang']);
Route::get('masyarakat/formPemenang',[MasyarakatController::class, 'formPemenang']);




// ROUTE ADMIN (ketika sudah login)
Route::get('admin/home',[AdminController::class, 'homeAdmin']);
Route::get('admin/formDetailBarang/{id_barang}',[AdminController::class, 'formDetailBarang']); //form detail barang
Route::get('admin/formTambahBarang',[AdminController::class, 'formTambahBarang']);
Route::post('admin/postTambahEdit',[AdminController::class, 'postTambahBarang']); //CREATE data
// Route post edit barang menggunakan method patch karena gabung dengan form insert barang
Route::get('admin/formEditBarang/{id_barang}',[AdminController::class, 'formEditBarang']);
Route::patch('admin/postTambahEdit/{id_barang}',[AdminController::class, 'postEditBarang']); //UPDATE data
// Route post delete barang menggunakan method delete pada route dan form harus menggunakan method delete untuk menghapus data
Route::get('admin/postDelete/{id_barang}',[AdminController::class, 'deleteBarang']); //UPDATE data
Route::get('admin/formPemenang',[AdminController::class, 'formPemenang']); // Form pemenang lelang



// ROUTE PETUGAS (ketika sudah login)
Route::get('petugas/home',[PetugasController::class, 'homePetugas']);
Route::get('petugas/formDetailBarang/{id_barang}',[PetugasController::class, 'formDetailBarang']); //form detail barang
Route::get('petugas/formTambahBarang',[PetugasController::class, 'formTambahBarang']); //form tambah barang
Route::post('petugas/postTambahEdit',[PetugasController::class, 'postTambahBarang']); //CREATE data
Route::get('petugas/postLelangDibuka/{id_lelang}',[PetugasController::class, 'postLelangDibuka']); //Status Lelang dibuka 
Route::get('petugas/postLelangDitutup/{id_lelang}',[PetugasController::class, 'postLelangDitutup']); //Status Lelang ditutup
// Route post edit barang diganti menggunakan method patch karena gabung dengan form insert barang -> dan nama route harus sama dengan method post yang di gunakan untuk menambahkan data
Route::get('petugas/formEditBarang/{id_barang}',[PetugasController::class, 'formEditBarang']);
Route::patch('petugas/postTambahEdit/{id_barang}',[PetugasController::class, 'postEditBarang']); //UPDATE data
// Route post delete barang menggunakan method delete pada route dan form harus menggunakan method delete untuk menghapus data
Route::get('petugas/postDelete/{id_barang}',[PetugasController::class, 'deleteBarang']); //DELETE data

// ROUTE LELANG PETUGAS
Route::get('petugas/homeLelang',[PetugasController::class, 'homeLelang']);
Route::get('petugas/formTambahLelang',[PetugasController::class, 'formTambahLelang']);
Route::post('petugas/postLelang',[PetugasController::class, 'postTambahLelang']); //CREATE data
// Route post edit barang diganti menggunakan method patch karena gabung dengan form insert barang -> dan nama route harus sama dengan method post yang di gunakan untuk menambahkan data
Route::get('petugas/formEditLelang/{id_lelang}',[PetugasController::class, 'formEditLelang']);
Route::patch('petugas/postLelang/{id_barang}',[PetugasController::class, 'postEditLelang']); //UPDATE data
// Route post delete barang menggunakan method delete pada route dan form harus menggunakan method delete untuk menghapus data
Route::get('petugas/postDeleteLelang/{id_lelang}',[PetugasController::class, 'deleteLelang']); //DELETE data
Route::get('petugas/formPemenang',[PetugasController::class, 'formPemenang']); // Form pemenang lelang



Route::get('/admin/lte',[LoginController::class, 'adminLTE']);