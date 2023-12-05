<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubmitPendataan extends Model
{
    use HasFactory;

    protected $table = 'submit_pendataans';

    protected $fillable = [
        'id',
        'pendataan_id',
        'user_id',
        'tempat_lahir',
        'tanggal_lahir',
        'keperluan',
        'no_hp_tiongkok',
        'no_paspor',
        'masa_berlaku_paspor',
        'no_visa',
        'masa_berlaku_visa',
        'nama_kontak_darurat',
        'no_kontak_darurat',
        'hubungan_kontak_darurat',
        'created_at',
        'updated_at',
    ];

    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
