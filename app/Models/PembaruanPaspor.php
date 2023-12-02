<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembaruanPaspor extends Model
{
    use HasFactory;

    protected $table = 'pembaruan_paspors';

    protected $fillable = [
        'id',
        'judul',
        'deskripsi',
        'foto',
        'batas_tanggal',
        'created_at',
        'updated_at',
    ];
}
