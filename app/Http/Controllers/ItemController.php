<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Brand;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::orderBy('id', 'DESC')->get();
        return view('backend.items.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $brands=Brand::all();
        $subcategories=Subcategory::all();
        return view('backend.items.create',compact('brands','subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
           $request->validate([
            'name'=>'required|min:2',
            'photo'=>'required|mimes:png,jpeg,jpg',
            'codeno'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'description'=>'required',
            'brand_id'=>'required',
            'subcategory_id'=>'required'
        ]);

         if($request->file()){
             $fileName = time().'_'.$request->photo->getClientOriginalName();
             $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');

        $path='/storage/'.$filePath;
        }
        $item=New Item;
        $item->name=$request->name;
        $item->photo=$path;
         $item->codeno=$request->codeno;
         $item->price=$request->price;
         $item->discount=$request->discount;
         $item->description=$request->description;
        $item->brand_id=$request->brand_id;
        $item->subcategory_id=$request->subcategory_id;
        $item->save();
        return redirect()->route('items.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
          $brands=Brand::all();
        $subcategories=Subcategory::all();
        return view('backend.items.edit',compact('item','brands','subcategories'));   


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
       // dd($request);
          $request->validate([
            'name'=>'required|min:2',
            'photo'=>'sometimes|mimes:jpeg,jpg,png',
            'codeno'=>'required',
            'price'=>'required',
            'discount'=>'required',
            'description'=>'required',
            'brand_id'=>'required',
            'subcategory_id'=>'required'
        ]);

        if($request->file()){
            $fileName=time().'_'.$request->photo->getClientOriginalName();
            $filePath=$request->file('photo')->storeAs('categoryimg',$fileName,'public');

            $path='/storage/'.$filePath;
            

            $item->photo = $path;

                          
        }

         $item->name=$request->name;
         $item->codeno=$request->codeno;
         $item->price=$request->price;
         $item->discount=$request->discount;
         $item->description=$request->description;
        $item->brand_id=$request->brand_id;
        $item->subcategory_id=$request->subcategory_id;
        $item->save();
        return redirect()->route('items.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
     }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function detail(Request $request)
    {
        $categories=Category::all();
        $brands=Category::all();
        $items=Item::all();
        $brands=Brand::all();
        $item=Item::find($request->id);
        $brand=Brand::find($item->brand_id);
        return view('frontend.itemdetail',compact('item','brand','categories','items','brands'));
    }
}
