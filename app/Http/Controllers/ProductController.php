<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:products',
            'price'=>'required|numeric',
        ]);
        if ($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
            else
            {
             $product=new Product();
             $product->name=$request->input('name');
             $product->price=$request->input('price');
             $product->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'ok',
                ]);

            }

//        $validation=$request->validate([
//            'name'=>'required',
//            'price'=>'required|numeric',
//        ]);
//        $product=new Product();
//        $product->name=$request->name;
//        $product->price=$request->price;
//        $product->save();
//        return redirect(route('product.index'))->with('success','فرآورده با موفقیت ثبت گردید');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validation=$request->validate([
            'name'=>'required|numeric',
            'price'=>'required',
        ]);
//        $product=Product::find($id);
        $product->name=$request->name;
        $product->price=$request->price;
        $product->update();
        return redirect(route('product.index'))->with('success','فرآورده با موفقیت ویرایش گردید');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('warning','فرآورده با موفقیت حذف گردید');
    }
}
