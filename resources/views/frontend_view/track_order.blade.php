@extends('frontend_view.profile_layout')

@section('content')

<table style="margin-left: 70px; width: 90%;padding: 0;border: 1px solid #E6E4DF;" class="table table-condensed">
					<thead>
						<tr style="background: #FE980F;color: #fff;font-size: 16px;" class="cart_menu">
							<td style="padding-left: 30px;">Order ID</td>
							<td>Date Of Order</td>
							<td>Total</td>
							<td>Status</td>
							<td></td>
							
						</tr>
					</thead>
					<tbody>
						@foreach($data as $row)
						
						     <tr>
							
							<td style="margin: 0;padding: 10px 45px;vertical-align: inherit;">
								<p>{{$row['id']}}</p>
							</td>
							<td style="margin: 0;padding: 0;vertical-align: inherit;">
								<p>{{$row['created_at']}}</p>
							</td>
						
							<td style="margin: 0;padding: 0;vertical-align: inherit;">
								<p>{{$row['Discount']}}</p>
							</td>
							<td style="margin: 0;padding: 0;vertical-align: inherit;">
								<p>{{$row->Status}}</p>
							</td>

							
						</tr> 
						@endforeach
						
					
					</tbody>
				</table>

				@endsection