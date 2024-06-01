<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SifatData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'sifat_surat'=>'Sangat Segera',
            ],
            [
                'sifat_surat'=>'Segera',
            ],
            [
                'sifat_surat'=>'Penting',
            ],
            [
                'sifat_surat'=>'Biasa',
            ],
            
        ];
        foreach($data as $val){
            DB::table('sifat_surat')->insert($val);
        }
    }
}
