@extends('admin.layout')

@section('content')
 <div class="box">
  <div class="row justify-content-center">
        <div class="col-md-8">
        	<br>
		
		<br>
		 <!--  -->
    <form method="POST" action="{{ url('add_product/') }}" enctype="multipart/form-data">
                       	{{csrf_field()}}	


              <!--   <div class="box">
                <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="exampleInputFile">

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>
              </div>
              </div> -->
              <!-- /.box-body -->

           <!--    <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div> -->

                       
                            <h3 style="margin-left: 15px;margin-bottom: 25px;">Add Product</h3>
                        <!-- -->

                        <div class="form-group row">
                            <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="" required autocomplete="firstname" autofocus>

                                @error('Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}</label>

                            <div class="col-md-6">
                                <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value=""  autocomplete="firstname" autofocus>

                                @error('sku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="short_description" class="col-md-4 col-form-label text-md-right">{{ __('Short_description') }}</label>

                            <div class="col-md-6">
                                <input id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value=""  autocomplete="firstname" autofocus>

                                @error('Short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="long_description" class="col-md-4 col-form-label text-md-right">{{ __('Long_description') }}</label>

                            <div class="col-md-6">
                                <input id="long_description" type="text" class="form-control @error('long_description') is-invalid @enderror" name="long_description" value=""  autocomplete="firstname" autofocus>

                                @error('Long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value=""  autocomplete="firstname" autofocus>

                                @error('Price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="special_price" class="col-md-4 col-form-label text-md-right">{{ __('Special_price') }}</label>

                            <div class="col-md-6">
                                <input id="special_price" type="text" class="form-control @error('special_price') is-invalid @enderror" name="special_price" value="" required autocomplete="firstname" autofocus>

                                @error('Special_price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-6">
                            <input name="Image" id="uploadFile" type="file" placeholder="Choose File" class="mandatory_fildes">

                                @error('Image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                               <input type="radio" name="status" value="1"> Active<br>
							<input type="radio" name="status" value="0"> Inactive<br>
                            </div>
                        </div>

                                      
                            <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="" required autocomplete="firstname" autofocus>

                                @error('Quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_title" class="col-md-4 col-form-label text-md-right">{{ __('Meta_title') }}</label>

                            <div class="col-md-6">
                                <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="" required autocomplete="firstname" autofocus>

                                @error('Meta_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="meta_description" class="col-md-4 col-form-label text-md-right">{{ __('Meta_description') }}</label>

                            <div class="col-md-6">
                                <input id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value=""  autocomplete="firstname" autofocus>

                                @error('Meta_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="meta_keywords" class="col-md-4 col-form-label text-md-right">{{ __('Meta_keywords') }}</label>

                            <div class="col-md-6">
                                <input id="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="" required autocomplete="firstname" autofocus>

                                @error('Meta_keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-md-4 col-form-label text-md-right">{{ __('Meta_status') }}</label>

                            <div class="col-md-6">
                               <input type="radio" name="meta_status" value="1"> Active<br>
							<input type="radio" name="meta_status" value="0"> Inactive<br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                            <div class="col-md-6">
                            	<select  name="Category">
                            		<option value="">Select</option>
                            		@foreach($category as $role)
                            		
  									<option value="{{ $role['id'] }}">{{ $role['Name'] }}</option>
  									
 									@endforeach
								</select>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Product Attribute') }}</label>
                            <div class="col-md-6">
                                <select  id="product_attr" name="Pro_attr[]">
                                    <option value="0">Select</option>
                                    @foreach($pro_attr as $role)
                                    
                                    <option value="{{ $role['id'] }}">{{ $role['Name'] }}</option>
                                    
                                    @endforeach
                                </select>
                            </div>
                            </div> 

                            <div class="form-group row">
                            <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Product Attribute Value') }}</label>
                            <div class="col-md-6">
                                <select id="Attribute_value" name="day" class="select day">
                                            <option value="" >select</option>
                                            
                                        </select>
                            </div>
                            </div>    
                        <input class="btn btn-primary" type="button" value="Create Attribute" style="margin-left: 10px;margin-bottom: 10px;" onclick="create_Attribute();"/>
                            <div id="new_attribute">
                               <!--  <select id=""></select> -->
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button style="margin-bottom: 10px" type="submit" class="btn btn-primary">
                                    {{ __('ADD') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>


<script type="text/JavaScript">
$('#product_attr').on('change', function() {
    console.log('hello');
$.get('/get_product_value/'+$(this).val(), function(response){
    if(response.success)
    {
        var Attribute_value = $('#Attribute_value').empty();

        $.each(response.attr_values, function(i, attr_value){
            $('<option/>', {
                value:attr_value.id,
                text:attr_value.Value
            }).appendTo(Attribute_value);
        })
    }
}, 'json'); 
});

 

function create_Attribute() {
    $.get('/get_product_attr/', function(response){
        if(response.success)
        {

           // var new_attribute = $('#new_attribute').empty(); 
           var str = '<div>'  
            str += '<label style="margin-left:20px;"> Attribute </label>'
            str+='<select onchange="pro_value()" style="margin-left:20px;" class="product_attr" name="Pro_attr[]">';
            $.each(response.attribute, function(i, attr){

             str +='<option value="'+attr.id+'">'+attr.Name+'</option>';

         });


            str +='</select>';  
            str +=  '<label style="margin-left:20px;" > Value </label>'
            str +='<select class="value" style="margin-left:20px;">';
            str +='<option value="">select</option>';
            str +='</select>';
            str +='<input class="btn btn-primary" type="button" value="Delete" style="margin-left: 10px;margin-bottom: 10px;" onclick="del_Attribute(this);"/>';
            str +='</div>';
            str += '<br>';
            
            $("#new_attribute").append(str);
        }
    }, 'json'); }

 function pro_value()
 {
        console.log('hello');
 $.get('/get_product_value/'+$(this).val(), function(response){
    if(response.success){
        var Attribute_value = $('.value').empty();
        $.each(response.attr_values, function(i, attr_value){
            var str ='<option value="'+attr_value.id+'">'+attr_value.Value+'</option>';
            $(this).child().find('.value').append(str);
        })
    }
    }, 'json');
 }
    function del_Attribute(elem){
        $(elem).parent('div').remove();
    }
</script>
@endsection

