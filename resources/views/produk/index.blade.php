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
        <a href="{{ route('produk.create') }}" class="btn btn-md btn-success mb-3 float-right">New Produk</a>

        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th scope="col">Kode produk</th>
                    <th scope="col">Nama produk</th>
                    <th scope="col">HNA</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>{{ $product->kd_produk }}</td>
                    <td>{{ $product->nm_produk }}</td>
                    <td>{{ $product->hna }}</td>
                    <td class="text-center">
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('produk.destroy', $product->kd_produk) }}" method="POST">
                            <a href="{{ route('produk.edit', $product->kd_produk) }}"
                                class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center text-mute" colspan="4">Data produk tidak ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

