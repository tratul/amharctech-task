@extends('layouts.app-master')

@section('content')
    <div class="contaienr text-center py-4">
        <h6 class="text-grey"><b>Thank you, Your order has been placed</b></h6>
        <br>
        <p>An email has been sent to you</p>
        @php
            $order = App\Models\Order::all()->last();
        @endphp
        <h6 class="mt-2 mb-2"><b>ORDER NUMBER : {{ $order->code }}</b></h6>
        <a href="{{ url('/dashboard') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Go To  Shopping</a>
    </div>

@endsection


