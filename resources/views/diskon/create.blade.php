@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-header">
        <h1>Create new Diskon</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('diskon.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="no_surat">No Surat</label>
                <input type="text" class="form-control @error('no_surat') is-invalid @enderror"
                    name="no_surat" value="{{ old('no_surat') }}" required>

                @error('no_surat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="kd_outlet">Kode Outlet</label>
                <select name="kd_outlet" class="form-control" required>
                    @foreach ($outlets as $outlet)
                        <option value="{{ $outlet->kd_outlet }}">{{ $outlet->nm_outlet }}</option>
                    @endforeach
                </select>
                @error('kd_outlet')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="awal">Awal</label>
                <input type="datetime-local" class="form-control @error('awal') is-invalid @enderror"
                    name="awal" value="{{ old('awal') }}" required>

                @error('awal')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="akhir">Akhir</label>
                <input type="datetime-local" class="form-control @error('akhir') is-invalid @enderror"
                    name="akhir" value="{{ old('akhir') }}" required>

                @error('akhir')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div style="margin-top: 20px">
                <button type="submit" class="btn btn-md btn-primary">Save</button>
                <a href="{{ route('diskon.index') }}" class="btn btn-md btn-secondary">back</a>
            </div>
        </form>
    </div>
</div>
@endsection
