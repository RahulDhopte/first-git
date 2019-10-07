<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Support\Facades\Auth;
use App\frontendModel\User_Address;
use App\frontendModel\Order_Detail;
use App\frontendModel\User_Order;
use App\frontendModel\Wishlist;
use App\User;
use App\Product_img;
use App\Product;
use App\Category;
use App\Coupon;
use App\Payment;
use App\Coupons_used;
use App\Product_category;
use App\Cms;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use App\Mail\AdminOrderMail;
use App\Mail\ForgotPassword;
use App\frontendModel\Contact_Us;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;
use App\Helper\Frontend;


class FrontController extends Controller
{
	public function index()
	{
		$user_id = Auth::user()->id;
		$data = Frontend::sidebar();
		$product =DB::select("SELECT pro.quantity as quantity,pro.price as price, pro.id as id,pro.Name as Name,img.Image as img , whislist.id as wishid FROM product as pro inner join product_images as img on img.product_id=pro.id and img.is_front_img = 1 left join whislist on whislist.product_id = pro.id and whislist.user_id = $user_id ORDER BY RAND() LIMIT 6 ");
		$price = DB::select("SELECT MAX(price) AS max FROM product");
		$cat = Category::whereNull('parent_id')->get();
		return view('frontend_view/index',compact('data','cat','product','price'));
	}

	public function checkout()
	{
		$id = Auth::user()->id;

		$data = User_Address::where('user_id',$id)->get();
		$payment = Payment::all();
		return view('frontend_view/checkout',compact('data','payment'));
	}

	public function discount_checkout(Request $request)
	{
		$id = Auth::user()->id;
		$discount = $request->get('hiden_discount');
		$cup_id = $request->get('cup_id');
		$payment = Payment::all();
		$data = User_Address::where('user_id',$id)->get();
		return view('frontend_view/checkout',compact('data','discount','cup_id','payment'));
	}

	public function cart()
	{
		return view('frontend_view/cart');
	}

	public function frontLogin()
	{
		return view('frontend_view/login');
	}	

	public function shop()
	{
		$data = $data = Frontend::sidebar();
		$product =DB::select("SELECT pro.price as price, pro.id as id,pro.Name as Name,img.Image as img FROM product as pro inner join product_images as img on img.product_id=pro.id and img.is_front_img = 1 ORDER BY RAND() LIMIT 6 ");
		$price = DB::select("SELECT MAX(price) AS max FROM product");

		$cat = Category::whereNull('parent_id')->get();
		return view('frontend_view/shop',compact('data','cat','product','price'));
	}

	public function blog()
	{
		return view('frontend_view/blog');
	}

	public function blogsingle()
	{
		return view('frontend_view/blog-single');
	}

	public function contactUs()
	{
		return view('frontend_view/contact-us');
	}

	public function address()
	{
		return view('frontend_view/Address');
	}

	public function add_user_address(Request $request)
	{

		$address = new User_Address([
			'user_id' => Auth::user()->id,
			'address_1' => $request->get('address1'),
			'address_2' => $request->get('address2'),
			'city' => $request->get('city'),
			'state' => $request->get('state'),
			'country' => $request->get('country'),
			'zipcode' => $request->get('zipcode')
		]);
		$address->save();
		return redirect('list_address');
	}	

	public function list_address()
	{	
		$id = Auth::user()->id;
		$address = User_Address::where('user_id',$id)->get();
		return view ('frontend_view/list_address',compact('address'));
	}

	public function edit_address($id)
	{
		$update = User_Address::find($id);
		return view('frontend_view/update_address',compact('update'));
	}

	public function update_address(Request $request ,$id)
	{
		$update = User_Address::find($id);
		$update->address_1 = $request->get('address1');
		$update->address_2 =  $request->get('address2');
		$update->city = $request->get('city');
		$update->state = $request->get('state');
		$update->country = $request->get('country');
		$update->zipcode = $request->get('zipcode');
		$update->save();
		return redirect('list_address');
	}

