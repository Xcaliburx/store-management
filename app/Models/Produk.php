<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'kd_produk';

    protected $fillable = [
        'kd_produk', 'nm_produk', 'hna'
    ];
}
