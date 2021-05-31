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


use App\ShopCategories;
use App\Shop;
use App\ProductCategories; 
use App\Product;
use App\Order;
use App\Order_Product;


use File;
use DB;


class VendorController extends Controller
{
    //Doctor Registration
public function vendorRegistration()
{
    return view('vendor/vendorRegistration');
}

//Shop
public function shopGet()
{
    if(Session::get('vendor_value')){
        $shops = DB::table('shops')->where('s_vendor', Auth::user()->email)->first(); 
        $shop_categories = ShopCategories::all();

        $shop = Shop::all();
        $product = Product::all();
        $product_category = ProductCategories::all();
        return view('vendor/updateShop',compact('shops','shop_categories','shop','product','product_category'));
    }
    return redirect()->route('login');      
} 
//Update
public function ShopPost(Request $request)
{
    if(Session::get('vendor_value')){
        $shops = Shop::find($request->s_id);
        $shops->s_name = $request->s_name;
        $shops->category = $request->shop_category;
        $shops->open_hh = $request->o_hour;
        $shops->open_mm = $request->o_min;
        $shops->close_hh = $request->c_hour;
        $shops->close_mm = $request->c_min;
        $shops->shop = $request->shop;

        if($request->file('s_banner')){
            if($shops->s_banner){
                if(file_exists($shops->s_banner)){
                    unlink($shops->s_banner);
                }
            } 
            $Shop_banner = $request->file('s_banner');
            $banner_destination = 'shopImages/'.time().'.'.$Shop_banner->extension();
            $Shop_banner->move(public_path('shopImages'),$banner_destination);
            $shops->s_banner = $banner_destination;
        }
        else{
            $shops->s_banner = $request->ss_banner; 
        }
        $shops->s_discount = $request->s_discount;
        $shops->s_brance = $request->s_brance;
        $shops->save();
        return redirect()->route('vendor.shopGet');
    }
    return redirect()->route('login');      
}
//Products
public function addProducts(Request $request)
{
    if(Session::get('vendor_value')){
        $product = new Product;
        $product->p_name= $request->p_name;
        $product->category= $request->p_category;
        $product->shop= $request->p_shop;
        $product->p_vendor= $request->p_vendor;
        $product->p_price= $request->p_price;
        $product->p_discount= $request->p_discount;
        $product->p_description= $request->p_description;
        $product->p_availability= $request->p_availability;
        $product->a_hh = $request->a_hh;
        $product->a_mm = $request->a_mm;
        $product->d_hh = $request->d_hh;
        $product->d_mm = $request->d_mm;
       
        $img_1 = $request->file('img_1');
        $img_1_destination = 'productImages/'.time().'.'.$img_1->extension();
        $img_1->move(public_path('productImages'),$img_1_destination);
        $product->p_img_1 = $img_1_destination;
        $product->p_status = $request->status;
        $product->save();
        return redirect()->route('vendor.shopGet'); 
    }
    return redirect()->route('login');      
}
//Update
public function updateProductsGet($id)
{
    if(Session::get('vendor_value')){
        $product = Product::find($id);
        $product_category = ProductCategories::all();
        $shops = Shop::all();
        return view('vendor/updateProducts',compact('product','product_category','shops'));
    }
    return redirect()->route('login');      
} 
public function updateProductsPost(Request $request)
{

    if(Session::get('vendor_value')){


            $product = Product::find($request->p_id);
            $product->p_name = $request->p_name;
            $product->category = $request->p_category;
            $product->shop = $request->p_shop;
            $product->p_price = $request->p_price;
            $product->p_discount = $request->p_discount;
            $product->p_description = $request->p_description;
            $product->p_availability = $request->p_availability;
            $product->a_hh = $request->a_hh;
            $product->a_mm = $request->a_mm;
            $product->d_hh = $request->d_hh;
            $product->d_mm = $request->d_mm;
    
            $product->product = $request->product;

    
            if($request->file('img_1')){
                if($product->p_img_1){
                    if(file_exists($product->p_img_1)){
                        unlink($product->p_img_1);
                    }
                } 
                $product_img_1 = $request->file('img_1');
                $img_1_destination = 'productImages/'.time().'.'.$product_img_1->extension();
                $product_img_1->move(public_path('productImages'),$img_1_destination);
                $product->p_img_1 = $img_1_destination;
            }
            else{
                $product->p_img_1 = $request->pp_img_1; 
            }
            
            $product->save();
            return redirect()->route('vendor.shopGet');           
        

    }
    return redirect()->route('login');      
}
//Delate
public function delateProducts($id)
{
    if(Session::get('vendor_value')){
        $product = Product::find($id);
        if($product->p_img_1){
            if(file_exists($product->p_img_1)){
                unlink($product->p_img_1);
            }
        } 
        
        $product->delete();
        return redirect()->route('vendor.shopGet');
    }
    return redirect()->route('login');      
}

//Oders
public function getOrders()
{
    if(Session::get('vendor_value')){
        $orders =  Order::all();
        $order_product =  Order_Product::all();
        $products =  Product::all();
        return view('vendor/orders',compact('orders','order_product','products'));
    }
    return redirect()->route('login');     
} 
//Update
public function updateOrderPost(Request $request)
{
    if(Session::get('vendor_value')){
        $orders = Order::find($request->order_id);
        $orders->order_status = $request->order_status;
        $orders->save();
        return redirect()->route('vendor.getOrders');
    }
    return redirect()->route('login');      
}
}
