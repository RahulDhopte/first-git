
@extends('admin.layout')

@section('content')
<form method="POST" action="{{ url('update_attribute/'.$update['id']) }}" enctype="multipart/form-data">
		{{csrf_field()}}
			<div class="box">
					<h3 style="margin-left: 15px;margin-bottom: 25px;">Update Product Attribute</h3>	
						<div class="form-group row">
                            <label for="Name1" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
                        <input type="button" value="Create Element" style="margin-left: 20px;" onclick="createNewElement();"/>
                        <input type="button" value="Delete Element" style="margin-left: 10px;" onclick="deleteElement();"/>
                        </div>

                        <div id="newElementId"></div> 
                        
                         <?php

                               for($i=0;$i<count($update->product_attribute_value);$i++)

                               	echo '<input class="new1" style="margin-left: 20px;margin-top: 10px;" name="rahul[]" value="'.$update->product_attribute_value[$i]->Value.'" /><br>';

                         ?>
                         <button style="margin-bottom: 10px;margin-top: 10px;margin-left: 20px;" type="submit" class="btn btn-primary">
                                    {{ __('UPDATE') }}
                                </button>
                    </div>
                </form>
<script type="" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script type="text/JavaScript">
function createNewElement() {
// First create a DIV element.
var txtNewInputBox = document.createElement('div');

// Then add the content (a new input box) of the element.
txtNewInputBox.innerHTML = "<input style='margin-left: 20px;margin-top: 10px;' class='new1' name='rahul[]' type='text' id='newInputBox'>";

// Finally put it where it is supposed to appear.
document.getElementById("newElementId").appendChild(txtNewInputBox);
}
function deleteElement() {
	$('.new1:last').remove();
	}
</script>
@endsection