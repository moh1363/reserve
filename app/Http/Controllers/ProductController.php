<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $products=Product::with('user')->get();
//        dd($products);
        return view('product.index',compact('products'));
    }
    public function fetchproduct()
    {

        $products=Product::with('user')->get();
        return response()->json([
            'products'=>$products
        ]);
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
             $product->created_by=Auth::user()->id;
             $product->save();
                return response()->json([
                    'status'=>200,
                    'message'=>'فرآورده با موفقیت ثبت گردید',
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
    public function edit($id)
    {
        $product=product::find($id);
        if ($product){
            return response()->json([
                'status'=>200,
                'product'=>$product,
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'product'=>'kkjhk',
            ]);
        }    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|unique:products,name,'.$id,
            'price'=>'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else {
        $product=Product::find($id);
            if ($product) {

                $product->name=$request->name;
                 $product->price=$request->price;

                $product->updated_by=Auth::user()->id;

                $product->update();
            return response()->json([
                'status' => 200,
                'message' => 'فرآورده با موفقیت ویرایش گردید',
            ]);
        } else {
        return response()->json([
            'status' => 404,
            'product' => 'kkjhk',
        ]);
    }
    }}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return response()->json([
            'status' => 200,
            'message' => 'فرآورده انتخاب شده با موفقیت حذف گردید',
        ]);

       }
}