	public function delete_address($id)
	{
		$delete = User_Address::where('id',$id)->delete();
		return redirect('list_address');
	}

	public function profile()
	{
		$id =  Auth::user()->id;
		$user = User::find($id);
		return view ('frontend_view/profile',compact('user'));
	}

	public function edit_profile($id)
	{
		$update = User::find($id);
		return view('frontend_view/update_profile',compact('update'));
	}


	public function update_profile(Request $request , $id)
	{
		$data = User::find($id);
		$data->username = $request->get('username');
		$data->first_name = $request->get('firstname');
		$data->last_name = $request->get('lastname');
		$data->email = $request->get('email');
		$data->save();
		return redirect('profile');
	}

	public function password()
	{
		$id = Auth::user()->id;
		return view('frontend_view/password',compact('id'));
	}

	public function update_password(Request $request,$id)
	{
		$data = User::find($id);
		$data->password = Hash::make($request['password']);
		$data->save();
		session_start();
		$request->session()->flash('message.level', 'success');
		$request->session()->flash('message.content', 'Password Updated');
		return redirect('profile');
	}

	public function add_review(Request $request)
	{
		$data = new Contact_Us([
			'name' => $request->get('name'),
			'email' => $request->get('email'),
			'contact_no' => $request->get('contact_no'),
			'message' => $request->get('message'),
			'created_by' => Auth::user()->id
		]);
		$data->save();
		return redirect('list_querry');
	}

	public function list_querry()
	{
		$id = Auth::user()->id;
		$data = Contact_Us::where('created_by',$id)->get();
		return view('frontend_view/list_querry',compact('data'));
	}

	public function delete_querry($id)
	{
		$delete = User_Address::where('id',$id)->delete();
		return redirect('list_querry');
	}

	public function track_order()
	{
		$id = Auth::user()->id;
		$data = User_Order::where('user_id',$id)->get();
		return view('frontend_view/track_order',compact('data'));
	}

	public function add_wishlist($id)
	{   
		try{
			$data = new Wishlist([
				'user_id' => Auth::user()->id,
				'product_id' => $id
			]);
			$data->save();
			$message = 'Successfully Added';
			return response()->json(['success' => true,'message' => $message]);
		}
		catch (Exception $e) {
			$error = $e;
			return response()->json(['success' => true,'message' => $error]);
		}
	}


	public function list_whislist()
	{
		$id = Auth::user()->id;
		$data=DB::select("SELECT whislist.product_id as proid ,whislist.id as id ,pro.Name as proName, pro.short_description as pro_description, pro.price as price,img.Image as img FROM product as pro  inner join whislist on whislist.product_id=pro.id and whislist.user_id = $id inner join product_images img on img.product_id=whislist.product_id and img.is_front_img = 1");
		return view('frontend_view/wishlist',compact('data'));
	}

	public function remove_wish($id)
	{
		$delete = Wishlist::where('id',$id)->delete();
		return redirect('list_whislist');
	}

	public function chk_email()
	{
		return view('frontend_view/chk_email');
	}

	public function order_status(Request $request)
	{
		if ($request->get('email')==Auth::user()->email) {
			$id = $request->get('od_id');

			$data = DB::select("SELECT user_order.Discount as total, user_order.Status as Status,user_order.id as id,user_order.billing_address as add1,user_order.shipping_address as add2 FROM user_order WHERE user_order.id = $id");
			return view('frontend_view/order_status',compact('data'));
		}

		else{
			return redirect('chk_email');
		}	

	}

	public function product_detail($id)
	{
		$product_detail=Product::find($id);
		$detail_img = Product_img::where('product_id',$id)->get(); 
		$data = $data = Frontend::sidebar();
		$cat = Category::whereNull('parent_id')->get();
		return view('frontend_view/product_detail',compact('product_detail','detail_img','data','cat'));
	}

