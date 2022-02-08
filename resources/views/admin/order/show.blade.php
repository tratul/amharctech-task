@extends('admin.layout.app')

@section('content')
    <div class="container mt-4">
        <tbody>

            <tr>
              <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;text-align:center;">Order Items</td>
  
            </tr>
            <tr>
              <td colspan="2">
                <table style="width:100%;border-collapse: collapse;">
                    <tr>
                        <th style=" border: 1px solid #ddd;padding: 8px;font-size: 15px;text-align:left;">#</th>
                        <th style=" border: 1px solid #ddd;padding: 8px;font-size: 15px;text-align:left;">Description</th>
                        <th style=" border: 1px solid #ddd;padding: 8px;font-size: 15px;text-align:left;">Qty</th>
                        <th style=" border: 1px solid #ddd;padding: 8px;font-size: 15px;text-align:left;">Price</th>
                        <th style=" border: 1px solid #ddd;padding: 8px;font-size: 15px;text-align:left;">Total</th>
                    </tr>
                    @foreach ($order->orderDetails->where('order_id', $order->id) as $key => $orderDetail)
                    <tr>
                        <td style=" border: 1px solid #ddd;padding: 8px;font-size: 13px;">{{ $key+1 }}</td>
                        <td style=" border: 1px solid #ddd;padding: 8px;font-size: 13px;">
                          <strong>{{ $orderDetail->product_name }}</strong>
                        </td>
                        <td style=" border: 1px solid #ddd;padding: 8px;font-size: 13px;">
                            {{ $orderDetail->qty }}
                        </td>
                        <td style=" border: 1px solid #ddd;padding: 8px;font-size: 13px;">
                            {{ $orderDetail->price/$orderDetail->qty }}
                        </td>
                        <td style=" border: 1px solid #ddd;padding: 8px;font-size: 13px;">
                            {{ $orderDetail->price }}
                        </td>
                    </tr>
                @endforeach
                </table>
              </td>
            </tr>
        <tr>
          <td style="height:10px;"></td>
        </tr>
        <tr>
          <td style="width:50%;padding:20px;vertical-align:top">
  
          </td>
          <td style="width:50%;vertical-align:top">
              <table style="width:100%;border-collapse: collapse;">
                  <tbody>
          
          <tr>
              <td style=" border: 1px solid #ddd;padding: 8px;font-size: 13px;">
                  <strong>{{__('TOTAL')}} :</strong>
              </td>
              <td style=" border: 1px solid #ddd;padding: 8px;font-size: 13px;">
                  {{ $order->amount }}
              </td>
          </tr>
          </tbody>
              </table>
          </td>
        </tr>
  
        <tr>
          <td style="height:35px;"></td>
        </tr>
        <tr>
          <td style="width:50%;padding:20px;vertical-align:top">
           <address>
              <h5 style="margin: 0;padding: 5px 0;font-weight:bold;">Bill From</h5>
              <p style="font-size: 14px;margin:0;padding:2px;"><b>Email : example@gmail.com</b></p>
              <p style="font-size: 14px;margin:0;padding:2px;"><b>Phone : 01234567891</b></p>
           </address>
          </td>
          
        </tr>
  
      </tbody>
    </div>
@endsection