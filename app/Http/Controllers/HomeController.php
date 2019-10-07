<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\User_role;
use App\Configuration;
use App\Banner;
use App\Category;
use App\Product;
use App\Product_img;
use App\Product_category;
use App\Product_Attribute;
use App\Product_Attribute_assoc;
use App\Product_Attribute_value;
use App\Coupon;
use App\Coupons_used;
use App\frontendModel\Contact_Us;
use App\frontendModel\Order_Detail;
use App\frontendModel\User_Order;
use App\frontendModel\User_Address;
use App\Payment;
use App\Cms;
use App\Email;
use Config;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Mail\OrderStatusMail;
use App\Mail\ResponceMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


  public function dashboard(){
    $data = DB::select("SELECT SUM(Discount) as Discount,(SELECT COUNT( * ) FROM user_order) AS Total FROM user_order");
    $user = DB::select("SELECT COUNT( * ) as user FROM users ");
    $chat = Contact_Us::all();
    return view('admin/dashboard',compact('data','user','chat'));
  }


  public function list()
  {
    return view('admin/list_users');
  }
  public function user_data()
  {
    $Users = User::all()->toArray();
    return Datatables::of($Users)
    ->addIndexColumn()
    ->addColumn('action', function($row){

     $btn = '<a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/edit/".$row["id"]).'" class="edit btn btn-primary btn-sm">EDIT</a>
     <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete/user/'.$row['id']).'" >
     '.csrf_field().'
     <input  type="hidden" name="del" value="DELETE"/>
     <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
     </form>';

     return $btn;
   })
    ->rawColumns(['action'])
    ->make(true);
  }

  public function __construct()
  {
   $this->middleware('auth');
 }

 public function index() 
 {
   return view('home');
 }
 public function add_user_view() 
 {
  $role_name = Role::all();
  return view('admin/add_user',compact('role_name'));

}
public function add_user(Request $request)
{
  session_start();
  $user = new User([
    'username' => $request->get('username'),
    'first_name' => $request->get('firstname'),
    'last_name' => $request->get('lastname'),
    'email' => $request->get('email'),
    'password' => Hash::make($request['password']),
    'status' => $request->get('status')
  ]);
  $user->save();

  $role = new User_role([
    'role_id' => $request->get('role'),
    'user_id' => $user->id
  ]);
  $role->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Added');
  return redirect('user/list'); 
}
public function update(Request $request,$id)
{
 session_start();                
 $user = User::find($id);
 $user->username = $request->get('username');
 $user->first_name = $request->get('firstname');
 $user->last_name = $request->get('lastname');
 $user->email = $request->get('email');
 $user->status = $request->get('status');
 $user->save();

 $role = new User_role([
   'role_id' =>  $request->get('role'),
   'user_id' => $id
 ]);
 $role->save();
 $request->session()->flash('message.level', 'success');
 $request->session()->flash('message.content', 'Successfully Updated');
 return redirect('user/list');
}
public function delete(Request $request,$id)
{
  session_start();
  $user = User::find($id);
  $user->delete();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Deleted');
  return redirect('user/list');
}

public function edit($id){

  $update = User::find($id);
  $role_id = User_role::find($id);
  $role = Role::find($role_id['role_id']);
  $role_name = Role::all();

  return view('admin/update',compact('update','role_name','role'));
}
public function config()
{
  return view('admin/config');
}
public function add_config(Request $request)
{
  session_start();
  $data =new Configuration([
    'conf_key' => $request->get('Config_key'),
    'conf_value' => $request->get('Config_value'),
    'created_by' =>  Auth::user()->id,
    'status' => $request->get('gender')
  ]);
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Added');
  return redirect('config_list');
}
public function list_config()
{
 return view('admin/list_config');
}

