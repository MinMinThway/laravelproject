<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $brands=Brand::all();
        return view('backend.brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
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
            'photo'=>'required|mimes:jpg,jpeg,png'

        ]);

        if($request->file()){
            $str=$request->photo;
            $pos = strpos($str,'/',1);
            $str = substr($str, $pos);
            $oldFile = storage_path('app\public').$str;
            File::Delete($oldFile);

            $fileName=time().'_'.$request->photo->getClientOriginalNaME();
            $filePath=$request->file('photo')->storeAs('brandimg',$fileName,'public');
            $path='/storage/'.$filePath;
        }

        $brand=new Brand;
        $brand->name=$request->name;
        $brand->photo=$path;
        $brand->save();
        return redirect()->route('brands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('backend.brands.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
         $request->validate([

            'name'=>'required|min:2',
            'photo'=>'sometimes|mimes:jpg,jpeg,png'

        ]);

        if($request->file()){
             $str=$brand->photo;   //      
            $pos = strpos($str,'/',1);  // 8
            $str = substr($str, $pos);  // /storage/categoryimg/1608191242_a (7).jpg
            $oldFile = storage_path('app\public').$str;  //   /categoryimg/1608191242_a (7).jpg
            File::Delete($oldFile);

            $fileName=time().'_'.$request->photo->getClientOriginalNaME();
            $filePath=$request->file('photo')->storeAs('brandimg',$fileName,'public');
            $path='/storage/'.$filePath;

            $brand->photo=$path;
        }

        
        $brand->name=$request->name;
      
        $brand->save();
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {

        $str=$brand->photo;   //      
        $pos = strpos($str,'/',1);  // 8
        $str = substr($str, $pos);  // /storage/categoryimg/1608191242_a (7).jpg
        $oldFile = storage_path('app\public').$str;  //   /categoryimg/1608191242_a (7).jpg
        File::Delete($oldFile);
        $brand->delete();
  
        return redirect()->route('brands.index');
    }

}
