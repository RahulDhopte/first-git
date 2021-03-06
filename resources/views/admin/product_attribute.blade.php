
@extends('admin.layout')

@section('content')
<h3>Product Attribute Form</h3>
<style type="text/css">
    .row{
        margin-left: 0px;
    }
</style>
<form id="attribute_validate" method="POST" action="{{ url('add_product_attribute') }}" enctype="multipart/form-data">
		{{csrf_field()}}
			<div class="box">
					<h3 style="margin-left: 15px;margin-bottom: 25px;">Add Product Attribute</h3>	
						<div class="form-group row">
                            <label for="Name1" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input style="margin-left: -210px;" id="Name" class="new" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="" required autocomplete="firstname" autofocus>

                                @error('Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}<span style="color:red;">*</span></label>

                            <div class="col-md-6">
                                <input style="margin-left: -210px;" id="value" class="new" type="text" class="form-control @error('value') is-invalid @enderror" name="value[]" value="" required autocomplete="firstname" autofocus>

                                @error('value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div id="dynamicCheck">
                        <input type="button" class="btn btn-primary" value="Add Value" style="margin-left: 20px;" onclick="createNewElement();"/>
                       
                        </div>

                        <div id="newElementId"></div> 
                         <button style="margin-bottom: 10px;margin-top: 10px;margin-left: 20px;" type="submit" class="btn btn-primary">
                                    {{ __('ADD') }}
                                </button>
                                <a style="margin-left: 10px;" class="btn btn-primary" href="{{url('list_product_attribute')}}">Back</a>
                    </div>
                </form>

<script type="text/JavaScript">
function createNewElement() {
var txtNewInputBox = document.createElement('div');
txtNewInputBox.innerHTML = "<div><input style='margin-left: 20px;margin-top: 10px;' class='new1' name='value[]' type='text' id='newInputBox'>  <input class='btn btn-primary' type='button' value='Delete Value' style='margin-left: 10px'; onclick='deleteElement(this);'/></div>";
document.getElementById("newElementId").appendChild(txtNewInputBox);
}
function deleteElement(elem) {
	 $(elem).parent('div').remove();
	}
</script>
@endsection