public function config_data()
{
  $config = Configuration::all()->toArray();
  
  return Datatables::of($config)
  ->addIndexColumn()
  ->addColumn('action', function($row){
   $btn = '<div><a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/edit_config/".$row["id"]).'" class="edit btn btn-primary btn-sm">Edit</a>
   <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete_config/'.$row['id']).'" >
   '.csrf_field().'
   <input  type="hidden" name="del" value="DELETE"/>
   <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
   </form></div>';

   return $btn;
 })
  ->rawColumns(['action'])
  ->make(true);
}
public function delete_config(Request $request,$id)
{
 session_start(); 
 $data = Configuration::find($id);
 $data->delete();
 $request->session()->flash('message.level', 'success');
 $request->session()->flash('message.content', 'Successfully Deleted');
 return redirect('config_list');
}
public function edit_view($id)
{
  $update = Configuration::find($id);
  return view('admin/edit_config',compact('update'));
}
public function edit_config(Request $request,$id)
{
  session_start();
  $this->validate($request,[
    'Config_key' => 'required',
    'Config_value' => 'required'
  ]);
  $data = Configuration::find($id);
  $data->conf_key = $request->get('Config_key');
  $data->conf_value = $request->get('Config_value');
  $data->modify_by = Auth::user()->id;
  $data->status = $request->get('gender');
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Updated');
  return redirect('config_list');
}
public function banner()
{
 return view('admin/banner');
}
public function add_banner(Request $request)
{   
  session_start();        
  $file = $request->file('Image');
  $path=Config::get('constants.options.upload_path');
  $file->move($path,$file->getClientOriginalName());
  $data =new Banner([
   'Name' => $request->get('Name'),
   'Description' => $request->get('Description'),
   'Image' =>  $file->getClientOriginalName(),
   'created_by' =>  Auth::user()->id,
   'status' => $request->get('status')
 ]);
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Added');
  return redirect('list_banner'); 
}
public function list_banner()
{
 return view('admin/list_banner',compact('data','path'));
}

public function banner_data()
{
  $banner = Banner::all()->toArray();

  return Datatables::of($banner)
  ->addIndexColumn()

  ->addColumn('image', function ($artist) { 
    $url= asset('upload_img/'.$artist['Image']);
    $img =  '<img src="'.$url.'" border="0" width="80px" class="img-rounded" align="center" />';
    return $img;
  })
  ->addColumn('action', function($row){

   $btn = '<a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/edit_banner_view/".$row["id"]).'" class="edit btn btn-primary btn-sm">Edit</a>
   <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete_banner/'.$row['id']).'" >
   '.csrf_field().'
   <input  type="hidden" name="del" value="DELETE"/>
   <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
   </form>';

   return $btn;
 })
  ->rawColumns(['image','action'])
  ->make(true);
}

public function edit_banner_view($id)
{
  $update = Banner::find($id);

  $path=Config::get('constants.options.upload_path');
  return view('admin/edit_banner',compact('update','path'));
}
public function edit_banner(Request $request,$id)
{
  session_start();
  $this->validate($request,[
    'Name' => 'required'
  ]);
  $file = $request->file('Image');

  $path=Config::get('constants.options.upload_path');
  $data = Banner::find($id); 
  if (empty($file) ) {
    $data->Name = $request->get('Name');
    $data->Description = $request->get('Description');
    $data->Image = $request->get('og_img');
    $data->modify_by = Auth::user()->id;
    $data->status = $request->get('status');
    $data->save();
    $request->session()->flash('message.level', 'success');
    $request->session()->flash('message.content', 'Successfully Updated');
    return redirect('list_banner');
  }
  else {
    $file->move($path,$file->getClientOriginalName());
    $data->Name = $request->get('Name');
    $data->Description = $request->get('Description');
    $data->Image =$file->getClientOriginalName();
    $data->modify_by = Auth::user()->id;
    $data->status = $request->get('status');
    $data->save();
    return redirect('list_banner');
  }
}
public function delete_banner(Request $request,$id)
{
  session_start();
  $data = Banner::find($id);
  $data->delete();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Deleted');
  return redirect('list_banner');
}
public  function list_category()
{
  $data = DB::select("SELECT cat.id,cat.Name,cat.status,(SELECT Name FROM category where id = cat.parent_id) as parent FROM category as cat");
  return view('admin/list_category',compact('data'));
}

