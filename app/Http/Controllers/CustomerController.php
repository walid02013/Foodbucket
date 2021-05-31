<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;

use App\User;
use App\Rider;
use App\Vendor;
use App\Customer;
use App\Admin;

use App\ShopCategories;
use App\Shop;
use App\ProductCategories; 
use App\Product;
use App\Cart;
use App\Order;
use App\Order_Product;

use File;
use DB;

class CustomerController extends Controller
{
    //About
    public function aboutGet()
    {

            return view('about');       
    
    } 
    
    //Contact
    public function contactGet()
    {
    
            return view('contact');  
     
    }
 
//All Restaurants
public function restaurantsGet()
{
        $shop_categories = ShopCategories::all();
        $shops = Shop::all();
        return view('restaurants',compact('shops','shop_categories'));
}
//All Grocery Shop
public function groceriesGet()
{
        $shop_categories = ShopCategories::all();
        $shops = Shop::all();
        return view('shops',compact('shops','shop_categories'));    
}
//All Computer Shop 
public function computerGet()
{
        $shop_categories = ShopCategories::all();
        $shops = Shop::all();
        return view('computers',compact('shops','shop_categories'));
}

//All Products
public function productsGet($id)
{
        $products = Product::all();
        return view('products',compact('products','id')); 
}  


//Carts
public function getCart()
{
    if(Session::get('user_value')){
        $customers =  DB::table('customers')->where('email', Auth::user()->email)->first();
        return view('carts',compact('customers'));
    }
    return redirect()->route('login');     
} 


public function getCartData()
{
    if(Session::get('user_value')){
        $carts = DB::table('products')->join('carts', 'products.id', '=', 'carts.product')->get();
        $cartsData['data'] = $carts;
        echo json_encode($cartsData);
        exit;
    }
    return redirect()->route('login');     
} 
 

//Add
public function addToCart(Request $request)
{
      if(Session::get('user_value')){
        $carts =  new Cart;
        $carts->product = $request->product;
        $carts->customer = Auth::user()->id;
        $carts->amount = 1;
        $carts->vendor = $request->vendor;
        $carts->save();
        return redirect()->route('customer.get_cart');
    }
    return redirect()->route('login');    
}
//Delate
public function delateToCart($id)
{
    if(Session::get('user_value')){
        Cart::find($id)->delete($id);
  
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);     
    }
    return redirect()->route('login');    
}
//AmountUp
public function amountUp($id)
{
    if(Session::get('user_value')){

        $cart =  Cart::find($id);
        $cart->amount = $cart->amount + 1 ;
        $cart->save();
        return response()->json([
            'success' => 'Record Up successfully!'
        ]);     
    }
    return redirect()->route('login');    
}
//AmountDown
public function amountDown($id)
{
    if(Session::get('user_value')){
        $cart =  Cart::find($id);
        if($cart->amount == 1){
            $cart->amount = 1 ;
        }
        else{
            $cart->amount = $cart->amount - 1 ;
        }      
        $cart->save();
        return response()->json([
            'success' => 'Record Down successfully!'
        ]);      
    }
    return redirect()->route('login');    
}
//CheckOut
public function checkOut(Request $request)
{

      if(Session::get('user_value')){

        $c_cart =  DB::table('carts')->where('customer', Auth::user()->id)->first();
        if($c_cart){
            $order =  new Order;
            $order->customer_name = Auth::user()->name;
            $order->customer_email = Auth::user()->email;
            $order->vendor_email = $c_cart->vendor;
            $order->total_price = $request->total_price;
            $order->payment_way = $request->PaymentWay;
            $order->payment_status = "Pending";
            $order->order_status = "Pending";
            $order->save();
    
            $customers =  DB::table('customers')->where('email', Auth::user()->email)->first();
            $orders =  Order::all();
            $carts =  Cart::all();
    
                foreach ($orders->reverse() as $order_value){ 
                    if($order_value->customer_email == $customers->email){
                        $order_id = $order_value->id;
                        break;
                    }          
                }
    
                foreach ($carts->reverse() as $cart_value){ 
                    if($cart_value->customer == Auth::user()->id){
                        $order_product =  new Order_Product;
                        $order_product->order_id = $order_id;
                        $order_product->product_id = $cart_value->product;
                        $order_product->amount = $cart_value->amount;
                        $order_product->save();
                    }                   
                } 
    
                Cart::where('customer', Auth::user()->id)->delete();
                return redirect()->route('customer.getOrders');   
        }
        else{
            return redirect()->route('customer.get_cart'); 
        }



    }
    return redirect()->route('login');    
}
//Oders
public function getOrders()
{
    if(Session::get('user_value')){   
        $orders =  Order::all();
        $order_product =  Order_Product::all();
        $products =  Product::all();
        return view('orderhistory',compact('orders','order_product','products'));
    }
    return redirect()->route('login');     
} 

    
}
