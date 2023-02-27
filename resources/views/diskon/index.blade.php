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
        <a href="{{ route('diskon.create') }}" class="btn btn-md btn-success mb-3 float-right">New Diskon</a>

        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th scope="col">No Surat</th>
                    <th scope="col">Nama Outlet</th>
                    <th scope="col">Awal</th>
                    <th scope="col">Akhir</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($diskons as $diskon)
                <tr>
                    <td>
                        <a href="{{ route('diskon.detail', $diskon->no_surat) }}">
                            {{ $diskon->no_surat }}
                        </a>
                    </td>
                    <td>{{ $diskon->nm_outlet }}</td>
                    <td>{{ $diskon->awal }}</td>
                    <td>{{ $diskon->akhir }}</td>
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

