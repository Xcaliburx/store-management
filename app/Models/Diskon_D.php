<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon_D extends Model
{
    use HasFactory;

    protected $table = 'diskon__d';
    public $incrementing = false;
    protected $primaryKey = 'no_surat';

    protected $fillable = [
        'no_surat', 'kd_produk', 'diskon', 'min', 'max'
    ];
}
