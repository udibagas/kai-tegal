<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    protected $fillable = ['nomor', 'nomor_lama', 'jenis_sarana_id', 'dipo_id'];
}
