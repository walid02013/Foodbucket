<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Rider;
use App\Vendor;
use App\Customer;

use App\Shop;
use App\ShopCategories;


use Session;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Session::get('vendor_email')){
            $User = DB::table('users')->where('email', Session::get('vendor_email'))->update(['vendor' => 1]);
            $vendor = new Vendor;
            $vendor->email = Session::get('vendor_email');
            $vendor->save();
            $shop = new Shop;
            $shop->s_vendor = Session::get('vendor_email');
            $shop->s_status = "Pending";
            $shop->save();
            Session::put('vendor_email', 0);
        }

        if(Session::get('rider_email')){
            $User = DB::table('users')->where('email', Session::get('rider_email'))->update(['rider' => 1]);
            $u_name = DB::table('users')->where('email', Session::get('rider_email'))->first();
            $rider = new Rider;
            $rider->email = Session::get('rider_email');
            $rider->name = $u_name->name;
            $rider->save();
            Session::put('rider_email', 0);
        }

        if(Session::get('user_email')){
            $customer = new Customer;
            $customer->email = Session::get('user_email');
            $customer->save();
            Session::put('user_email', 0);
        }

        $shop_categories = ShopCategories::all();
        $shops = Shop::all();


        if(Session::get('admin_value')){
            return view('admin/home');
        }

        if(Session::get('vendor_value')){
                return view('vendor/home');
        }

        if(Session::get('rider_value')){
            return view('rider/home');
        }

        if(Session::get('user_value')){
            return view('home',compact('shops','shop_categories'));
        }

        return redirect()->route('login');

    }

    public function admin_index()
    {
      $shop_categories = ShopCategories::all();
      $shops = Shop::all();

        if(Session::get('admin_value')){
            return view('admin/home');
        }

        if(Session::get('vendor_value')){
                return view('vendor/home');
        }

        if(Session::get('rider_value')){
            return view('rider/home');
        }

        if(Session::get('user_value')){
            return view('home',compact('shops','shop_categories'));
        }

        return redirect()->route('login');
    }

    public function vendor_index()
    {

      $shop_categories = ShopCategories::all();
      $shops = Shop::all();

        if(Session::get('admin_value')){
            return view('admin/home');
        }

        if(Session::get('vendor_value')){
                return view('vendor/home');
        }

        if(Session::get('rider_value')){
            return view('rider/home');
        }

        if(Session::get('user_value')){
            return view('home',compact('shops','shop_categories'));
        }

        return redirect()->route('login');
    }

    public function rider_index()
    {
      $shop_categories = ShopCategories::all();
      $shops = Shop::all();

        if(Session::get('admin_value')){
            return view('admin/home');
        }

        if(Session::get('vendor_value')){
                return view('vendor/home');
        }

        if(Session::get('rider_value')){
            return view('rider/home');
        }

        if(Session::get('user_value')){
            return view('home',compact('shops','shop_categories'));
        }

        return redirect()->route('login');
    }

    public function welcome()
    {

      $shop_categories = ShopCategories::all();
      $shops = Shop::all();

        if(Session::get('admin_value')){
            return view('admin/home');
        }

        if(Session::get('vendor_value')){
                return view('vendor/home');
        }

        if(Session::get('rider_value')){
            return view('rider/home');
        }

        if(Session::get('user_value')){
            return view('home',compact('shops','shop_categories'));
        }

        return view('welcome',compact('shops','shop_categories'));
    }


}
