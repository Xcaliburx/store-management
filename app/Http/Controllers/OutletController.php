<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $outlets = Outlet::latest()->get();
        return view('outlet.index', compact('outlets'));
    }

    public function create()
    {
        return view('outlet.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'kd_outlet' => 'required|string|max:8|unique:outlets,kd_outlet',
                'nm_outlet' => 'required',
                'alamat' => 'required'
            ],
            [
                'kd_outlet.max' => 'The outlet code must not be greater than 8 characters.',
                'kd_outlet.unique' => 'The outlet code has already been taken'
            ]
        );

        $outlet = Outlet::create([
            'kd_outlet' => $request->kd_outlet,
            'nm_outlet' => $request->nm_outlet,
            'alamat' => $request->alamat,
            'aktif' => $request->aktif
        ]);

        if($outlet) {
            return redirect()->route('outlet.index')->with([
                'success' => 'Outlet has been created successfully'
            ]);
        }
    }

    public function edit($id)
    {
        $outlet = Outlet::where('kd_outlet', $id)->firstOrFail();
        return view('outlet.edit', compact('outlet'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nm_outlet' => 'required',
            'alamat' => 'required'
        ]);

        $outlet = Outlet::where('kd_outlet', $id)->firstOrFail();
        $outlet->update([
            'nm_outlet' => $request->nm_outlet,
            'alamat' => $request->alamat,
            'aktif' => $request->aktif
        ]);

        if($outlet) {
            return redirect()->route('outlet.index')->with([
                'success' => 'Outlet has been updated successfully'
            ]);
        }
    }

    public function destroy($id)
    {
        $outlet = Outlet::where('kd_outlet', $id)->firstOrFail();
        $outlet->delete();

        if($outlet) {
            return redirect()->route('outlet.index')->with([
                'success' => 'Outlet has been deleted successfully'
            ]);
        }
    }
}