public function category_data()
{
  $data = DB::select("SELECT cat.id,cat.Name,cat.status,(SELECT Name FROM category where id = cat.parent_id) as parent FROM category as cat");
  
  return Datatables::of($data)
  ->addIndexColumn()
  ->addColumn('action', function($row){
   $btn = '<a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/edit_category/".$row->id).'" class="edit btn btn-primary btn-sm">Edit</a>
   <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete_category/'.$row->id).'" >
   '.csrf_field().'
   <input  type="hidden" name="del" value="DELETE"/>
   <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
   </form>';

   return $btn;
 })
  ->rawColumns(['action'])
  ->make(true);
}


public function category()
{
  $data = Category::where('status',1)->whereNull('parent_id')->get();
  return view('admin/add_category',compact('data'));
}
public function add_category(Request $request)
{
  session_start();
  $data =new Category([
   'Name' => $request->get('Name'),
   'parent_id' => $request->get('parent_id'),
   'created_by' =>  Auth::user()->id,
   'status' => $request->get('status')
 ]);
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Added');
  return redirect('list_category');
}
public function delete_category(Request $request,$id)
{
  session_start();
  $data = Category::find($id);
  $data->delete();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Deleted');
  return redirect('list_category');
}
public function edit_category($id)
{
 $data = Category::where('status',1)->whereNull('parent_id')->get();
 $update = Category::find($id);
 return view('admin/edit_category',compact('data','update'));
}
public function update_category(Request $request,$id)
{
  session_start();
  $data = Category::find($id);
  $data->Name = $request->get('Name');
  $data->parent_id = $request->get('parent_id');
  $data->modify_by = Auth::user()->id;
  $data->status = $request->get('status');
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Updated');
  return redirect('list_category');
}
public function list_product()
{

  return view('admin/list_product',compact('data'));
}  

public function product_data()
{
  $product = Product::all()->toArray();
  return Datatables::of($product)
  ->addIndexColumn()
  ->addColumn('action', function($row){
   $btn = '<a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/edit_product/".$row["id"]).'" class="edit btn btn-primary btn-sm">Edit</a>
   <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete_product/'.$row["id"]).'" >
   '.csrf_field().'
   <input  type="hidden" name="del" value="DELETE"/>
   <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
   </form>';

   return $btn;
 })
  ->rawColumns(['action'])
  ->make(true);
}

