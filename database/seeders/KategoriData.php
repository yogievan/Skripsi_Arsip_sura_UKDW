<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'letter_code'=>'SK',
                'kategori_surat'=>'Surat keputusan',
            ],
            [
                'letter_code'=>'SU',
                'kategori_surat'=>'Surat undangan',
            ],
            [
                'letter_code'=>'SPm',
                'kategori_surat'=>'Surat permohonan',
            ],
            [
                'letter_code'=>'SPb',
                'kategori_surat'=>'Surat pemberitahuan',
            ],
            [
                'letter_code'=>'SPp',
                'kategori_surat'=>'Surat peminjaman',
            ],

            [
                'letter_code'=>'SPn',
                'kategori_surat'=>'Surat pernyataan',
            ],
            [
                'letter_code'=>'SM',
                'kategori_surat'=>'Surat mandat',
            ],
            [
                'letter_code'=>'ST',
                'kategori_surat'=>'Surat tugas',
            ],
            [
                'letter_code'=>'SKet',
                'kategori_surat'=>'Surat keterangan',
            ],
            [
                'letter_code'=>'SR',
                'kategori_surat'=>'Surat rekomendasi',
            ],
            [
                'letter_code'=>'SB',
                'kategori_surat'=>'Surat balasan',
            ],
            [
                'letter_code'=>'SPPD',
                'kategori_surat'=>'Surat perintah perjalanan dinas',
            ],
            [
                'letter_code'=>'SRT',
                'kategori_surat'=>'Sertifikat',
            ],
            [
                'letter_code'=>'PK',
                'kategori_surat'=>'Perjanjian kerja',
            ],
            [
                'letter_code'=>'SPeng',
                'kategori_surat'=>'Surat pengantar',
            ],
        ];
        foreach($data as $val){
            DB::table('kategori_surat')->insert($val);
        }
    }
}
