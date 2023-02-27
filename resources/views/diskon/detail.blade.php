@extends('layouts.app')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <h3>No Surat: {{ $diskon->no_surat }}</h3>
        <h5>Outlet Name: {{ $diskon->nm_outlet }}</h5>
        <h5>Awal: {{ $diskon->awal }}</h5>
        <h5>Akhir: {{ $diskon->akhir }}</h5>
        <a
            href="{{ route('diskon.detail.create', $diskon->no_surat) }}"
            class="btn btn-md btn-success mb-3 float-right"
            style="margin-top: 20px"
        >
            Add Produk Diskon
        </a>

        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Diskon</th>
                    <th scope="col">Min</th>
                    <th scope="col">Max</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($produk_diskon as $produk)
                <tr>
                    <td>{{ $produk->nm_produk }}</td>
                    <td>{{ $produk->diskon }}</td>
                    <td>{{ $produk->min }}</td>
                    <td>{{ $produk->max }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('diskon.detail.destroy', [$diskon->no_surat, $produk->kd_produk]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center text-mute" colspan="4">Data diskon tidak ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

