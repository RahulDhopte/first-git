
@extends('admin.layout')

@section('content')

<div style="margin-bottom: 25px;" class="container">
  <h2> Order Summary</h2>
  
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Customer Details</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><b>Customer ID :</b>{{$data[0]->user_id}}</div>
        <div class="panel-body"><b>FirstName :</b>{{$data[0]->first_name}}</div>
        <div class="panel-body"><b>LastName :</b>{{$data[0]->last_name}}</div>
        <div class="panel-body"><b>Email :</b>{{$data[0]->email}}</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Order Details</a>
          
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><b>Order ID :</b>{{$data[0]->id}}</div>
        <div class="panel-body"><b>Order Status :</b>{{$data[0]->Status}}</div>
        <div class="panel-body"><b>Order Total :</b>{{$data[0]->grand_total}}</div>

        <table style="width: 90%;" class="table table-bordered">
          <tr>
            <th>Item</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
          </tr>
          @foreach($data as $row)
          <tr>
            <td><img style="width: 80px" src='/upload_img/{{$row->Image}}'></td>
            <td>{{$row->Name}}</td>
            <td>{{$row->price}}</td>  
            <td>{{$row->quantity}}</td>
            <td>{{$row->amount}}</td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">

        <h4>
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Shipping Address</a>
          
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">
          <b>Billing Address:</b>
          {{$bill_addr[0]->billing_address}}
        </div>
        <div class="panel-body">
          <b>Shipping Address:</b>
          {{$ship_addr[0]->shipping_address}}
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">

          <h4 >
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Payment Method</a>

          </h4>
        </div>
        <div id="collapse4" class="panel-collapse collapse">
          <div class="panel-body"> <b>Payment Method:</b>{{$data[0]->name}}</div>
        </div>
      </div>
    </div>
  </div> 


  @endsection