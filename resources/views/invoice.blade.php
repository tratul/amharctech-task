@php
 $order_id =  $array['content'];
//   $order_id =  '20201009-20033653';
  $order = App\Models\Order::where('code', $order_id)->first();
@endphp
<html>
	<title>Your order have been placed | Your order id {{ $order->code }}</title>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">

  <table style="max-width:770px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
    <thead>
	  <tr style="background: #f5f2f2;width:100% !important;">
		<th style="text-align:center;padding: 40px;" colspan="2">
			<h2 style="color: #000000">Thanks For Your Purchase</h2>
		</th>
      </tr>
    </thead>
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
    <tfooter>
      <tr>
        <td  style="font-size:14px;padding:50px 15px 0 15px;">
		  <strong style="display:block;margin:0 0 10px 0;">Regards</strong> <a href="#" style="text-decoration: none;font-weight:bold">Tech AmharcTech</a><br>
		</td>
		<td style="font-size:14px;padding:50px 15px 0 15px;">

		  </td>
      </tr>
    </tfooter>
  </table>
</body>

</html>
