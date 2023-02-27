<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_D extends Model
{
    use HasFactory;

    protected $table = 'order__d';
    public $incrementing = false;
    protected $primaryKey = 'no_order';

    protected $fillable = [
        'no_order', 'no_order_dt', 'kd_produk', 'jumlah', 'harga', 'diskon'
    ];
}
