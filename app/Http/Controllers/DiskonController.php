<?php

namespace App\Http\Controllers;

use App\Models\Diskon_H;
use App\Models\Diskon_D;
use App\Models\Outlet;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiskonController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $diskons = DB::table('diskon__h')
                    ->join('outlets', 'diskon__h.kd_outlet', '=', 'outlets.kd_outlet')
                    ->get();
        return view('diskon.index', compact('diskons'));
    }

    public function create()
    {
        $outlets = Outlet::get();
        return view('diskon.create', compact('outlets'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'no_surat' => 'required|string|max:10|unique:diskon__h,no_surat',
                'awal' => 'required',
                'akhir' => 'required'
            ]
        );

        $diskon = Diskon_H::create([
            'no_surat' => $request->no_surat,
            'kd_outlet' => $request->kd_outlet,
            'awal' => $request->awal,
            'akhir' => $request->akhir
        ]);

        if($diskon) {
            return redirect()->route('diskon.index')->with([
                'success' => 'Diskon has been created successfully'
            ]);
        }
    }

    public function detail($id)
    {
        $diskon = DB::table('diskon__h')
                    ->join('outlets', 'diskon__h.kd_outlet', '=', 'outlets.kd_outlet')
                    ->where('no_surat', $id)
                    ->first();
        $produk_diskon = DB::table('diskon__d')
                            ->join('produks', 'diskon__d.kd_produk', '=', 'produks.kd_produk')
                            ->where('no_surat', $id)
                            ->get();
        return view('diskon.detail', compact('diskon', 'produk_diskon'));
    }

    public function addNewProduct($id)
    {
        $products = Produk::get();
        return view('diskon.add_detail', compact('id', 'products'));
    }

    public function storeProduct(Request $request)
    {
        $this->validate($request,
            [
                'kd_produk' => 'required|unique:diskon__d,kd_produk',
                'diskon' => 'required|numeric|max:100',
                'min' => 'required|numeric',
                'max' => 'required|numeric'
            ],
            [
                'kd_produk.unique' => 'The product code already has diskon'
            ]
        );

        $diskon = Diskon_D::create([
            'no_surat' => $request->no_surat,
            'kd_produk' => $request->kd_produk,
            'diskon' => $request->diskon,
            'min' => $request->min,
            'max' => $request->max
        ]);

        if($diskon) {
            return redirect()->route('diskon.detail', $diskon->no_surat)->with([
                'success' => 'Produk Diskon has been added successfully'
            ]);
        }
    }

    public function destroy($id, $productId) {
        $detail = Diskon_D::where('kd_produk', $productId)
                    ->where('no_surat', $id)
                    ->firstOrFail();
        $detail->delete();

        if($detail) {
            return redirect()->route('diskon.index')->with([
                'success' => 'Produk Diskon has been deleted successfully'
            ]);
        }
    }
}
