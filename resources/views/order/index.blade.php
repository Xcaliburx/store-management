@extends('layouts.app')

@section('content')
<div class="card border-0 shadow rounded">
    <div class="card-body">
        <table class="table table-bordered mt-1">
            <thead>
                <tr>
                    <th scope="col">No Order</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Outlet Name</th>
                    <th scope="col">Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $order)
                <tr>
                    <td>
                        <a href="{{ route('order.detail', $order->no_order) }}">
                            {{ $order->no_order }}
                        </a>
                    </td>
                    <td>{{ $order->tanggal }}</td>
                    <td>{{ $order->nm_outlet }}</td>
                    <td>{{ $order->total_bayar }}</td>
                </tr>
                @empty
                <tr>
                    <td class="text-center text-mute" colspan="4">Data order tidak ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

