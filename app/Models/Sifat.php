<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sifat extends Model
{
    use HasFactory;
    protected $table = 'sifat_surat';
    protected $fillable = [
        'sifat_surat',
    ];
}
