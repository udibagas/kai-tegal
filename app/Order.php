<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'nomor',
        'tanggal_masuk',
        'tanggal_keluar',
        'sarana_id',
        'jenis_sarana_id',
        'dipo_id',
        'jalur_id',
        'jenis_pekerjaan_id',
        'prosentase_pekerjaan',
        'status',
        'user_id'
    ];
}
