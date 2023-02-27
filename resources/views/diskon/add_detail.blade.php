@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-header">
        <h1>Create new Diskon</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('diskon.detail.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="no_surat">No Surat</label>
                <input type="text" class="form-control @error('no_surat') is-invalid @enderror"
                    name="no_surat" value="{{ $id }}" readonly>
            </div>

            <div class="form-group">
                <label for="kd_produk">Kode Produk</label>
                <select name="kd_produk" class="form-control" required>
                    @foreach ($products as $produk)
                        <option value="{{ $produk->kd_produk }}">{{ $produk->nm_produk }}</option>
                    @endforeach
                </select>
                @error('kd_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="diskon">Diskon</label>
                <input type="number" class="form-control @error('diskon') is-invalid @enderror"
                    name="diskon" value="{{ old('diskon') }}" required>

                @error('diskon')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="min">Min</label>
                <input type="number" class="form-control @error('min') is-invalid @enderror"
                    name="min" value="{{ old('min') }}" required>

                @error('min')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="max">Max</label>
                <input type="number" class="form-control @error('max') is-invalid @enderror"
                    name="max" value="{{ old('max') }}" required>

                @error('max')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div style="margin-top: 20px">
                <button type="submit" class="btn btn-md btn-primary">Save</button>
                <a href="{{ route('diskon.detail', $id) }}" class="btn btn-md btn-secondary">back</a>
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
