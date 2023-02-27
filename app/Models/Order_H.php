<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_H extends Model
{
    use HasFactory;

    protected $table = 'order__h';
    public $incrementing = false;
    protected $primaryKey = 'no_order';

    protected $fillable = [
        'no_order', 'tanggal', 'kd_outlet', 'lunas', 'total_bayar'
    ];
}
