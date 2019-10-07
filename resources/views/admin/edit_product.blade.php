@extends('admin.layout')

@section('content')
<h3>Update Product Form</h3>
<div class="box">
<div class="row justify-content-center">
    <div class="col-md-8">
       <br>
       <div class="box-header with-border">
          <h3 class="box-title">Update Product</h3>
      </div>
      <br>
      <!--  -->
      <form id="product_validate" method="POST" action="{{ url('update_product/'.$update['id']) }}" enctype="multipart/form-data">
        {{csrf_field()}}	
        <div style="border-top-left-radius: 0;border-top-right-radius: 0;border-bottom-right-radius: 3px;border-bottom-left-radius: 3px;padding: 10px;" class="box-body">
            <div class="form-group row">
                <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<span style="color:red;">*</span></label>

                <div class="col-md-6">
                    <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{$update['Name']}}" required autocomplete="firstname" autofocus>

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
                    <input id="sku" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{$update['sku']}}"  autocomplete="firstname" autofocus>

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
                    <input id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror" name="short_description" value="{{$update['short_description']}}"  autocomplete="firstname" autofocus>

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
                    <input id="long_description" type="text" class="form-control @error('long_description') is-invalid @enderror" name="long_description" value="{{$update['long_description']}}"  autocomplete="firstname" autofocus>

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
                    <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$update['price']}}"  autocomplete="firstname" autofocus>

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
                    <input id="special_price" type="text" class="form-control @error('special_price') is-invalid @enderror" name="special_price" value="{{$update['special_price']}}"  autocomplete="firstname" autofocus>

                    @error('Special_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <input type="hidden" name="og_img" value="{{$data[0]['Image']}}">

            <img style="width: 80px" src="{{asset($path .'/'. $data[0]['Image'])}}">

            <div class="form-group row">
                <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}<span style="color:red;">*</span></label>
                <div class="col-md-6">
                    <input name="" id="uploadFile" type="file" placeholder="Choose File" class="mandatory_fildes">

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
                 <input type="radio" name="status" <?php echo ($update['status']=='1') ?'checked':'' ?> value="1"> Active<br>
                 <input type="radio" name="status" <?php echo ($update['status']=='0') ?'checked':'' ?> value="0"> Inactive<br>
             </div>
         </div>


         <div class="form-group row">
            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}<span style="color:red;">*</span></label>

            <div class="col-md-6">
                <input id="quantity" type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{$update['quantity']}}" required autocomplete="firstname" autofocus>

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
                <input id="meta_title" type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{$update['meta_title']}}"  autocomplete="firstname" autofocus>

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
                <input id="meta_description" type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value="{{$update['meta_description']}}"  autocomplete="firstname" autofocus>

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
                <input id="meta_keywords" type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value="{{$update['meta_keywords']}}"  autocomplete="firstname" autofocus>

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
             <input type="radio" name="meta_status" <?php echo ($update['status']=='1') ?'checked':'' ?> value="1"> Active<br>
             <input type="radio" name="meta_status" <?php echo ($update['status']=='0') ?'checked':'' ?> value="0"> Inactive<br>
         </div>
     </div>
     <?php
     for($i=0;$i<count($product);$i++){
        echo sprintf('<input type="hidden" value="%s" name="og_attr[]">' , $product[$i]['product_attribute_id']);
        echo sprintf('<input type="hidden" value="%s" name="og_value[]">' , $product[$i]['product_attribute_value_id']);
     }?>
     <div class="form-group row">
        <label for="Category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}<span style="color:red;">*</span></label>
        <div class="col-md-6">
           <select name="Category">
              <option value="{{$cat['id']}}">{{$cat['Name']}}</option>
              @foreach($category as $role)

              <option value="{{ $role['id'] }}">{{ $role['Name'] }}</option>

              @endforeach
          </select>
      </div>
  </div> <!-- echo('$pro_attr[$i]['id']'=='$role1['id']') ?'selected':''  -->
<div>
  <?php 

    

    for($i=0;$i<count($product);$i++){
    echo "<div style='margin-top: 10px;'>
    <label style='margin-left: 10px;' >Product Attribute </label>
    
    <select  class='product_attr' name='Pro_attr[]'>
    <option value='0'>Select</option>";
    foreach($pro_attr as $role1){
        echo sprintf('<option value="%s" %s>%s</option>', $role1['id'], $product[$i]['product_attribute_id']==$role1['id'] ?'selected':'', $role1['Name']);
    }
    echo"
    </select>
     <label style='margin-left:10px;' >Value</label>
     <select  class='attr_value' name='value[]'>
    <option value='0'>Select</option>";
    foreach($count as $role1){
        echo sprintf('<option value="%s" %s>%s</option>', $role1['id'], $product[$i]['product_attribute_value_id']==$role1['id'] ?'selected':'',$role1['Value']);
    }
    echo"</select>
    <input class='btn btn-primary' type='button' value='Delete' style='margin-left: 10px;' onclick='del_Attribute(this);'/>
    </div>" ;}
?>
</div>
<input class="btn btn-primary" type="button" value="Add Attribute" style="margin-left: 10px;margin-bottom: 10px;" onclick="create_Attribute();"/>
<div id="new_attribute">
 <!--  <select id=""></select> -->
</div>
<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Update') }}
        </button>
        <a style="margin-left: 10px;" class="btn btn-primary" href="{{url('list_product')}}">Back</a>
    </div>
</div>
</div> 

</form>
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () 
    {
        $(document.body).on('change','.product_attr',pro_value);
        $(document.body).on('change','.new_product_attr',new_pro_value);
        //pro_value();
        //new_pro_value();
    });

    function create_Attribute() {
        $.get('/get_product_attr/', function(response){
            if(response.success)
            {

           // var new_attribute = $('#new_attribute').empty(); 
           var str = '<div>'  
           str += '<label style="margin-left:20px;"> Attribute </label>'
           str+='<select  style="margin-left:20px;" class="new_product_attr" name="Pro_attr[]">';
           $.each(response.attribute, function(i, attr){

               str +='<option value="'+attr.id+'">'+attr.Name+'</option>';

           });


           str +='</select>';  
           str +=  '<label style="margin-left:20px;" > Value </label>'
           str +='<select class="new_value" name="value[]" style="margin-left:20px;">';
           str +='<option value="">select</option>';
           str +='</select>';
           str +='<input class="btn btn-primary" type="button" value="Delete" style="margin-left: 10px;margin-bottom: 10px;" onclick="del_Attribute(this);"/>';
           str +='</div>';
           str += '<br>' ;

           $("#new_attribute").append(str);
           $('.new_product_attr:last').trigger('change');
       }
   }, 'json'); }

        function new_pro_value()
        {
            //console.log("hello");
         var $this = $(this); 
         $.get('/get_product_value/'+$this.val(), function(response){      
            if(response.success){
                var Attribute_value = $this.siblings('.new_value').empty();
                $.each(response.attr_values, function(i, attr_value){
                    $('<option/>', {
                        value:attr_value.id,
                        text:attr_value.Value
                    }).appendTo(Attribute_value);
                })
            }
        }, 'json');
     }


    function pro_value()
        {
            //console.log("hello");
         var $this = $(this); 
         $.get('/get_product_value/'+$this.val(), function(response){      
            if(response.success){
                var Attribute_value = $this.siblings('.attr_value').empty();
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