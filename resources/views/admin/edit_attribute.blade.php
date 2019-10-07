
@extends('admin.layout')

@section('content')
<h3>Update Product Attribute Form</h3>
<form id="attribute_validate" method="POST" action="{{ url('update_attribute/'.$update['id']) }}" enctype="multipart/form-data">
  {{csrf_field()}}
  <div class="box">
    <div class="box-header with-border">
       <h3 class="box-title" style="margin-left: 15px;margin-bottom: 25px;">Update Product Attribute</h3>
   </div>
   <div class="box-body">
      <div style="margin-left: 0px;" class="form-group row">
        <label for="Name1" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<span style="color:red;">*</span></label>

        <div class="col-md-6">
            <input style="margin-left: -210px;" id="Name" class="new" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{$update->Name}}" required autocomplete="firstname" autofocus>

            @error('Name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>



    <div id="dynamicCheck">
        <input type="button" class="btn btn-primary" value="Add Value" style="margin-left: 20px;" onclick="createNewElement();"/>
        <?php
        for($i=0;$i<count($update->product_attribute_value);$i++){
            echo sprintf('<input type="hidden" value="%s" name="og_value[]">' , $update->product_attribute_value[$i]->id);
        }?>

        <div id="newElementId"></div> 

        <?php

        for($i=0;$i<count($update->product_attribute_value);$i++)

            echo '<div><input class="new1" style="margin-left: 20px;margin-top: 10px;" name="rahul[]" value="'.$update->product_attribute_value[$i]->Value.'" /> <input type="hidden" value="'.$update->product_attribute_value[$i]->id.'" name="del_val[]"> <input class="btn btn-primary" type="button" value="Delete Value" style="margin-left: 10px"; onclick="deleteElement(this);"/></div><br>';

        ?>
    </div>
    <button style="margin-bottom: 10px;margin-top: 10px;margin-left: 20px;" type="submit" class="btn btn-primary">
        {{ __('UPDATE') }}
    </button>
    <a style="margin-left: 10px;" class="btn btn-primary" href="{{url('list_product_attribute')}}">Back</a>      
</div>
</div>
</form>
<!-- <script type="" src="https://code.jquery.com/jquery-3.4.1.js"></script> -->
<script type="text/JavaScript">
    function createNewElement() {
// First create a DIV element.
var txtNewInputBox = document.createElement('div');

// Then add the content (a new input box) of the element.
txtNewInputBox.innerHTML = "<div><input style='margin-left: 20px;margin-top: 10px;' class='new1' name='new_value[]' type='text' id='newInputBox'> <input class='btn btn-primary' type='button' value='Delete Value' style='margin-left: 10px'; onclick='deleteElement(this);'/></div>";

// Finally put it where it is supposed to appear.
document.getElementById("newElementId").appendChild(txtNewInputBox);
}
function deleteElement(elem) {
   $(elem).parent('div').remove();
}
</script>
@endsection