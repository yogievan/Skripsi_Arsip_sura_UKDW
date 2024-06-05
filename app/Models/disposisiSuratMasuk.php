<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disposisiSuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'disposisi_surat_masuk';
    protected $fillable = [
        'id_sifat_surat',
        'id_surat_masuk',
        'pengirim',
        'penerima',
        'catatan',
        'lampiran_1',
        'lampiran_2',
        'lampiran_3',
        'status_disposisi',
    ];
}
