@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h1 style="text-align: center">Sales Order</h1>
        <div style="display: flex; justify-content: space-between; margin-top: 40px">
            <div style="display: flex; gap: 20px">
                <h5>No Order: </h5>
                <h5 style="border: 2px solid black; width: 200px">{{ $order->no_order }}</h5>
            </div>
            <div style="display: flex; gap: 20px">
                <h5>Tanggal: </h5>
                <h5 style="border: 2px solid black; width: 300px">{{ $order->tanggal }}</h5>
            </div>
            <div style="display: flex; gap: 20px">
                <h5>Status: </h5>
                <h5 style="border: 2px solid black; width: 200px">{{ $order->lunas ? 'LUNAS' : 'BELUM LUNAS' }}</h5>
            </div>
        </div>
        <div style="display: flex; justify-content: flex-start; gap: 50px">
            <div style="display: flex; gap: 20px">
                <h5>Outlet: </h5>
                <h5 style="border: 2px solid black; width: 200px; margin-left: 24px">{{ $order->nm_outlet }}</h5>
            </div>
            <h5 style="border: 2px solid black; width: 100%">{{ $order->alamat }}</h5>
        </div>
        <div>
            <a
                href=""
                class="btn btn-md btn-success mb-3 float-right"
                style="margin-top: 20px"
            >
                Add Detail
            </a>
            <a
                href=""
                class="btn btn-md btn-danger mb-3 float-right"
                style="margin-top: 20px"
            >
                Delete
            </a>
        </div>


        <div style="display: none">
            {{ $total = 0 }}
        </div>

        <table class="table table-bordered mt-1">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Kode</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Sub Total</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk_order as $produk)
                <tr>
                    <td>{{ $produk->no_order_dt }}</td>
                    <td>{{ $produk->nm_produk }}</td>
                    <td>{{ $produk->jumlah }}</td>
                    <td>{{ $produk->harga * $produk->jumlah }}</td>
                    <td>{{ $produk->diskon }} %</td>
                    <td>{{ $produk->harga * $produk->jumlah - ($produk->harga * $produk->jumlah * $produk->diskon / 100) }}</td>
                    <div style="display: none">{{$total += $produk->harga * $produk->jumlah - ($produk->harga * $produk->jumlah * $produk->diskon / 100)}}</div>
                </tr>
                @empty
                <tr>
                    <td class="text-center text-mute" colspan="4">Data diskon tidak ada</td>
                </tr>
                @endforelse
                <tr>
                    <td colspan="5">Grand Total</td>
                    <td colspan="1">{{ $total }}</td>
                </tr>
            </tbody>
        </table>

        <div style="margin-top: 40px; text-align: end">
            <a href="{{ route('order.index') }}" class="btn btn-md btn-primary">Simpan</a>
            <button type="button" class="btn btn-md btn-secondary">Cetak Invoice</button>
        </div>
    </div>
</div>
@endsection

