<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $fillable = [
        'nama',
        'merk',
        'jenis_kendaraan',
        'no_polisi',
        'jumlah_kursi',
        'harga',
        'transmisi',
        'gambar',
        'created_at',
        'updated_at',
    ];

    public function transaksis()
{
    return $this->hasMany(Transaksi::class);
}


}
