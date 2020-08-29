<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'jenis_detail_pekerjaan_id',
        'prosentase_pekerjaan',
        'keterangan'
    ];
}
