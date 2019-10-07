@extends('frontend_view.layout')

@section('content')

	<div class="container">
        <div class="row">
            <div class="features_items">
            
                <h2 class="title text-center">{{ $data['title']}}</h2>

            </div>  
            <table  id="sample_editable_1">
              <tbody>
                <tr>
                  <td>
                  <pre>{{ $data['content']}}</pre>
                  </td>
                </tr>
              </tbody>
            </table> 
             <a class="btn btn-default check_out" href="{{url('index')}}" style="margin-left:0px;margin-bottom: 10px;">Continue Shopping</a>
        </div>
    </div> 


@endsection