<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Produk::latest()->get();
        return view('produk.index', compact('products'));
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'kd_produk' => 'required|string|max:5|unique:produks,kd_produk',
                'nm_produk' => 'required',
                'hna' => 'required|numeric'
            ],
            [
                'kd_produk.max' => 'The produk code must not be greater than 5 characters.',
                'kd_produk.unique' => 'The produk code has already been taken'
            ]
        );

        $produk = Produk::create([
            'kd_produk' => $request->kd_produk,
            'nm_produk' => $request->nm_produk,
            'hna' => $request->hna
        ]);

        if($produk) {
            return redirect()->route('produk.index')->with([
                'success' => 'Produk has been created successfully'
            ]);
        }
    }

    public function edit($id)
    {
        $produk = Produk::where('kd_produk', $id)->firstOrFail();
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nm_produk' => 'required',
            'hna' => 'required|numeric'
        ]);

        $produk = Produk::where('kd_produk', $id)->firstOrFail();
        $produk->update([
            'nm_produk' => $request->nm_produk,
            'hna' => $request->hna
        ]);

        if($produk) {
            return redirect()->route('produk.index')->with([
                'success' => 'Produk has been updated successfully'
            ]);
        }
    }

    public function destroy($id)
    {
        $produk = Produk::where('kd_produk', $id)->firstOrFail();
        $produk->delete();

        if($produk) {
            return redirect()->route('produk.index')->with([
                'success' => 'Produk has been deleted successfully'
            ]);
        }
    }
}
