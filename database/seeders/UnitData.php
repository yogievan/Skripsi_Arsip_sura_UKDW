<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'unit'=>'Yayasan',
            ],
            [
                'unit'=>'Rektorat',
            ],
            [
                'unit'=>'Fakultas Teologi',
            ],
            [
                'unit'=>'Fakultas Arsitektur dan Desain',
            ],
            [
                'unit'=>'Fakultas Bioteknologi',
            ],
            [
                'unit'=>'Fakultas Bisnis',
            ],
            [
                'unit'=>'Fakultas Teknologi Informasi',
            ],
            [
                'unit'=>'Fakultas Kedokteran',
            ],
            [
                'unit'=>'Fakultas Kependidikan Dan Humaniora',
            ],
            [
                'unit'=>'Pengembangan Sumber Daya Manusia (PSDM)',
            ],
            [
                'unit'=>'Pengembangan Sumber Daya Manusia (PSDM)',
            ],
            [
                'unit'=>'Audit Internal',
            ],
            [
                'unit'=>'Admisi dan Promosi',
            ],
            [
                'unit'=>'Unit Penjaminan Mutu Institusi (InQA)',
            ],
            [
                'unit'=>'Perpustakaan',
            ],
            [
                'unit'=>'Poliklinik',
            ],
            [
                'unit'=>'Unit Kerumahtanggaan (KRT)',
            ],
            [
                'unit'=>'Mata Kuliah Humaniora (MKH)',
            ],
            [
                'unit'=>'Centrino',
            ],
            [
                'unit'=>'Unit Pengembangan Institusi (UPI)',
            ],
            [
                'unit'=>'Biro Administrasi Akademik (Biro I)',
            ],
            [
                'unit'=>'Biro Administrasi dan Keuangan (Biro II)',
            ],
            [
                'unit'=>'Biro Kemahasiswaan, Alumni dan Pengembangan Karir (Biro III)',
            ],
            [
                'unit'=>'Biro Kerjasama dan Relasi Publik (Biro IV)',
            ],
            [
                'unit'=>'Pusat Pelayanan Informasi dan Intranet Kampus (PUSPINdIKA)',
            ],
            [
                'unit'=>'Pusat Pelatihan dan Layanan Komputer (PPLK)',
            ],
            [
                'unit'=>'Pusat Pelatihan Bahasa (PPB)',
            ],
            [
                'unit'=>'Pusat Penempatan Kerja dan Pengembangan Kewirausahaan (PPKPK)',
            ],
            [
                'unit'=>'Lembaga Pengembangan Akademik dan Inovasi Pembelajaran (LPAIP)',
            ],
            [
                'unit'=>'Lembaga Penelitian dan Pengabdian pada Masyarakat (LPPM)',
            ],
            [
                'unit'=>'Lembaga Pelayanan Kerohanian, Konseling dan Spiritualitas Kampus',
            ],
            [
                'unit'=>'Admin',
            ],
        ];
        foreach($data as $val){
            DB::table('unit')->insert($val);
        }
    }
}
