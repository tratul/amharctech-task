@extends('admin.layout.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Code</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($orders as $key => $order)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $order->code }} @if ($order->view == 0)
                        <span class="badge bg-dark">new</span>
                    @endif</td>
                    <td>{{ $order->qty }}</td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        <a href="{{route('admin.order.show',$order->id)}}"><span class="badge bg-success">View</span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection