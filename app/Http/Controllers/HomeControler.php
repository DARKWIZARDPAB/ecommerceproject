<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Session;
use Stripe;



class HomeControler extends Controller
{
    //


    public function index(){

      $product= Product::paginate(3);   
      return view('home/userpage',compact('product'));
            
    }

    public function redirect(){

        $usertype =Auth ::user()->usertype;

            if($usertype=='1'){

                return view('admin/home');
            }
            else{
                $product= Product::paginate(3);   
                return view('home/userpage',compact('product'));
            }
    }


    public function product_details($id){

        $product = Product::find($id);
        return view('home.product_details',compact('product'));
    
    }

    public function add_cart( Request $request, $id){

        if(Auth::id()){
            $user=Auth::user();
            $product=product::find($id);
            $cart = new cart;
            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->product_title=$product->title;
            if($product->discounted_price !=null){
                $cart->price=$product->discounted_price * $request->quantity;

            }
            else{
                $cart->price=$product->price * $request->quantity;
            }
            $cart->quantity=$request->quantity;
            $cart->image=$product->image;
            $cart->product_id=$product->id;
            $cart->user_id=$user->id;
            $cart->save();

            return redirect()->back();
            
        }
        else{
            return redirect('login');
        }
    
    }


    public function show_cart(){ 
        
        if(Auth::id()){
        $id= Auth::user()->id;
        $cart = cart::where('user_id','=',$id)->get();
        return view('home.show_cart',compact('cart'));
        }
        else{
            return redirect('login');  
        }

    
    }

    public function remove_cart($id){ 
        
       
        $cart = cart::find($id);
        $cart->delete();

        return redirect()->back();



    
    }

    public function cash_order(){ 
        
        $user=Auth::user();
        $userid= $user->id;
        $data = cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'Cash on Delivery';
            $order->delivery_status = 'Processing';
            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
            
        }

        return redirect()->back()->with('message','We have recieved your order will get back to you soon....');


    
    }


    public function stripe($totalprice){ 
        
        return view('home.stripe',compact('totalprice'));
    
    }


    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment" 
        ]);

        $user=Auth::user();
        $userid= $user->id;
        $data = cart::where('user_id','=',$userid)->get();
        foreach($data as $data){
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->payment_status = 'Paid';
            $order->delivery_status = 'Processing';
            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();
            
        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }
}
