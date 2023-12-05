<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


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

    public function submitPasports(): HasMany
    {
        return $this->hasMany(SubmitPembaruanPaspor::class, 'pembaruan_paspors_id');
    }
}
