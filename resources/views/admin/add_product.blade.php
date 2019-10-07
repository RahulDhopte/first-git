@extends('admin.layout')

@section('content')
<h3>Product Form</h3>
<div class="box">
  <div class="row justify-content-center">
    <div class="col-md-8">
       <br>
       <div class="box-header with-border" >
          <h3 class="box-title">Add Product</h3>
      </div>
      <br>
      <!--  -->
      <form id="product_validate" method="POST" action="{{ url('add_product/') }}" enctype="multipart/form-data">
        {{csrf_field()}}	
        <div class="box-body">
            <div class="form-group row">
                <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<span style="color:red;">*</span></label>

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
                <label for="sku" class="col-md-4 col-form-label text-md-right">{{ __('SKU') }}<span style="color:red;">*</span></label>

                <div class="col-md-6">
                    <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="" required autocomplete="firstname" autofocus>

                    @error('sku')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="short_description" class="col-md-4 col-form-label text-md-right">{{ __('Short description') }}<span style="color:red;">*</span></label>

                <div class="col-md-6">
                    <input id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="" required autocomplete="firstname" autofocus>

                    @error('Short_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="long_description" class="col-md-4 col-form-label text-md-right">{{ __('Long description') }}<span style="color:red;">*</span></label>

                <div class="col-md-6">
                    <input id="long_description" type="text" class="form-control @error('long_description') is-invalid @enderror" name="long_description" value="" required autocomplete="firstname" autofocus>

                    @error('Long_description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}<span style="color:red;">*</span></label>

                <div class="col-md-6">
                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="" required autocomplete="firstname" autofocus>

                    @error('Price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="special_price" class="col-md-4 col-form-label text-md-right">{{ __('Special price') }}</label>

                <div class="col-md-6">
                    <input id="special_price" type="text" class="form-control @error('special_price') is-invalid @enderror" name="special_price" value=""  autocomplete="firstname" autofocus>

                    @error('Special_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <input name="Image" id="uploadFile" required type="file" placeholder="Choose File" class="mandatory_fildes">

                    @error('Image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label  class="col-md-4 col-form-label text-md-right">{{ __('Status') }}<span style="color:red;">*</span></label>

                <div class="col-md-6">
                 <input type="radio" name="status" value="1"> Active<br>
                 <input type="radio" name="status" value="0"> Inactive<br>
             </div>
         </div>


         <div class="form-group row">
            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}<span style="color:red;">*</span></label>

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
            <label for="meta_title" class="col-md-4 col-form-label text-md-right">{{ __('Meta title') }}</label>

            <div class="col-md-6">
                <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value=""  autocomplete="firstname" autofocus>

                @error('Meta_title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="meta_description" class="col-md-4 col-form-label text-md-right">{{ __('Meta description') }}</label>

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
            <label for="meta_keywords" class="col-md-4 col-form-label text-md-right">{{ __('Meta keywords') }}</label>

            <div class="col-md-6">
                <input id="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value=""  autocomplete="firstname" autofocus>

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
        <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}<span style="color:red;">*</span></label>
        <div class="col-md-6">
           <select  name="Category">
              <option value="category">Select</option>
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
            
            @foreach($pro_attr as $role)

            <option value="{{ $role['id'] }}">{{ $role['Name'] }}</option>

            @endforeach
        </select>
    </div>
</div> 

<div class="form-group row">
    <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Product Attribute Value') }}</label>
    <div class="col-md-6">
        <select id="Attribute_value" name="Rahul[]" class="select day">
            <option value="5" >new</option>
            <option value="6" >green</option>
            <option value="23" >pro</option>

        </select>
    </div>
</div>    
<input class="btn btn-primary" type="button" value="Add Attribute" style="margin-left: 10px;margin-bottom: 10px;" onclick="create_Attribute();"/>
<div id="new_attribute">
 <!--  <select id=""></select> -->
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button  type="submit" class="btn btn-primary">
            {{ __('ADD') }}
        </button>
        <a style="margin-left: 10px;" class="btn btn-primary" href="{{url('list_product')}}">Back</a>
    </div>
</div>
</div>

</div>
</form>
</div>
</div>


<script type="text/JavaScript">

    $(document).ready(function () 
    {
        $(document.body).on('change','.product_attr',pro_value);
        pro_value();
    });

    $('#product_attr').on('change', function() {
        $.get('/get_product_value/'+$(this).val(), function(response){
            if(response.success)
            {
                var Attribute_value = $('#Attribute_value').empty();
                console.log(response);
                $.each(response.attr_values, function(i, attr_value){
                    $('<option/>', {
                        value:attr_value.id,
                        text:attr_value.Value
                    }).appendTo(Attribute_value);
                })
            }
        }, 'json'); 
    })


    function create_Attribute() {
        $.get('/get_product_attr/', function(response){
            if(response.success)
            {

           // var new_attribute = $('#new_attribute').empty(); 
           var str = '<div>'  
           str += '<label style="margin-left:20px;"> Attribute </label>'
           str+='<select  style="margin-left:20px;" class="product_attr" name="Pro_attr[]">';
           $.each(response.attribute, function(i, attr){

               str +='<option value="'+attr.id+'">'+attr.Name+'</option>';

           });


           str +='</select>';  
           str +=  '<label style="margin-left:20px;" > Value </label>'
           str +='<select class="value" name="Rahul[]" style="margin-left:20px;">';
           str +='<option value="">select</option>';
           str +='</select>';
           str +='<input class="btn btn-primary" type="button" value="Delete" style="margin-left: 10px;margin-bottom: 10px;" onclick="del_Attribute(this);"/>';
           str +='</div>';
           str += '<br>' ;

           $("#new_attribute").append(str);
           $('.product_attr:last').trigger('change');
       }
   }, 'json'); }

        function pro_value()
        {
         var $this = $(this); 
         $.get('/get_product_value/'+$this.val(), function(response){      
            if(response.success){
                var Attribute_value = $this.siblings('.value').empty();
                $.each(response.attr_values, function(i, attr_value){
                    $('<option/>', {
                        value:attr_value.id,
                        text:attr_value.Value
                    }).appendTo(Attribute_value);
                })
            }
        }, 'json');
     }

     function del_Attribute(elem){
        $(elem).parent('div').remove();
    }
</script>
@endsection