	public function product($id)
	{

		$data = Frontend::sidebar();
		$user_id = Auth::user()->id;
		$category_id = $id;
		$price = DB::select("SELECT MAX(price) AS max FROM product");
		$cat = Category::whereNull('parent_id')->get();
		$cat_id=Product_category::where('category_id',$id)->get();
		foreach ($cat_id as $key ) {
			$proid = $key['product_id'];	
			$product[] = DB::select("SELECT  whislist.id as wishid, pro.price as price, pro.id as id,pro.Name as Name,img.Image as img FROM product as pro inner join product_images as img on img.product_id=pro.id  left join whislist on whislist.product_id = pro.id and whislist.user_id = $user_id where pro.id = $proid ");
		}
		return view('frontend_view/product',compact('data','cat','product','price','category_id'));
	}

	public function add_cart($id)
	{
		$product = DB::select("SELECT pro.price as price, pro.id as pro_id,pro.Name as Name,img.Image as img FROM product as pro inner join product_images as img on img.product_id=pro.id where pro.id = $id ");
		try {
			Cart::add($product[0]->pro_id, $product[0]->Name,1,$product[0]->price, ['img' => $product[0]->img]);
			$message = 'Successfully Added';
			return response()->json(['success' => true,'message' => $message]);
		} 
		catch (Exception $e) {
			$error = $e;
			return response()->json(['success' => true,'message' => $error]);
		}
	}

	public function remove_item($id)
	{
		Cart::remove($id);
		return redirect('cart');
	}

	public function remove_cartitem($id)
	{
		Cart::remove($id);
		return response()->json(['success' => true]);
	}

	public function update_cart($id,$qty,$pro)
	{
		$prod = Product::find($pro);
		$chk_qty =$prod->quantity;
		if ($qty < $chk_qty) {
			Cart::update($id,$qty);
			$product=Cart::get($id);
			$pro = $product->total;
			$total = Cart::total();
			$subtotal = Cart::subtotal();
			$count = Cart::count();
			$tax = Cart::tax();

			return response()->json(['success' => true,'pro' => $pro,'total' => $total,'subtotal' => $subtotal,'count' => $count,'tax' => $tax]);
		}
		else{
			$error ='Quantity should be less then ' . $chk_qty.' ';
			return response()->json(['success' => false,'message' => $error]);	
		}

	}

	public function qty_cart($id,$qty)
	{
		$product = DB::select("SELECT pro.quantity as quantity,pro.price as price, pro.id as pro_id,pro.Name as Name,img.Image as img FROM product as pro inner join product_images as img on img.product_id=pro.id where pro.id = $id ");
		$chk_qty=$product[0]->quantity;
		if ($qty < $chk_qty) {
			try{
				Cart::add($product[0]->pro_id, $product[0]->Name,$qty,$product[0]->price, ['img' => $product[0]->img]);
				$message = 'Successfully Added';
				return response()->json(['success' => true,'message' => $message]);
			}
			catch (Exception $e) {
				$error = $e;
				return response()->json(['success' => true,'message' => $error]);
			}
		}
		else 
		{
			$error ='Quantity should be less then ' . $chk_qty.' ';
			return response()->json(['success' => true,'message' => $error]);
		}
	}

	public function add_address(Request $request)
	{
		try{
			$address = new User_Address([
				'user_id' => Auth::user()->id,
				'address_1' => $request->post('address1'),
				'address_2' => $request->post('address2'),
				'city' => $request->post('city'),
				'state' => $request->post('state'),
				'country' => $request->post('country'),
				'zipcode' => $request->post('zipcode')
			]);
			$address->save();
			$addr_id = $address->id;
			$addr = $address->address_1.' '.$address->address_2;
			return response()->json(['success' => true,'addr' => $addr,'addr_id' => $addr_id]
		);
		}
		catch(Exception $e) {
			$error = $e;
			return response()->json(['success' => true,'message' => $error]);
		}
	}

