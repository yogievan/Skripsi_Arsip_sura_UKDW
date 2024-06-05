<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluar';
    protected $fillable = [
        'id_kategori_surat',
        'id_unit',
        'kode_surat',
        'pengirim',
        'penerima',
        'subjek',
        'catatan',
        'lampiran_1',
        'lampiran_2',
        'lampiran_3',
        'status_surat',
    ];
}
