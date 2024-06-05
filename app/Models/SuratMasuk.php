<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';
    protected $fillable = [
        'id_kategori_surat',
        'id_unit',
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
