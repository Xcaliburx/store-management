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
        <a href="{{ route('outlet.create') }}" class="btn btn-md btn-success mb-3 float-right">New Outlet</a>

        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th scope="col">Kode outlet</th>
                    <th scope="col">Nama outlet</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aktif</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($outlets as $outlet)
                <tr>
                    <td>{{ $outlet->kd_outlet }}</td>
                    <td>{{ $outlet->nm_outlet }}</td>
                    <td>{{ $outlet->alamat }}</td>
                    <td>{{ $outlet->aktif ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('outlet.destroy', $outlet->kd_outlet) }}" method="POST">
                            <a href="{{ route('outlet.edit', $outlet->kd_outlet) }}"
                                class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center text-mute" colspan="5">Data outlet tidak ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

