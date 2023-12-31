<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'id_mobil',
        'id_driver',
        'nama_peminjam',
        'no_hp',
        'alamat',
        'tanggalpinjam',
        'tanggalkembali',
        'harga',
        'persetujuan1',
        'persetujuan2',
        'status',
        'created_at',
        'updated_at',
    ];

    public function mobil(): BelongsTo
    {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }

    public function sopir(): BelongsTo
    {
        return $this->belongsTo(Sopir::class, 'id_driver');
    }


}