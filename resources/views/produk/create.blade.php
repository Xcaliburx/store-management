@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-header">
        <h1>Create new Outlet</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('produk.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="kd_produk">Kode Produk</label>
                <input type="text" class="form-control @error('kd_produk') is-invalid @enderror"
                    name="kd_produk" value="{{ old('kd_produk') }}" required>

                @error('kd_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nm_produk">Nama Produk</label>
                <input type="text" class="form-control @error('nm_produk') is-invalid @enderror"
                    name="nm_produk" value="{{ old('nm_produk') }}" required>

                @error('nm_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="hna">HNA</label>
                <input type="number" class="form-control @error('hna') is-invalid @enderror"
                    name="hna" value="{{ old('hna') }}" required>

                @error('hna')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div style="margin-top: 20px">
                <button type="submit" class="btn btn-md btn-primary">Save</button>
                <a href="{{ route('produk.index') }}" class="btn btn-md btn-secondary">back</a>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
