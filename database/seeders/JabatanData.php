<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataPengguna = [
            [
                'jabatan'=>'Admin',
            ],
            [
                'jabatan'=>'Yayasan',
            ],
            [
                'jabatan'=>'Rektor',
            ],
            [
                'jabatan'=>'Wakil Rektor',
            ],
            [
                'jabatan'=>'Dekan',
            ],
            [
                'jabatan'=>'Wakil Dekan 1',
            ],
            [
                'jabatan'=>'Wakil Dekan 2',
            ],
            [
                'jabatan'=>'Wakil Dekan 3',
            ],
            [
                'jabatan'=>'Dosen Filsafat Keilahian Program Sarjana',
            ],
            [
                'jabatan'=>'Dosen Filsafat Keilahian Program Magister',
            ],
            [
                'jabatan'=>'Dosen Doktor Teologi',
            ],
            [
                'jabatan'=>'Dosen Arsitektur',
            ],
            [
                'jabatan'=>'Dosen Magister Arsitektur',
            ],
            [
                'jabatan'=>'Dosen Desain Produk',
            ],
            [
                'jabatan'=>'Dosen Biologi',
            ],
            [
                'jabatan'=>'Dosen Manajemen',
            ],
            [
                'jabatan'=>'Dosen Akuntansi',
            ],
            [
                'jabatan'=>'Dosen Magister Manajemen',
            ],
            [
                'jabatan'=>'Dosen Informatika',
            ],
            [
                'jabatan'=>'Dosen Sistem Informasi',
            ],
            [
                'jabatan'=>'Dosen Kedokteran',
            ],
            [
                'jabatan'=>'Dosen Profesi Dokter',
            ],
            [
                'jabatan'=>'Dosen Pendidikan Bahasa Inggris',
            ],
            [
                'jabatan'=>'Dosen Studi Humanitas',
            ],
            [
                'jabatan'=>'Staff Filsafat Keilahian Program Sarjana',
            ],
            [
                'jabatan'=>'Staff Filsafat Keilahian Program Magister',
            ],
            [
                'jabatan'=>'Staff Doktor Teologi',
            ],
            [
                'jabatan'=>'Staff Arsitektur',
            ],
            [
                'jabatan'=>'Staff Magister Arsitektur',
            ],
            [
                'jabatan'=>'Staff Desain Produk',
            ],
            [
                'jabatan'=>'Staff Biologi',
            ],
            [
                'jabatan'=>'Staff Manajemen',
            ],
            [
                'jabatan'=>'Staff Akuntansi',
            ],
            [
                'jabatan'=>'Staff Magister Manajemen',
            ],
            [
                'jabatan'=>'Staff Informatika',
            ],
            [
                'jabatan'=>'Staff Sistem Informasi',
            ],
            [
                'jabatan'=>'Staff Kedokteran',
            ],
            [
                'jabatan'=>'Staff Profesi Dokter',
            ],
            [
                'jabatan'=>'Staff Pendidikan Bahasa Inggris',
            ],
            [
                'jabatan'=>'Staff Studi Humanitas',
            ],
            [
                'jabatan'=>'Sekretariat Fakultas Teologi',
            ],
            [
                'jabatan'=>'Sekretariat Fakultas Arsitektur dan Desain',
            ],
            [
                'jabatan'=>'Sekretariat Fakultas Bioteknologi',
            ],
            [
                'jabatan'=>'Sekretariat Fakultas Bisnis',
            ],
            [
                'jabatan'=>'Sekretariat Fakultas Teknologi Informasi',
            ],
            [
                'jabatan'=>'Sekretariat Fakultas Kedokteran',
            ],
            [
                'jabatan'=>'Sekretariat Fakultas Kependidikan Dan Humaniora',
            ],
            [
                'jabatan'=>'Sekretariat Yayasan',
            ],
            [
                'jabatan'=>'Sekretariat Rektorat',
            ],
            [
                'jabatan'=>'Sekretariat Pengembangan Sumber Daya Manusia (PSDM)',
            ],
            [
                'jabatan'=>'Sekretariat Audit Internal',
            ],
            [
                'jabatan'=>'Sekretariat Admisi dan Promosi',
            ],
            [
                'jabatan'=>'Sekretariat Unit Penjaminan Mutu Institusi (InQA)',
            ],
            [
                'jabatan'=>'Sekretariat Perpustakaan',
            ],
            [
                'jabatan'=>'Sekretariat Poliklinik',
            ],
            [
                'jabatan'=>'Sekretariat Unit Kerumahtanggaan (KRT)',
            ],
            [
                'jabatan'=>'Sekretariat Mata Kuliah Humaniora (MKH)',
            ],
            [
                'jabatan'=>'Sekretariat Centrino',
            ],
            [
                'jabatan'=>'Sekretariat Unit Pengembangan Institusi (UPI)',
            ],
            [
                'jabatan'=>'Sekretariat Biro Administrasi Akademik (Biro I)',
            ],
            [
                'jabatan'=>'Sekretariat Biro Administrasi dan Keuangan (Biro II)',
            ],
            [
                'jabatan'=>'Sekretariat Biro Kemahasiswaan, Alumni dan Pengembangan Karir (Biro III)',
            ],
            [
                'jabatan'=>'Sekretariat Biro Kerjasama dan Relasi Publik (Biro IV)',
            ],
            [
                'jabatan'=>'Sekretariat Pusat Pelayanan Informasi dan Intranet Kampus (PUSPINdIKA)',
            ],
            [
                'jabatan'=>'Sekretariat Pusat Pelatihan dan Layanan Komputer (PPLK)',
            ],
            [
                'jabatan'=>'Sekretariat Pusat Pelatihan Bahasa (PPB)',
            ],
            [
                'jabatan'=>'Sekretariat Pusat Penempatan Kerja dan Pengembangan Kewirausahaan (PPKPK)',
            ],
            [
                'jabatan'=>'Sekretariat Lembaga Pengembangan Akademik dan Inovasi Pembelajaran (LPAIP)',
            ],
            [
                'jabatan'=>'Sekretariat Lembaga Penelitian dan Pengabdian pada Masyarakat (LPPM)',
            ],
            [
                'jabatan'=>'Sekretariat Lembaga Pelayanan Kerohanian, Konseling dan Spiritualitas Kampus',
            ],
            [
                'jabatan'=>'Staff Yayasan',
            ],
            [
                'jabatan'=>'Staff Rektorat',
            ],
            [
                'jabatan'=>'Staff Pengembangan Sumber Daya Manusia (PSDM)',
            ],
            [
                'jabatan'=>'Staff Audit Internal',
            ],
            [
                'jabatan'=>'Staff Admisi dan Promosi',
            ],
            [
                'jabatan'=>'Staff Unit Penjaminan Mutu Institusi (InQA)',
            ],
            [
                'jabatan'=>'Staff Perpustakaan',
            ],
            [
                'jabatan'=>'Staff Poliklinik',
            ],
            [
                'jabatan'=>'Staff Unit Kerumahtanggaan (KRT)',
            ],
            [
                'jabatan'=>'Staff Mata Kuliah Humaniora (MKH)',
            ],
            [
                'jabatan'=>'Staff Centrino',
            ],
            [
                'jabatan'=>'Staff Unit Pengembangan Institusi (UPI)',
            ],
            [
                'jabatan'=>'Staff Biro Administrasi Akademik (Biro I)',
            ],
            [
                'jabatan'=>'Staff Biro Administrasi dan Keuangan (Biro II)',
            ],
            [
                'jabatan'=>'Staff Biro Kemahasiswaan, Alumni dan Pengembangan Karir (Biro III)',
            ],
            [
                'jabatan'=>'Staff Biro Kerjasama dan Relasi Publik (Biro IV)',
            ],
            [
                'jabatan'=>'Staff Pusat Pelayanan Informasi dan Intranet Kampus (PUSPINdIKA)',
            ],
            [
                'jabatan'=>'Staff Pusat Pelatihan dan Layanan Komputer (PPLK)',
            ],
            [
                'jabatan'=>'Staff Pusat Pelatihan Bahasa (PPB)',
            ],
            [
                'jabatan'=>'Staff Pusat Penempatan Kerja dan Pengembangan Kewirausahaan (PPKPK)',
            ],
            [
                'jabatan'=>'Staff Lembaga Pengembangan Akademik dan Inovasi Pembelajaran (LPAIP)',
            ],
            [
                'jabatan'=>'Staff Lembaga Penelitian dan Pengabdian pada Masyarakat (LPPM)',
            ],
            [
                'jabatan'=>'Staff Lembaga Pelayanan Kerohanian, Konseling dan Spiritualitas Kampus',
            ],
        ];
        foreach($dataPengguna as $val){
            DB::table('jabatan')->insert($val);
        }
    }
}
