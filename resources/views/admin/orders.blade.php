@extends('layouts.admin')

@section('content')

<h1 class="h3 mb-4 text-gray-800">Orders</h1>

<div class="card shadow mb-4">
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered">

                <thead class="bg-light">
                    <tr>
                        <th>Customer</th>
                        <th>Template</th>
                        <th>Tanggal Acara</th>
                        <th>Status</th>
                        <th>Link</th>
                        <th>Order Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($orders as $order)
                    <tr>
                        <td>{{ $order->nama }}</td>

                        <td>{{ $order->template->name ?? '-' }}</td>

                        <td>{{ $order->tanggal }}</td>

                        <td>
                            @if($order->status == 'paid')
                                <span class="badge bg-success">Paid</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ url('/invitation/' . $order->slug) }}" target="_blank">
                                Lihat Undangan
                            </a>
                        </td>

                        <td>{{ $order->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada order</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>
</div>

@endsection