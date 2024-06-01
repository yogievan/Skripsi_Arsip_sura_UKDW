<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [	
                'nama' => 'Kepala Unit',
                'username' => 'KepalaUnit',
                'email' => 'yogievan32@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'KepalaUnit',
                'id_jabatan' => '2',
                'id_unit' => '2',
            ],
            [	
                'nama' => 'Dosen FTI',
                'username' => 'DosenFTI',
                'email' => 'yogi.evan@si.ukdw.ac.id',
                'password' => bcrypt('123'),
                'role' => 'DosenStaff',
                'id_jabatan' => '19',
                'id_unit' => '7',
            ],
            [	
                'nama' => 'Sekretariat Rektorat',
                'username' => 'SekretariatRektorat',
                'email' => 'yogievan400@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'Sekretariat',
                'id_jabatan' => '48',
                'id_unit' => '2',
            ],
            [	
                'nama' => 'Admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123'),
                'role' => 'Admin',
                'id_jabatan' => '1',
                'id_unit' => '32',
            ],
        ];

        foreach($data as $val){
            DB::table('users')->insert($val);
        }
    }
}
