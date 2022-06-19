<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('dashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'price' => 'required',
            'productimage' => 'required',
        ]);


        if ($files = $request->file('productimage')) {
            $imagename = date('YmHis') . '.' . $files->getClientOriginalExtension();
            $destinationPath = public_path('/Images/Items/');
            $files->move($destinationPath, $imagename);  
            
            $product = Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $imagename,
                'status' => 1,
            ]);
            
            return redirect()->route('products.create')->with('success', 'Product Added Successfully !!');
        }else{
            return back()->with('error', 'Something Went Wrong !!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('editproduct', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'productimage' => 'required',
        ]);

        if ($files = $request->file('productimage')) {
            $imagename = date('YmHis') . '.' . $files->getClientOriginalExtension();
            $destinationPath = public_path('/Images/Items/');
            $files->move($destinationPath, $imagename);   
            $product = Product::find($id);
            $product->name = $request->name;
            $product->price = $request->price;
            $product->image = $imagename;
            $product->status = 1;
            $product->save();
            return redirect()->route('products.index')->with('success', 'Product Update Successfully !!');
        }else{
            return back()->with('error', 'Something Went Wrong !!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Remove Product Successfully !!');
    }

    public function changestatus($id){
        $product = Product::find($id);
        if($product->status == 1){
            $product->status = 0;
        }else{
            $product->status = 1;
        }
        $product->save();
        return redirect()->route('products.index');
    }

}
