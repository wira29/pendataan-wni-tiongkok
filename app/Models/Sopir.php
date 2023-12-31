<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sopir extends Model
{
    use HasFactory;

    protected $table = 'drivers';

    protected $fillable = [
        'nama',
        'sim',
        'alamat',
        'gambar',
        'created_at',
        'updated_at',
    ];
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
    
}
