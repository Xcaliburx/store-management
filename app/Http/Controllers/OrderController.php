<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $orders = DB::table('order__h')
                    ->join('outlets', 'order__h.kd_outlet', '=', 'outlets.kd_outlet')
                    ->get();
        return view('order.index', compact('orders'));
    }

    public function detail($id) {
        $order = DB::table('order__h')
                    ->join('outlets', 'order__h.kd_outlet', '=', 'outlets.kd_outlet')
                    ->where('no_order', $id)
                    ->first();
        $produk_order = DB::table('order__d')
                    ->join('produks', 'order__d.kd_produk', '=', 'produks.kd_produk')
                    ->where('no_order', $id)
                    ->get();
        return view('order.detail', compact('order', 'produk_order'));
    }
}
