<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'kd_outlet';

    protected $fillable = [
        'kd_outlet', 'nm_outlet', 'alamat', 'aktif'
    ];
}
