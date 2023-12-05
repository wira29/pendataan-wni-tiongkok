<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pendataan extends Model
{
    use HasFactory;

    protected $table = 'pendataans';
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
        'batas_tanggal',
    ];

    public function submitPendataans(): HasMany
    {
        return $this->hasMany(SubmitPendataan::class, 'pendataan_id');
    }

}
