<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use PDF;

class AdminController extends Controller
{
    public function view_category(){

        $data =Category::all();
        return view('admin.category',compact('data'));
            
    }



    public function view_product(){

        $data =Category::all();
        return view('admin.product',compact('data'));
            
    }

    public function show_product(){

        $data =Product::all();
        return view('admin.show_product',compact('data'));
            
    }


    public function add_category(Request $request){

        $data =new Category;
        $data->category_name=$request->category;
        $data->save();

        //return redirect->back();

        return back()->with('message' , 'category added successfully');
    
    }


    public function add_product(Request $request){

        $data =new Product;
        $data->title=$request->title;
        $data->describtion=$request->describtion;
        $data->category=$request->category;
        $data->category=$request->category;
        $data->quantity=$request->quantity;
        $data->price=$request->price;
        $data->discounted_price=$request->discounted_price;
        $image=$request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $data->image=$imagename;
        $data->save();

        //return redirect->back();

        return back()->with('message' , 'Product added successfully');
    
    }


    public function delete_category($id){

        $data = Category::find($id);
        $data->delete();
        return back()->with('message' , 'category removed successfully');
    
    }


    public function delete_product($id){

        $data = Product::find($id);
        $data->delete();
        return back()->with('message' , 'category removed successfully');
    
    }

    public function edit_product($id){

        $data = Product::find($id);
        $category =Category::all();
        return view('admin.edit_product',compact('data','category'));
    
    }

    public function update_product(Request $request ,$id){

        $data = Product::find($id);
        $data->title=$request->title;
        $data->describtion=$request->describtion;
        $data->category=$request->category;
        $data->category=$request->category;
        $data->quantity=$request->quantity;
        $data->price=$request->price;
        $data->discounted_price=$request->discounted_price;
        $image=$request->image;
        if($image){

            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $data->image=$imagename;
        }
        
        $data->save();

        //return redirect->back();

        return back()->with('message' , 'Product updated successfully');
    
    }

    public function order(){

        $data =Order::all();
        return view('admin.order',compact('data'));
            
    }


    public function delivered($id){

        $order =Order::find($id);
        $order->delivery_status='deliverd';
        $order->payment_status='Paid';
        $order->save();
        return back()->with('message' , 'Delivery Status updated successfully');
        
    }

    public function print_pdf($id){
       $order = Order::find($id);
       $pdf= PDF::loadView('admin.pdf',compact('order'));
       return $pdf->download('order_details.pdf');
        
    }

}
