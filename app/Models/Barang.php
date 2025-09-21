<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $guarded;

    protected $casts = ['tanggal_pembelian' =>'datetime'];
}
