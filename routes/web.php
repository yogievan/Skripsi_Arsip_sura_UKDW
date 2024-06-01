<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenStaffController;
use App\Http\Controllers\KepalaUnitController;
use App\Http\Controllers\SekretariatController;
use Illuminate\Support\Facades\Route;

// AUTH
Route::middleware(['guest'])->group(function(){
    Route::get('/', [AuthController::class, 'ViewLogin'])->name('login');
    Route::post('/cek_login', [AuthController::class, 'ValidateLogin'])->name('cekLogin');
});


Route::middleware(['auth'])->group(function(){
    Route::group(['middleware' => 'prevent-back-history'],function(){
        // AKTOR ADMIN
        Route::middleware('cekRole:Admin')->group(function () {
            Route::get('/Admin/KelolaPengguna', [AdminController::class, 'ViewKelolaPengguna'])->name('KelolaPengguna_admin');
            Route::post('/Admin/TambahPengguna', [adminController::class, 'TambahPengguna'])->name('TambahPengguna_admin');
            Route::get('/Admin/DetailPengguna-{id}', [adminController::class, 'DetailPengguna']);
            Route::get('/Admin/Kategori', [adminController::class, 'ViewKategori'])->name('Kategori_admin');
            Route::post('/Admin/TambahKategori', [adminController::class, 'TambahKategori'])->name('TambahKategori_admin');
            Route::get('/Admin/EditKategori-{id}', [adminController::class, 'ViewEditKategori']);
            Route::put('/Admin/EditKategoriSubmit-{id}', [adminController::class, 'EditKategori']);
            Route::get('/Admin/HapusKategori-{id}', [adminController::class, 'HapusKategori']);
            Route::get('/Admin/Unit', [adminController::class, 'ViewUnit'])->name('Unit_admin');
            Route::post('/Admin/TambahUnit', [adminController::class, 'TambahUnit'])->name('TambahUnit_admin');
            Route::get('/Admin/EditUnit-{id}', [adminController::class, 'ViewEditUnit']);
            Route::put('/Admin/EditUnitSubmit-{id}', [adminController::class, 'EditUnit']);
            Route::get('/Admin/HapusUnit-{id}', [adminController::class, 'HapusUnit']);
            Route::get('/Admin/Jabatan', [adminController::class, 'ViewJabatan'])->name('Jabatan_admin');
            Route::post('/Admin/TambahJabatan', [adminController::class, 'TambahJabatan'])->name('TambahJabatan_admin');
            Route::get('/Admin/EditJabatan-{id}', [adminController::class, 'ViewEditJabatan']);
            Route::put('/Admin/EditJabatanSubmit-{id}', [adminController::class, 'EditJabatan']);
            Route::get('/Admin/HapusJabatan-{id}', [adminController::class, 'HapusJabatan']);
        });

        // AKTOR SEKRETARIATAN
        Route::middleware('cekRole:Sekretariat')->group(function () {
            Route::get('/Sekretariat/Dashboard', [SekretariatController::class, 'ViewDashboard'])->name('Dashboard_sekretariat');
        });

        // AKTOR KEPALA UNIT
        Route::middleware('cekRole:KepalaUnit')->group(function () {
            Route::get('/KepalaUnit/Dashboard', [KepalaUnitController::class, 'ViewDashboard'])->name('Dashboard_kepalaunit');
        });

        // AKTOR DOSEN STAFF
        Route::middleware('cekRole:DosenStaff')->group(function () {
            Route::get('/DosenStaff/Dashboard', [DosenStaffController::class, 'ViewDashboard'])->name('Dashboard_dosenstaff');
        });

        // Logout
        Route::get('/Logout',[AuthController::class, 'Logout'])->name('logout');
        Route::get('/home',[AuthController::class, 'Logout'])->name('logout');
        
        // Profile
        Route::put('/UpdateUser/{id}',[AuthController::class, 'UpdateUser']);
    });
});