public function product()
{
  $category = Category::where('status','0')->get();
  $pro_attr = Product_Attribute::all();
  return view('admin/add_product',compact('category','pro_attr'));
} 
public function get_product_value($value_id){
  $attr_values = Product_Attribute_value::where("product_attribute_id", $value_id)->get();
  return response()->json(['success' => true, 'attr_values' => $attr_values]);
}
public function get_product_attr()
{
 $attribute = Product_Attribute::all();
 return response()->json(['success' => true, 'attribute' => $attribute]); 
}
public function add_product(Request $request)
{
  session_start();
  $pro_attr=$request->get('Pro_attr'); 
  $pro_value = $request->get('Rahul');
  $file = $request->file('Image');
  $path=Config::get('constants.options.upload_path');
  $file->move($path,$file->getClientOriginalName());

  $user = new Product([
    'Name' => $request->get('Name'),
    'sku' => $request->get('sku'),
    'short_description' => $request->get('short_description'),
    'long_description' => $request->get('long_description'),
    'price' => $request->get('price'),
    'special_price' => $request->get('special_price'),
    'status' => $request->get('status'),
    'quantity' => $request->get('quantity'),
    'meta_title' => $request->get('meta_title'),
    'meta_description' => $request->get('meta_description'),
    'meta_keywords' => $request->get('meta_keywords'),
    'meta_status' => $request->get('meta_status'),
    'created_by' =>  Auth::user()->id
  ]);
  $user->save();

  $pro_img = new Product_img([
    'Image' => $file->getClientOriginalName(),
    'product_id' => $user->id,
    'status' => $request->get('status'),
    'created_by' =>  Auth::user()->id
  ]);
  $pro_img->save();

  $role = new Product_category([
    'product_id' => $user->id,
    'category_id' => $request->get('Category')
  ]);
  $role->save();
  for ($i=0;$i<count($pro_attr);$i++) {
    $pro_relation = new Product_Attribute_assoc([
      'product_id' => $user->id,
      'product_attribute_id' => $pro_attr[$i],
      'product_attribute_value_id' => $pro_value[$i],
      'created_by' =>  Auth::user()->id   
    ]);
    $pro_relation->save();
  }
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Added');
  return redirect('list_product'); 
}
public function edit_product($id)
{         
  $value = Product::with('get_values')->find($id);
  $count = $value['get_values'];
  $cat_id = Product_category::where('product_id',$id)->get();
  $cat = Category::find($cat_id[0]->category_id);
  $category = Category::whereNotNull('parent_id')->get();
  $pro_attr = Product_Attribute::all();
  $pro_attr_value = Product_Attribute_value::all();
  $product = Product_Attribute_assoc::where('product_id',$id)->get();
  $path=Config::get('constants.options.upload_path');
  $data = Product_img::where('product_id',$id)->get();
  $update = Product::find($id);
  return view('admin/edit_product',compact('value','category','pro_attr','product','update','data','path','count','cat'));
}
public function update_product(Request $request,$id)
{
  session_start();
  $og_data = Product_Attribute_assoc::where('product_id',$id)->delete();
  $attr = $request->get('Pro_attr');
  $value = $request->get('value');
  $file = $request->file('Image');
  $path=Config::get('constants.options.upload_path');
  $user = Product::find($id);
  if (empty($file) ) {
   $user->Name = $request->get('Name');
   $user->sku = $request->get('sku');
   $user->short_description = $request->get('short_description');
   $user->long_description = $request->get('long_description');
   $user->special_price = $request->get('special_price');
   $user->price = $request->get('price');
   $user->special_price = $request->get('special_price');
   $user->status = $request->get('status');
   $user->quantity = $request->get('quantity');
   $user->meta_title = $request->get('meta_title');
   $user->meta_description = $request->get('meta_description');
   $user->meta_keywords = $request->get('meta_keywords');
   $user->meta_status = $request->get('meta_status');
   $user->modify_by = Auth::user()->id;
   $user->save();

   $data = Product_img::where('product_id',$id)->first();
   $data->Image = $request->get('og_img');
   $data->product_id = $id;
   $data->status = $request->get('status');
   $data->modify_by = Auth::user()->id;
   $data->save();

   $role = new Product_category([
     'product_id' =>  $id,
     'category_id' => $request->get('Category')
   ]);
   $role->save();

   for ($i=0; $i < count($attr); $i++) { 
    $relation = new Product_Attribute_assoc([
      'product_id' => $id,
      'product_attribute_id' => $attr[$i],
      'product_attribute_value_id' => $value[$i]
    ]);
    $relation->save();
  }
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Updated');

  return redirect('list_product');
}
else{
  $file->move($path,$file->getClientOriginalName());
  $user->Name = $request->get('Name');
  $user->sku = $request->get('sku');
  $user->short_description = $request->get('short_description');
  $user->long_description = $request->get('long_description');
  $user->special_price = $request->get('special_price');
  $user->price = $request->get('price');
  $user->special_price = $request->get('special_price');
  $user->status = $request->get('status');
  $user->quantity = $request->get('quantity');
  $user->meta_title = $request->get('meta_title');
  $user->meta_description = $request->get('meta_description');
  $user->meta_keywords = $request->get('meta_keywords');
  $user->meta_status = $request->get('meta_status');
  $user->modify_by = Auth::user()->id;
  $user->save();

  $data = Product_img::where('product_id',$id)->first();
  $data->Image = $file->getClientOriginalName();
  $data->product_id = $id;
  $data->status = $request->get('status');
  $data->modify_by = Auth::user()->id;
  $data->save();

  $role = new Product_category([
   'product_id' =>  $id,
   'category_id' => $request->get('Category')
 ]);
  $role->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Updated');
  return redirect('list_product');
}
}
public function delete_product(Request $request,$id)
{
  session_start();
  $data = Product::find($id);
  $img=Product_img::where('product_id',$id)->delete();
  $attribute_assoc= Product_Attribute_assoc::where('product_id',$id)->delete();
  $data->delete();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Deleted');
  return redirect('list_product');
}
public function product_atrribute()
{

  return view("admin/product_attribute");
}
public function add_product_attribute(Request $request)
{
 session_start();
 $data = new Product_Attribute([
  'Name' => $request->get('Name'),
  'created_by' =>  Auth::user()->id
]);
 $data->save();

 foreach ($request->get('value') as $key) {            
   $value = new Product_Attribute_value([
    'product_attribute_id' => $data->id,
    'Value' => $key, 
    'created_by' =>  Auth::user()->id          
  ]);
   $value->save();

 }
 $request->session()->flash('message.level', 'success');
 $request->session()->flash('message.content', 'Successfully Added');
 return redirect('list_product_attribute');
}
public function list_product_attribute()
{
  $data = DB::select("SELECT proAttr.Name as proAttrName, value.value as pro_value, proAttr.id as pro_attr_id,value.product_attribute_id as attribue_val FROM   product_attributes proAttr inner join product_attributes_values value on 
    proAttr.id=value.product_attribute_id");
  return view('admin/list_pro_attributes',compact('data'));
}

public function product_attribute_data()
{
  $product = Product_Attribute::with('product_attribute_value')->get()->toArray();
  
  return Datatables::of($product)
  ->addIndexColumn()
  ->addColumn('attribute_values', function($row){
    $pro_values = "";
    if(count($row['product_attribute_value']) > 0){
      foreach ($row['product_attribute_value'] as $key => $value) {
        if(count($row['product_attribute_value']) - 1 == $key)
        {
          $pro_values .= $value['Value'];
        }
        else{
          $pro_values .= $value['Value']."<br>";
        }
      }

      return $pro_values;
    }
    else{
      return "-";
    }
  })
  ->addColumn('action', function($row){
   $btn = '<a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/edit_attribute/".$row["id"]).'" class="edit btn btn-primary btn-sm">Edit</a>
   <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete_attribute/'.$row["id"]).'" >
   '.csrf_field().'
   <input  type="hidden" name="del" value="DELETE"/>
   <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
   </form>';

   return $btn;
 })
  ->rawColumns(['action', 'attribute_values'])
  ->make(true);
}


public function delete_attribute(Request $request,$id)
{
  $attribute = Product_Attribute::where('id',$id)->delete();
  $attribue_val = Product_Attribute_value::where('product_attribute_id',$id)->delete();
  $attribute_assoc= Product_Attribute_assoc::where('product_attribute_id',$id)->delete();
  return redirect('list_product_attribute');
}
public function edit_attribute($id)
{

  $update = Product_Attribute::with('product_attribute_value')->find($id);
  return view('admin/edit_attribute',compact('update'));
}
public function update_attribute(Request $request,$id)
{   
  session_start();
  $update_value = $request->get('rahul');
  $old_value = $request->get('og_value');
  $del_value = $request->get('del_val');
  $del = array_diff($old_value, $del_value);
  foreach ($del as $key ) {
    $attribue_val = Product_Attribute_value::where('id',$key)->delete();
    $relation = Product_Attribute_assoc::where('product_attribute_value_id',$key)->delete();
  }
  $new_value = $request->get('new_value');
  $attribute = Product_Attribute::find($id);
  $attribute->Name = $request->get('Name');
  $attribute->modify_by = Auth::user()->id;
  $attribute->save();
  if (!empty($new_value)) {

    foreach ($new_value as $key ) {
     $attr_value = new Product_Attribute_value([
      'product_attribute_id' => $id,
      'Value' => $key,
      'created_by' =>  Auth::user()->id
    ]);
     $attr_value->save();
   }

 }

 for ($i=0; $i <count($update_value); $i++) { 
   $attr_value1 = Product_Attribute_value::where('id',$del_value[$i])->first();

   $attr_value1->Value =  $update_value[$i];
   $attr_value1->modify_by = Auth::user()->id;
   $attr_value1->save();
 }
 $request->session()->flash('message.level', 'success');
 $request->session()->flash('message.content', 'Successfully Updated');
 return redirect('list_product_attribute');
}
public function coupon()
{

  return view('admin/coupon');
}
public function add_coupon(Request $request)
{
  session_start();
  $code = $request->get('code');
  $percent = $request->get('percent_off');
  $use= $request->get('NO_of_use');
  $created_by=Auth::user()->id;
  DB::select("call newCoupon('$code','$percent','$use','$created_by')");
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Added');
  return redirect('list_coupon');
}
public function list_coupon()
{
  return view('admin/list_coupon');
}

public function coupon_data()
{
  $coupon = DB::select('call list_coupons()');
  
  return Datatables::of($coupon)
  ->addIndexColumn()
  ->addColumn('action', function($row){
   $btn = '<a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/edit_coupon/".$row->id).'" class="edit btn btn-primary btn-sm">Edit</a>
   <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete_coupon/'.$row->id).'" >
   '.csrf_field().'
   <input  type="hidden" name="del" value="DELETE"/>
   <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
   </form>';

   return $btn;
 })
  ->rawColumns(['action'])
  ->make(true);
}

public function delete_coupon(Request $request,$id)
{
  session_start();
  $delete_coupon = Coupon::find($id);
  $delete_coupon->delete();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Deleted'); 
  return redirect('list_coupon');
}
public function edit_coupon($id)
{
  $coupon_data =DB::select("call edit_coupon($id)");
  return view('admin/edit_coupon',compact('coupon_data'));
}
public function update_coupon(Request $request, $id)
{
  session_start();
  $coupon = Coupon::find($id);
  $coupon->code = $request->get('code');
  $coupon->percent_off = $request->get('percent_off');
  $coupon->NO_of_use = $request->get('NO_of_use');
  $coupon->modify_by = Auth::user()->id;
  $coupon->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Updated');
  return redirect('list_coupon');
}

public function list_review()
{
  $data = Contact_Us::all();
  return view('admin/list_review',compact('data'));
}

public function review_data()
{
  $review = Contact_Us::all()->toArray();
  return Datatables::of($review)
  ->addIndexColumn()
  ->addColumn('action', function($row){
   $btn = '<a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/send_responce/".$row["id"]).'" class="edit btn btn-primary btn-sm">Edit</a>
   <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete_feedback/'.$row["id"]).'" >
   '.csrf_field().'
   <input  type="hidden" name="del" value="DELETE"/>
   <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
   </form>';

   return $btn;
 })
  ->rawColumns(['action'])
  ->make(true);
}

public function send_responce($id)
{
  $data = Contact_Us::find($id);
  return view('admin/admin_response',compact('data'));
}

public function delete_feedback(Request $request,$id)
{
  session_start();
  $data = Contact_Us::find($id);
  $data->delete();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Deleted');
  return redirect('list_review');
}

public function responce_mail(Request $request)
{
  $data = Contact_Us::find($request->get('response_id'));
  $data->note_admin =  $request->get('response');
  $data->save();
  session_start();
  $responce_data = array(
    'name' => $request->get('email'),
    'message' => $request->get('message'),
    'response' => $request->get('response')
  );
  Mail::to($request->get('email'))->send(new ResponceMail($responce_data));
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Response Mailed');
  return redirect('list_review');
}

public function coupon_report()
{
  $data =DB::select("SELECT coupons.code,COUNT(coupons_used.coupon_id) as cout, coupons.NO_of_use FROM coupons LEFT JOIN coupons_used on coupons_used.coupon_id = coupons.id GROUP BY coupons.id");
  return view('admin/coupon_used',compact('data'));

}

public function coup_data()
{
  $coup = DB::select("SELECT coupons.code,COUNT(coupons_used.coupon_id) as cout, coupons.NO_of_use FROM coupons LEFT JOIN coupons_used on coupons_used.coupon_id = coupons.id GROUP BY coupons.id");
  return Datatables::of($coup)
  ->addColumn('used', function($row){
   return $row->NO_of_use - $row->cout;
 })
  ->rawColumns(['action'])
  ->make(true);
}

public function customer()
{
  $Users =User::all();
  return view('admin/customer',compact('Users'));
}

public function customer_data()
{
  $customer = User::all()->toArray();
  
  return Datatables::of($customer)
  ->make(true);
}

public function sales()
{
  return view('admin/sales',compact('data'));
}

public function sales_data()
{
  $sales = DB::select("SELECT product.name,COUNT(order_details.product_id) as cout, product.quantity, product.price FROM product LEFT JOIN order_details on order_details.product_id = product.id GROUP BY product.id");
  
  return Datatables::of($sales)
  ->addColumn('total', function($row){
   return $row->price * $row->cout;
 })
  ->rawColumns(['action'])
  ->make(true);
}

public function order_table()
{
  $data  =DB::select("SELECT user_order.id,users.username,user_order.grand_total,user_order.Status FROM user_order LEFT JOIN users on users.id=user_order.user_id");
  return view('admin/order_table',compact('data'));
}

public function order_data()
{
  $order  =DB::select("SELECT user_order.id,users.username,user_order.grand_total,user_order.Status FROM user_order LEFT JOIN users on users.id=user_order.user_id");
  return Datatables::of($order)
  ->addIndexColumn()
  ->addColumn('action', function($row){
   $btn = '<a href="'.url("/show_order/".$row->id).'" class="edit btn btn-primary btn-sm">Details</a>
   <a href="'.url("/edit_order/".$row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';

   return $btn;
 })
  ->rawColumns(['action'])
  ->make(true);
}

public function edit_order($id)
{
  $data = User_Order ::find($id);
  $order = [];
  $order[0] = "Order Placed";
  $order[1] = "Processing";
  $order[2] = "Shipped";

  return view('admin/update_order',compact('data','order'));
}

public function update_order(Request $request, $id)
{
  session_start();
  $data = User_Order::find($id);
  $user = User::find($data['user_id']);

  if ($data['Status'] != $request->get('status')) {
   $data->Status = $request->get('status');
   $data->save();
   $order_data = array(
    'id' => $id,
    'status' => $request->get('status')
  );
   Mail::to($user['email'])->send(new OrderStatusMail($order_data));
 }
 $request->session()->flash('message.level', 'success');
 $request->session()->flash('message.content', 'Successfully Updated');
 return redirect('order_table');
}

public function show_order($id)
{
  $bill_addr = User_Order::where('id',$id)->get('billing_address');
  $ship_addr = User_Order::where('id',$id)->get('shipping_address');

  $data  =DB::select("SELECT user_order.id,users.first_name,user_order.grand_total,users.last_name,users.id as user_id,users.email,user_order.Status,product.Name,product.price,product_images.Image,order_details.quantity,order_details.amount,user_order.billing_address,payment_gateway.name FROM user_order inner JOIN users on users.id=user_order.user_id  inner join order_details on order_details.order_id = $id  inner JOIN payment_gateway on payment_gateway.id = user_order.payment_gateway_id inner JOIN product on product.id=order_details.product_id inner join product_images on product_images.product_id = order_details.product_id and product_images.is_front_img = 1 where user_order.id=$id ");
  return view('admin/od_details',compact('data','bill_addr','ship_addr'));
}

public function show_payment()
{
  return view('admin/add_payment');
}

public function add_payment(Request $request)
{
  session_start();
  $id =  Auth::user()->id;
  $data = new Payment([
    'name' => $request->get('name'),
    'created_by' => $id
  ]);
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Added');
  return redirect('list_payment');
}

public function list_payment()
{
  $data = Payment::all();
  return view('admin/list_payment',compact('data'));
}

public function payment_data()
{
  $payment = Payment::all()->toArray();
  return Datatables::of($payment)
  ->addIndexColumn()
  ->addColumn('action', function($row){
   $btn = '<a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/edit_payment/".$row["id"]).'" class="edit btn btn-primary btn-sm">Edit</a>
   <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete_payment/'.$row["id"]).'" >
   '.csrf_field().'
   <input  type="hidden" name="del" value="DELETE"/>
   <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
   </form>';

   return $btn;
 })
  ->rawColumns(['action'])
  ->make(true);
}

public function edit_payment($id)
{
  $data = Payment::find($id);
  return view('admin/update_payment',compact('data'));
}

public function update_payment(Request $request ,$id)
{
  session_start();
  $data = Payment::find($id);
  $data->name = $request->get('name');
  $data->modify_by = Auth::user()->id;
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Updated');
  return redirect('list_payment');
}

public function delete_payment(Request $request,$id)
{
  session_start();
  $data = Payment::find($id);
  $data->delete();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Deleted');
  return redirect('list_payment');
}

public function show_cms()
{
  return view('admin/add_cms');
}

public function add_cms(Request $request)
{
  session_start();
  $data = new Cms([
    'title' =>$request->get('title'),
    'content' =>$request->get('content'),
    'meta_title' =>$request->get('meta_title'),
    'meta_description' =>$request->get('meta_description'),
    'meta_keyword' =>$request->get('meta_keyword'),
    'created_by' => Auth::user()->id
  ]);
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Added');
  return redirect('list_cms');
}

public function list_cms()
{
  return view('admin/list_cms',compact('data'));
}

public function cms_data()
{
  $cms = Cms::all()->toArray();
  
  return Datatables::of($cms)
  ->addIndexColumn()
  ->addColumn('action', function($row){
   $btn = '<a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/edit_cms/".$row["id"]).'" class="edit btn btn-primary btn-sm">Edit</a>
   <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete_cms/'.$row['id']).'" >
   '.csrf_field().'
   <input  type="hidden" name="del" value="DELETE"/>
   <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
   </form>';

   return $btn;
 })
  ->rawColumns(['action'])
  ->make(true);
}

public function edit_cms($id)
{
  $data = Cms::find($id);
  return view('admin/update_cms',compact('data'));
}

public function update_cms(Request $request ,$id)
{
  session_start();
  $data = Cms::find($id);
  $data->title = $request->get('title');
  $data->content = $request->get('content');
  $data->meta_title = $request->get('meta_title');
  $data->meta_description = $request->get('meta_description');
  $data->meta_keyword = $request->get('meta_keyword');
  $data->modify_by = Auth::user()->id;
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Updated');
  return redirect('list_cms');
}

public function delete_cms(Request $request,$id)
{
  session_start();
  $data = Cms::find($id);
  $data->delete();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Deleted');
  return redirect('list_cms');
}

public function show_email()
{
  return view('admin/add_email');
}

public function add_email(Request $request)
{
  session_start();
  $data = new Email([
    'title' =>$request->get('title'),
    'subject' =>$request->get('subject'),
    'content' =>$request->get('content'),
    'created_by' => Auth::user()->id
  ]);
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Added');
  return redirect('list_email');
}

public function list_email()
{
  return view('admin/list_email',compact('data'));
}

public function email_data()
{
  $email = Email::all()->toArray();
  return Datatables::of($email)
  ->addIndexColumn()
  ->addColumn('action', function($row){
   $btn = '<a style="margin-left: 4px;margin-bottom: 5px;padding: 7px 23px;" href="'.url("/edit_email/".$row["id"]).'" class="edit btn btn-primary btn-sm">Edit</a>
   <form onsubmit="return ConfirmDelete()" method="post" action="'.url('delete_email/'.$row["id"]).'" >
   '.csrf_field().'
   <input  type="hidden" name="del" value="DELETE"/>
   <button style="margin-left:5px;" type="submit" class="btn btn-primary">DELETE</button>
   </form>';

   return $btn;
 })
  ->rawColumns(['action'])
  ->make(true);
}

public function edit_email($id)
{
  $data = Email::find($id);
  return view('admin/edit_email',compact('data'));
}

public function update_email(Request $request ,$id)
{
  session_start();
  $data = Email::find($id);
  $data->title = $request->get('title');
  $data->subject = $request->get('subject');
  $data->content = $request->get('content');
  $data->modify_by = Auth::user()->id;
  $data->save();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Updated');
  return redirect('list_email');
}

public function delete_email(Request $request,$id)
{
  session_start();
  $data = Email::find($id);
  $data->delete();
  $request->session()->flash('message.level', 'success');
  $request->session()->flash('message.content', 'Successfully Deleted');
  return redirect('list_email');
}


}




















































/* $this->validate($request,[
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','unique:users,email,'.$user->id]
                 ]);*/