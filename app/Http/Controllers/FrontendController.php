<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Item;
use App\Subcategory;
use App\Order;
use Auth;

class FrontendController extends Controller
{
    public function frontendmaster($value='')

    {
         $categories=Category::all();
         $items=Item::all();
         $brands=Brand::all();
         $subcategories=Subcategory::all();
         return view('frontend_master',compact('categories','items','brands'));
    }

    public function index($value='')
    {
    $categories=Category::all();
     $items=Item::all();
      $brands=Brand::all();
     $subcategories=Subcategory::all();
    return view('frontend.index',compact('categories','items','brands','subcategories'));
    }

     public function itemdetail($value='')
    {

        $categories=Category::all();
        $subcategories=Subcategory::all();
         $brands=Brand::all();
         $items=Item::all();

    	return view('frontend.itemdetail',compact('categories','subcategories','brands','items'));
    }

     public function shoppingcart($value='')
    {
         $categories=Category::all();
          $subcategories=Subcategory::all();
          $brands=Brand::all();
    	return view('frontend.shopping_cart',compact('categories','subcategories','brands'));
    }

     public function subcategory($value='')
    {

         $categories=Category::all();
          $items=Item::all();  
          $subcategories=Subcategory::all();
           $brands=Brand::all();
        return view('frontend.subcategory',compact('categories','subcategories','items','brands'));
    }

     public function brand($id)
    {

       $brand=Brand::find($id);
         $categories=Category::all();
        $subcategories=Subcategory::all();
        $brands=Brand::all();
       //dd($brand);
       return view('frontend.brand',compact('brand','categories','subcategories','brands'));
    }
      public function orderhistory($value='')
      {
        $categories=Category::all();
         $brands=Brand::all();
        $orders = Order::where('user_id',Auth::id())->orderBy('id','desc')->get();
        return view('frontend.orderhistory',compact('orders','categories','brands'));
      }

}
