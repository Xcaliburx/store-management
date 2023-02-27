@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-header">
        <h1>Update Outlet</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('outlet.update', $outlet->kd_outlet) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="kd_outlet">Kode Outlet</label>
                <input type="text" class="form-control @error('kd_outlet') is-invalid @enderror"
                    name="kd_outlet" value="{{ $outlet->kd_outlet }}" readonly>
            </div>

            <div class="form-group">
                <label for="nm_outlet">Nama Outlet</label>
                <input type="text" class="form-control @error('nm_outlet') is-invalid @enderror"
                    name="nm_outlet" value="{{ old('nm_outlet', $outlet->nm_outlet) }}" required>

                @error('nm_outlet')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea
                    name="alamat" id="alamat"
                    class="form-control @error('alamat') is-invalid @enderror"
                    rows="5"
                    required>{{ old('alamat', $outlet->alamat) }}</textarea>

                @error('alamat')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="aktif">Aktif</label>
                <select name="aktif" class="form-control" required>
                    <option value="1" {{ $outlet->aktif == 1 ? 'selected': '' }}>Aktif</option>
                    <option value="0" {{ $outlet->aktif == 0 ? 'selected': '' }}>Tidak Aktif</option>
                </select>
            </div>

            <div style="margin-top: 20px">
                <button type="submit" class="btn btn-md btn-primary">Update</button>
                <a href="{{ route('outlet.index') }}" class="btn btn-md btn-secondary">back</a>
            </div>
        </form>
    </div>
</div>
@endsection
