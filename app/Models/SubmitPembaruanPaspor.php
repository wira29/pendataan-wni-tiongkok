<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;


class SubmitPembaruanPaspor extends Model
{
    use HasFactory;

    protected $table = 'submit_pembaruan_paspors';

    protected $fillable = [
        'id',
        'pembaruan_paspors_id',
        'user_id',
        'file',
        'created_at',
        'updated_at',
    ];
    public function pengguna(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
