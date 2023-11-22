<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabang extends Model
{
    use HasFactory;

    protected $table = 'cabangs';
    protected $fillable = [
        'nama',
        'alamat',
    ];

    public function rantings()
    {
        return $this->hasMany(Ranting::class, 'cabang_id', 'id');
    }
}
