@extends('layouts.admin')

@section('content')

<div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Total Templates
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    {{ $totalTemplates }}
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                    Total Orders
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                    {{ $totalOrders }}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection