<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disposisiSuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'disposisi_surat_keluar';
    protected $fillable = [
        'id_sifat_surat',
        'id_surat_keluar',
        'pengirim',
        'penerima',
        'catatan',
        'lampiran_1',
        'lampiran_2',
        'lampiran_3',
        'status_disposisi',
    ];
}
