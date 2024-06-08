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

            Route::get('/Admin/FilterPengguna', [adminController::class, 'FilterPengguna'])->name('FilterPengguna_admin');
            Route::get('/Admin/FilterKategoriSurat', [adminController::class, 'FilterKategoriSurat'])->name('FilterKategoriSurat_admin');
            Route::get('/Admin/FilterUnit', [adminController::class, 'FilterUnit'])->name('FilterUnit_admin');
            Route::get('/Admin/FilterJabatan', [adminController::class, 'FilterJabatan'])->name('FilterJabatan_admin');
        });
        // AKTOR KEPALA UNIT
        Route::middleware('cekRole:KepalaUnit')->group(function () {
            Route::get('/KepalaUnit/Dashboard', [KepalaUnitController::class, 'ViewDashboard'])->name('Dashboard_kepalaunit');
            Route::get('/KepalaUnit/ArsipSurat', [KepalaUnitController::class, 'ViewArsipSurat'])->name('ArsipSurat_kepalaunit');
            Route::post('/KepalaUnit/TambahArsipSuratMasuk', [KepalaUnitController::class, 'ArsipSuratMasuk'])->name('ArsipSuratMasuk_kepalaunit');
            Route::post('/KepalaUnit/TambahArsipSuratKeluar', [KepalaUnitController::class, 'ArsipSuratKeluar'])->name('ArsipSuratKeluar_kepalaunit');
            Route::get('/KepalaUnit/DetailArsipSuratMasuk-{id}', [KepalaUnitController::class, 'DetailArsipSuratMasuk']);
            Route::get('/KepalaUnit/DetailArsipSuratKeluar-{id}', [KepalaUnitController::class, 'DetailArsipSuratKeluar']);
            Route::get('/KepalaUnit/ValidasiDetailArsipSuratMasuk-{id}', [KepalaUnitController::class, 'ValidasiDetailArsipSuratMasuk']);
            Route::get('/KepalaUnit/ValidasiDetailArsipSuratKeluar-{id}', [KepalaUnitController::class, 'ValidasiDetailArsipSuratKeluar']);
            Route::get('/KepalaUnit/BatalValidasiDetailArsipSuratMasuk-{id}', [KepalaUnitController::class, 'BatalValidasiDetailArsipSuratMasuk']);
            Route::get('/KepalaUnit/BatalValidasiDetailArsipSuratKeluar-{id}', [KepalaUnitController::class, 'BatalValidasiDetailArsipSuratKeluar']);
            Route::get('/KepalaUnit/ViewEditArsipSuratMasuk-{id}', [KepalaUnitController::class, 'ViewEditArsipSuratMasuk']);
            Route::get('/KepalaUnit/ViewEditArsipSuratKeluar-{id}', [KepalaUnitController::class, 'ViewEditArsipSuratKeluar']);
            Route::put('/KepalaUnit/EditArsipSuratMasuk-{id}', [KepalaUnitController::class, 'EditArsipSuratMasuk']);
            Route::put('/KepalaUnit/EditArsipSuratKeluar-{id}', [KepalaUnitController::class, 'EditArsipSuratKeluar']);
            Route::get('/KepalaUnit/HapusArsipSuratMasuk-{id}', [KepalaUnitController::class, 'HapusArsipSuratMasuk']);
            Route::get('/KepalaUnit/HapusArsipSuratKeluar-{id}', [KepalaUnitController::class, 'HapusArsipSuratKeluar']);
            Route::get('/KepalaUnit/ListArsipSuratMasuk', [KepalaUnitController::class, 'ListArsipSuratMasuk'])->name('ListArsipSuratMasuk_kepalaunit');
            Route::get('/KepalaUnit/ListArsipSuratKeluar', [KepalaUnitController::class, 'ListArsipSuratKeluar'])->name('ListArsipSuratKeluar_kepalaunit');
            Route::post('/KepalaUnit/TambahArsipDisposisiSuratMasuk', [KepalaUnitController::class, 'DisposisiSuratMasuk'])->name('DisposisiArsipSuratMasuk_kepalaunit');
            Route::post('/KepalaUnit/TambahArsipDisposisiSuratKeluar', [KepalaUnitController::class, 'DisposisiSuratKeluar'])->name('DisposisiArsipSuratKeluar_kepalaunit');
            Route::get('/KepalaUnit/ListArsipDisposisiSuratMasuk', [KepalaUnitController::class, 'ListArsipDisposisiSuratMasuk'])->name('ListArsipDisposisiSuratMasuk_kepalaunit');
            Route::get('/KepalaUnit/ListArsipDisposisiSuratKeluar', [KepalaUnitController::class, 'ListArsipDisposisiSuratKeluar'])->name('ListArsipDisposisiSuratKeluar_kepalaunit');
            Route::get('/KepalaUnit/DetailArsipDisposisiSuratMasuk-{id}-{id_surat_masuk}', [KepalaUnitController::class, 'DetailArsipDisposisiSuratMasuk'])->name('DetailArsipDisposisiSuratMasuk_kepalaunit');
            Route::get('/KepalaUnit/DetailArsipDisposisiSuratKeluar-{id}-{id_surat_keluar}', [KepalaUnitController::class, 'DetailArsipDisposisiSuratKeluar'])->name('DetailArsipDisposisiSuratKeluar_kepalaunit');
            Route::get('/KepalaUnit/TindakLanjutDetailArsipDisposisiSuratMasuk-{id}', [KepalaUnitController::class, 'TindakLanjutDetailArsipDisposisiSuratMasuk']);
            Route::get('/KepalaUnit/TindakLanjutDetailArsipDisposisiSuratKeluar-{id}', [KepalaUnitController::class, 'TindakLanjutDetailArsipDisposisiSuratKeluar']);

            Route::get('/KepalaUnit/FilterSuratMasuk', [KepalaUnitController::class, 'FilterSuratMasuk'])->name('FilterSuratMasuk_kepalaunit');
            Route::get('/KepalaUnit/FilterSuratKeluar', [KepalaUnitController::class, 'FilterSuratKeluar'])->name('FilterSuratKeluar_kepalaunit');
            Route::get('/KepalaUnit/FilterDisposisiSuratMasuk', [KepalaUnitController::class, 'FilterDisposisiSuratMasuk'])->name('FilterDisposisiSuratMasuk_kepalaunit');
            Route::get('/KepalaUnit/FilterDisposisiSuratKeluar', [KepalaUnitController::class, 'FilterDisposisiSuratKeluar'])->name('FilterDisposisiSuratKeluar_kepalaunit');
        });

        // AKTOR SEKRETARIATAN
        Route::middleware('cekRole:Sekretariat')->group(function () {
            Route::get('/Sekretariat/Dashboard', [SekretariatController::class, 'ViewDashboard'])->name('Dashboard_sekretariat');
            Route::get('/Sekretariat/ArsipSurat', [SekretariatController::class, 'ViewArsipSurat'])->name('ArsipSurat_sekretariat');
            Route::post('/Sekretariat/TambahArsipSuratMasuk', [SekretariatController::class, 'ArsipSuratMasuk'])->name('ArsipSuratMasuk_sekretariat');
            Route::post('/Sekretariat/TambahArsipSuratKeluar', [SekretariatController::class, 'ArsipSuratKeluar'])->name('ArsipSuratKeluar_sekretariat');
            Route::get('/Sekretariat/DetailArsipSuratMasuk-{id}', [SekretariatController::class, 'DetailArsipSuratMasuk']);
            Route::get('/Sekretariat/DetailArsipSuratKeluar-{id}', [SekretariatController::class, 'DetailArsipSuratKeluar']);
            Route::get('/Sekretariat/ViewEditArsipSuratMasuk-{id}', [SekretariatController::class, 'ViewEditArsipSuratMasuk']);
            Route::get('/Sekretariat/ViewEditArsipSuratKeluar-{id}', [SekretariatController::class, 'ViewEditArsipSuratKeluar']);
            Route::put('/Sekretariat/EditArsipSuratMasuk-{id}', [SekretariatController::class, 'EditArsipSuratMasuk']);
            Route::put('/Sekretariat/EditArsipSuratKeluar-{id}', [SekretariatController::class, 'EditArsipSuratKeluar']);
            Route::get('/Sekretariat/HapusArsipSuratMasuk-{id}', [SekretariatController::class, 'HapusArsipSuratMasuk']);
            Route::get('/Sekretariat/HapusArsipSuratKeluar-{id}', [SekretariatController::class, 'HapusArsipSuratKeluar']);
            Route::get('/Sekretariat/ListArsipSuratMasuk', [SekretariatController::class, 'ListArsipSuratMasuk'])->name('ListArsipSuratMasuk_sekretariat');
            Route::get('/Sekretariat/ListArsipSuratKeluar', [SekretariatController::class, 'ListArsipSuratKeluar'])->name('ListArsipSuratKeluar_sekretariat');
            Route::post('/Sekretariat/TambahArsipDisposisiSuratMasuk', [SekretariatController::class, 'DisposisiSuratMasuk'])->name('DisposisiArsipSuratMasuk_sekretariat');
            Route::post('/Sekretariat/TambahArsipDisposisiSuratKeluar', [SekretariatController::class, 'DisposisiSuratKeluar'])->name('DisposisiArsipSuratKeluar_sekretariat');
            Route::get('/Sekretariat/ListArsipDisposisiSuratMasuk', [SekretariatController::class, 'ListArsipDisposisiSuratMasuk'])->name('ListArsipDisposisiSuratMasuk_sekretariat');
            Route::get('/Sekretariat/ListArsipDisposisiSuratKeluar', [SekretariatController::class, 'ListArsipDisposisiSuratKeluar'])->name('ListArsipDisposisiSuratKeluar_sekretariat');
            Route::get('/Sekretariat/DetailArsipDisposisiSuratMasuk-{id}-{id_surat_masuk}', [SekretariatController::class, 'DetailArsipDisposisiSuratMasuk'])->name('DetailArsipDisposisiSuratMasuk_sekretariat');
            Route::get('/Sekretariat/DetailArsipDisposisiSuratKeluar-{id}-{id_surat_keluar}', [SekretariatController::class, 'DetailArsipDisposisiSuratKeluar'])->name('DetailArsipDisposisiSuratKeluar_sekretariat');
            Route::get('/Sekretariat/TindakLanjutDetailArsipDisposisiSuratMasuk-{id}', [SekretariatController::class, 'TindakLanjutDetailArsipDisposisiSuratMasuk']);
            Route::get('/Sekretariat/TindakLanjutDetailArsipDisposisiSuratKeluar-{id}', [SekretariatController::class, 'TindakLanjutDetailArsipDisposisiSuratKeluar']);


            Route::get('/Sekretariat/FilterSuratMasuk', [SekretariatController::class, 'FilterSuratMasuk'])->name('FilterSuratMasuk_sekretariat');
            Route::get('/Sekretariat/FilterSuratKeluar', [SekretariatController::class, 'FilterSuratKeluar'])->name('FilterSuratKeluar_sekretariat');
            Route::get('/Sekretariat/FilterDisposisiSuratMasuk', [SekretariatController::class, 'FilterDisposisiSuratMasuk'])->name('FilterDisposisiSuratMasuk_sekretariat');
            Route::get('/Sekretariat/FilterDisposisiSuratKeluar', [SekretariatController::class, 'FilterDisposisiSuratKeluar'])->name('FilterDisposisiSuratKeluar_sekretariat');

            Route::get('/Sekretariat/HapusSemuaArsipSuratMasuk', [SekretariatController::class, 'HapusSemuaArsipSuratMasuk'])->name('HapusSemuaArsipSuratMasuk_sekretariat');
            Route::get('/Sekretariat/HapusSemuaArsipSuratKeluar', [SekretariatController::class, 'HapusSemuaArsipSuratKeluar'])->name('HapusSemuaArsipSuratKeluar_sekretariat');
            Route::get('/Sekretariat/HapusSemuaDisposisiArsipSuratMasuk', [SekretariatController::class, 'HapusSemuaDisposisiArsipSuratMasuk'])->name('HapusSemuaDisposisiArsipSuratMasuk_sekretariat');
            Route::get('/Sekretariat/HapusSemuaDisposisiArsipSuratKeluar', [SekretariatController::class, 'HapusSemuaDisposisiArsipSuratKeluar'])->name('HapusSemuaDisposisiArsipSuratKeluar_sekretariat');
        });

        // AKTOR DOSEN STAFF
        Route::middleware('cekRole:DosenStaff')->group(function () {
            Route::get('/DosenStaff/Dashboard', [DosenStaffController::class, 'ViewDashboard'])->name('Dashboard_dosenstaff');
            Route::get('/DosenStaff/ListArsipSuratMasuk', [DosenStaffController::class, 'ListArsipSuratMasuk'])->name('ListArsipSuratMasuk_dosenstaff');
            Route::get('/DosenStaff/ListArsipSuratKeluar', [DosenStaffController::class, 'ListArsipSuratKeluar'])->name('ListArsipSuratKeluar_dosenstaff');
            Route::get('/DosenStaff/DetailArsipSuratMasuk-{id}', [DosenStaffController::class, 'DetailArsipSuratMasuk']);
            Route::get('/DosenStaff/DetailArsipSuratKeluar-{id}', [DosenStaffController::class, 'DetailArsipSuratKeluar']);
            Route::get('/DosenStaff/ListArsipDisposisiSuratMasuk', [DosenStaffController::class, 'ListArsipDisposisiSuratMasuk'])->name('ListArsipDisposisiSuratMasuk_dosenstaff');
            Route::get('/DosenStaff/ListArsipDisposisiSuratKeluar', [DosenStaffController::class, 'ListArsipDisposisiSuratKeluar'])->name('ListArsipDisposisiSuratKeluar_dosenstaff');
            Route::get('/DosenStaff/DetailArsipDisposisiSuratMasuk-{id}-{id_surat_masuk}', [DosenStaffController::class, 'DetailArsipDisposisiSuratMasuk'])->name('DetailArsipDisposisiSuratMasuk_dosenstaff');
            Route::get('/DosenStaff/DetailArsipDisposisiSuratKeluar-{id}-{id_surat_keluar}', [DosenStaffController::class, 'DetailArsipDisposisiSuratKeluar'])->name('DetailArsipDisposisiSuratKeluar_dosenstaff');

            Route::get('/DosenStaff/FilterSuratMasuk', [DosenStaffController::class, 'FilterSuratMasuk'])->name('FilterSuratMasuk_dosenstaff');
            Route::get('/DosenStaff/FilterSuratKeluar', [DosenStaffController::class, 'FilterSuratKeluar'])->name('FilterSuratKeluar_dosenstaff');
            Route::get('/DosenStaff/FilterDisposisiSuratMasuk', [DosenStaffController::class, 'FilterDisposisiSuratMasuk'])->name('FilterDisposisiSuratMasuk_dosenstaff');
            Route::get('/DosenStaff/FilterDisposisiSuratKeluar', [DosenStaffController::class, 'FilterDisposisiSuratKeluar'])->name('FilterDisposisiSuratKeluar_dosenstaff');
        });

        // Logout
        Route::get('/Logout',[AuthController::class, 'Logout'])->name('logout');
        Route::get('/home',[AuthController::class, 'Logout'])->name('logout');
        
        // Profile
        Route::put('/UpdateUser/{id}',[AuthController::class, 'UpdateUser']);
    });
});