	public function final_chk(Request $request)
	{
		$bill_id = $request->get('bill_addr');
		$ship_id = $request->get('ship_addr');
		$bill_addr = User_Address::find($bill_id);

		$ship_addr = User_Address::find($ship_id);
		$discount = $request->get('hiden_discount');
		$cup_id = $request->get('cup_id');
		$Payment = Payment::find($request->get('payment'));
		$Pay = $Payment['name'];
		$status = 'Order placed';
		if ( $request->get('payment') == 1) {
			if (!empty($request->get('hiden_discount'))) {
				$order = new User_Order([
					'user_id' => Auth::user()->id,
					'billing_address' =>$bill_addr['address_1'],
					'shipping_address' => $ship_addr['address_1'],
					'payment_gateway_id' => $request->get('payment'),
					'Status' => 'Order Placed',
					'grand_total' => Cart::total(),
					'shipping_charges' => 50,
					'Discount' => $request->get('hiden_discount')
				]);
				$order->save();

				$coupon_use = new Coupons_used([
					'user_id' => Auth::user()->id,
					'order_id' => $order->id,
					'coupon_id' => $request->get('cup_id')  
				]);
				$coupon_use->save();
				$order_data = array(
					'id' => $order->id,
					'name' => Auth::user()->username,
					'method' =>"Cash On Delivery",
					'total' => $request->get('hiden_discount'),
					'status' => 'Order Placed'
				);
				Mail::to(Auth::user()->email)->send(new OrderMail($order_data));
				Mail::to('rahul.dhopte@neosofttech.com')->send(new AdminOrderMail($order_data));
			}
			else{
				$order = new User_Order([
					'user_id' => Auth::user()->id,
					'billing_address' =>$bill_addr['address_1'],
					'shipping_address' => $ship_addr['address_1'],
					'payment_gateway_id' => $request->get('payment'),
					'Status' => 'Order Placed',
					'grand_total' => Cart::total(),
					'shipping_charges' => 50,
					'Discount' => Cart::total()
				]);
				$order->save();
				$order_data = array(
					'id' => $order->id,
					'name' => Auth::user()->username,
					'method' =>"Cash On Delivery",
					'total' => Cart::total(),
					'status' => 'Order Placed'
				);
				Mail::to(Auth::user()->email)->send(new OrderMail($order_data));
				Mail::to('rahul.dhopte@neosofttech.com')->send(new AdminOrderMail($order_data));
			}
			foreach (Cart::content() as $key ) {
				$order_detail = new Order_Detail([
					'order_id' => $order->id,
					'product_id' => $key->id,
					'quantity' => $key->qty,
					'amount' => $key->total
				]); 
				$order_detail->save();

				$product = Product::find($key->id);
				$product->quantity = $product->quantity - $key->qty;
				$product->save();
			}

			Cart::destroy();
			return view('frontend_view/final_chk',compact('bill_addr','ship_addr','Pay'));
		}

		else{
			return view('frontend_view/paypal',compact('bill_id','ship_id','discount','cup_id'));
		}

	}

	public function coupon_chk(Request $request)
	{
		$data1=$request->post('cup');

		$data =  DB::select("SELECT * from coupons where code = '$data1' ");
		if (empty($data)) {
			$message = 'Invalid Coupon';
			return response()->json(['success' => true,'message' => $message]
		);
		}
		$cup_id = $data[0]->id;
		$cup_used = DB::select("SELECT COUNT(coupon_id) as count FROM coupons_used WHERE coupon_id = $cup_id");
		
		if ($data[0]->code ==  $request->post('cup') && $data[0]->NO_of_use > $cup_used[0]->count) {

			$discount = $data[0]->percent_off;				
			$num =Cart::total();
			$total = str_replace(',',"",$num);
			$id = $data[0]->id;
			$final = $total - ($total * $discount/100);
			$name = $request->post('cup');
			$message = 'Coupon added';
			return response()->json(['success' => true,'final' => $final
				,'name' => $name,'id' => $id,'message' => $message]
			);
		}

		else{
			$message = 'Coupon Was Not Applied';
			return response()->json(['success' => true,'message' => $message]
		);
		}
		
	}

	public function add_chimp(Request $request)
	{    
		function rudr_mailchimp_curl_connect( $url, $request_type, $api_key, $data = array() ) {
			if( $request_type == 'GET' )
				$url .= '?' . http_build_query($data);

			$mch = curl_init();
			$headers = array(
				'Content-Type: application/json',
				'Authorization: Basic '.base64_encode( 'user:'. $api_key )
			);
			curl_setopt($mch, CURLOPT_URL, $url );
			curl_setopt($mch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($mch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt($mch, CURLOPT_CUSTOMREQUEST, $request_type); 
			curl_setopt($mch, CURLOPT_TIMEOUT, 10);
			curl_setopt($mch, CURLOPT_SSL_VERIFYPEER, false); 

			if( $request_type != 'GET' ) 
			{
				curl_setopt($mch, CURLOPT_POST, true);
				curl_setopt($mch, CURLOPT_POSTFIELDS, json_encode($data) ); 
			}

			return curl_exec($mch);
		}
		$api_key = '56a70b5caf7478b0bf1bc3e6dc34c2c9-us3';
		$list_id = '83f03ee7ee';
		$dc = substr($api_key,strpos($api_key,'-')+1); 
		$url = 'https://'.$dc.'.api.mailchimp.com/3.0/lists/'.$list_id;
		$body = json_decode( rudr_mailchimp_curl_connect( $url, 'GET', $api_key ) );
		$member_count = $body->stats->member_count;
		$emails = array();

		for( $offset = 0; $offset < $member_count; $offset += 50 ) :
			
			$data = array(
				'offset' => $offset,
				'count'  => 50
			);
			$url = 'https://'.$dc.'.api.mailchimp.com/3.0/lists/'.$list_id.'/members';
			$body = json_decode( rudr_mailchimp_curl_connect( $url, 'GET', $api_key, $data ) );
			
			foreach ( $body->members as $member ) {
				$emails[] = $member->email_address;
			}
			
		endfor;
		if (!empty($request->post('mail'))) {
			if (!in_array($request->post('mail'), $emails)) {
				$data = $request->post('mail');
				$post = json_encode(array(
					"email_address"  => $data,
					"status" => "subscribed"
				)); 
				$url = "https://us3.api.mailchimp.com/3.0/lists/83f03ee7ee/members"; 

				$ch = curl_init();  

				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

				curl_setopt($ch, CURLOPT_URL, $url); 

				curl_setopt($ch, CURLOPT_POST, 1);

				curl_setopt($ch, CURLOPT_POSTFIELDS,
					$post);

				curl_setopt($ch, CURLOPT_USERPWD, "anystring:56a70b5caf7478b0bf1bc3e6dc34c2c9-us3");

				$result = curl_exec($ch); 
				$message = 'Subscried to Chimp Mail';
				return response()->json(['success' => true,'message' => $message]); 
			}
			else
			{
				$message = 'Already subscribed to Chimp Mail';
				return response()->json(['success' => true,'message' => $message]);
			}
		}

		

	}

	public function get_range(Request $request)
	{
		$range=$request->post('range');
		$price_range = explode (",", $range);
		$product =DB::select("SELECT pro.price as price, pro.id as id,pro.Name as Name,img.Image as img , whislist.id as wishid FROM product as pro inner join product_images as img on img.product_id=pro.id and img.is_front_img = 1 left join whislist on whislist.product_id = pro.id where pro.price BETWEEN $price_range[0] AND $price_range[1] ORDER BY RAND() LIMIT 6 ");
		return response()->json(['success' => true,'product' => $product, 'url' => url("product_detail") ]); 
	}

	public function get_cat_range(Request $request)
	{
		$id = $request->post('cat');
		$range=$request->post('range');
		$price_range = explode (",", $range);
		$cat_id= DB::select("SELECT product_id from product_categories where category_id = $id ");

		foreach ($cat_id as $key ) 
		{
			$proid[] = $key->product_id;
		}
		$string_version = implode(',', $proid);
		$product= DB::select("SELECT  whislist.id as wishid, pro.price as price, pro.id as id,pro.Name as Name,img.Image as img FROM product as pro inner join product_images as img on img.product_id=pro.id  left join whislist on whislist.product_id = pro.id  WHERE pro.id IN (".$string_version.") and img.is_front_img = 1  and pro.price BETWEEN $price_range[0] AND $price_range[1]");

		return response()->json(['success' => true,'product' => $product, 'url' => url("product_detail") ]); 
	}	

	public function paypal_chk(Request $request)
	{	

		$micro_date = round(microtime(true) * 1000);
		session_start(); 
		$bill_addr = User_Address::find($request->get('bill_id'));
		$ship_addr = User_Address::find($request->get('ship_id'));
		$_SESSION["ship_address"] = $ship_addr['address_1'];
		$_SESSION["bil_address"] = $bill_addr['address_1'];
		$_SESSION["discount"] = $request->get('hiden_discount');
		$_SESSION["cup_id"] = $request->get('cup_id');
		$provider = new ExpressCheckout;
		$data = [];
		$data['items'] = [];
		foreach(Cart::content() as $rowId=>$item){
			$item=[
				'name' => $item->name,
				'price' => $item->price,
				'qty' => $item->qty
			];
			//
			array_push($data['items'],$item);

		}
		$data['invoice_id'] =  "PAYPALDEMOAPP_V55_".$micro_date;
		$data['invoice_description'] = "Order #55 Invoice";
		$data['return_url'] = url('return_url');
		$data['cancel_url'] =  url('cancel_url');

		$data['total'] =Cart::subtotal();

		if (!empty($request->get('hiden_discount'))) 
		{
			$data['shipping_discount']= Cart::subtotal() - $request->get('hiden_discount') ;
		}
		else
		{	

			$data['shipping_discount'] = 0;
		}
		$response = $provider->setExpressCheckout($data);

		return redirect($response['paypal_link']);
	}

	public function return_url(Request $request)
	{
		
		session_start();
		$provider = new ExpressCheckout;
		$data = $provider->getExpressCheckoutDetails( $request->get('token'));
		$r = $provider->createBillingAgreement($request->get('token'));
		$bill_addr = $_SESSION["bil_address"];
		$ship_addr = $_SESSION["ship_address"];
		$Pay = 'PayPal';
		$micro_date = round(microtime(true) * 1000);
		$data = [];
		$data['items'] = [];
		foreach (Cart::content() as $key ) 
		{
			$data['items'][] = [
				'name'=>$key->name,
				'price'=> $key->price,
				'qty'=>  $key->qty
			];
		}
		$data['invoice_id'] =  "PAYPALDEMOAPP_V55_".$micro_date;
		$data['invoice_description'] = "Order #55 Invoice";
		$data['return_url'] = url('return_url');
		$data['cancel_url'] =  url('cancel_url');
		$data['total'] =Cart::subtotal();
		$response = $provider->doExpressCheckoutPayment($data, $request->get('token'), $request->get('PayerID'));

		if (empty($_SESSION["discount"])) {
			$order = new User_Order([
				'user_id' => Auth::user()->id,
				'billing_address' =>$_SESSION["bil_address"],
				'shipping_address' => $_SESSION["ship_address"],
				'payment_gateway_id' => 2,
				'Status' => 'Order Placed',
				'grand_total' => Cart::total(),
				'shipping_charges' => 50,
				'Discount' => Cart::total()
			]);
			$order->save();

			foreach (Cart::content() as $key ) {
				$order_detail = new Order_Detail([
					'order_id' => $order->id,
					'product_id' => $key->id,
					'quantity' => $key->qty,
					'amount' => $key->total
				]); 
				$order_detail->save();

				$product = Product::find($key->id);
				$product->quantity = $product->quantity - $key->qty;
				$product->save();
			}

			$order_data = array(
				'id' => $order->id,
				'name' => Auth::user()->username,
				'method' =>"PayPal",
				'total' => Cart::total(),
				'status' => 'Order Placed'
			);
			Mail::to(Auth::user()->email)->send(new OrderMail($order_data));
			Mail::to('rahul.dhopte@neosofttech.com')->send(new AdminOrderMail($order_data));

			Cart::destroy();
			return view('frontend_view/paypal_final',compact('bill_addr','ship_addr','Pay'));
		}
		else
		{
			$order = new User_Order([
				'user_id' => Auth::user()->id,
				'billing_address' =>$_SESSION["bil_address"],
				'shipping_address' => $_SESSION["ship_address"],
				'payment_gateway_id' => 2,
				'Status' => 'Order Placed',
				'grand_total' => Cart::total(),
				'shipping_charges' => 50,
				'Discount' => $_SESSION["discount"]
			]);
			$order->save();

			foreach (Cart::content() as $key ) {
				$order_detail = new Order_Detail([
					'order_id' => $order->id,
					'product_id' => $key->id,
					'quantity' => $key->qty,
					'amount' => $key->total
				]); 
				$order_detail->save();

				$product = Product::find($key->id);
				$product->quantity = $product->quantity - $key->qty;
				$product->save();
			}
			$coupon_use = new Coupons_used([
				'user_id' => Auth::user()->id,
				'order_id' => $order->id,
				'coupon_id' => $_SESSION["cup_id"]  
			]);
			$coupon_use->save();

			$order_data = array(
				'id' => $order->id,
				'name' => Auth::user()->username,
				'method' =>"PayPal",
				'total' => $_SESSION["discount"],
				'status' => 'Order Placed'
			);
			Mail::to(Auth::user()->email)->send(new OrderMail($order_data));
			Mail::to('rahul.dhopte@neosofttech.com')->send(new AdminOrderMail($order_data));
			Cart::destroy();
			return view('frontend_view/paypal_final',compact('bill_addr','ship_addr','Pay'));
		}

	}

	public function cancel_url(Request $request)
	{
		return view('frontend_view/cancel_pay');
	}


	public function cms_content($id)
	{
		$data =  Cms::find($id);
		return view('frontend_view/cms_content',compact('data'));
	}

	public function search_pro($name)
	{
		$product = DB::select("SELECT pro.price as price, pro.id as id,pro.Name as Name,img.Image as img , whislist.id as wishid FROM product as pro inner join product_images as img on img.product_id=pro.id and img.is_front_img = 1 left join whislist on whislist.product_id = pro.id where pro.Name = '$name' ");
		
		if (!empty($product)) {
			return response()->json(['success' => true,'product' => $product, 'url' => url("product_detail") ]);
		}

		
		else {
			
			return response()->json(['success' => false]);
		}
	}

	public function forgot_email()
	{
		return view('auth/passwords/email');
	}

	public function pass_mail(Request $request)
	{
		$data = User::all();
		foreach ($data as $key ) {
			if (in_array($request->get('email'), (array)$key['email'])) {
				$pasword = User::where('email',$key['email'])->first();
				$pasword->password = Hash::make('password');
				$pasword->save();
				$email = $key['email'];
				Mail::to($key['email'])->send(new ForgotPassword($email));
				session_start();
				$request->session()->flash('message.level', 'success');
				$request->session()->flash('message.content', 'Password has been Emailed');
				return redirect('/');

			}
		} 
	}

}

?>