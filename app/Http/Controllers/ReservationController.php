<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use function Sodium\compare;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $reserves=Reservation::orderBy('issue_date','asc')->paginate(10);





    return view('reserve.index',compact('reserves'));}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $products=Product::all();

        $validated = $request->validate([
            'load_number' => 'required|unique:reservations|digits:8',
            'row' => 'unique:reservations|numeric',
//            'car_number' => 'required',
            'product_type' => 'required',
            'issue_date' => 'required',
            'tracking_number' => 'required',
            'driver_name' => 'required',
            'membership_number' => 'required',
        ]);

        $loadrow = new Reservation();
        if ($request->car_number){
            $loadrow->car_number =$request->car_number;
        }else{
        $a=$request->twonumber;
        $b=$request->alefba;
        $c=$request->threenumber;
        $d=$request->country;
        $e=$request->city;
//        $arr=[$a,$b,$c,$d,$e];
        $arr=[$e,$d,'-',$c,$b,$a];
        $loadrow->car_number = implode('',$arr);}
        $loadrow->load_number = $request->load_number;
        $loadrow->driver_name = $request->driver_name;
        $loadrow->membership_number = $request->membership_number;
        $loadrow->load_number = $request->load_number;
        $loadrow->expire_date = $request->expire_date;
        $loadrow->product_price = $request->product_price;
        $loadrow->product_type = $request->product_type;
        $loadrow->issue_date = verta()->format('Y/m/d');
        $loadrow->created_by = Auth::user()->id;
        $loadrow->tracking_number = $request->tracking_number;
        $p_row = Reservation::get()->last();
        if ($p_row) {
            $loadrow->row = ($p_row->row) + 1;
        } else {
            $row = 1;
        }
        $carnumber = Reservation::where('car_number', $request->car_number)->update([
            'status' => 0
        ]);
        $loadrow->save();




//
        return view('/print',compact('loadrow'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loadrow=Reservation::find($id);
        return view('/print',compact('loadrow'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products=Product::all();

        $validated = $request->validate([
            'load_number' => 'required|unique:reservations|numeric',
            'row' => 'unique:reservations|numeric',
//            'car_number' => 'required',
            'product_type' => 'required',
            'issue_date' => 'required',
            'tracking_number' => 'required|numeric',
            'driver_name' => 'required',
            'membership_number' => 'required',
        ]);
        $loadrow = Reservation::find($id);
        $a=$request->twonumber;
        $b=$request->alefba;
        $c=$request->threenumber;
        $d=$request->country;
        $e=$request->city;
        $arr=[$e,$d,'-',$c,$b,$a];
        $loadrow->car_number = implode('',$arr);
        $loadrow->load_number = $request->load_number;
        $loadrow->driver_name = $request->driver_name;
        $loadrow->membership_number = $request->membership_number;
        $loadrow->load_number = $request->load_number;
        $loadrow->expire_date = $request->expire_date;
        $loadrow->product_price = $request->product_price;
        $loadrow->product_type = $request->product_type;
        $loadrow->issue_date = verta()->format('Y/m/d');
        $loadrow->updated_by = Auth::user()->id;
        $loadrow->tracking_number = $request->tracking_number;
        $p_row = Reservation::get()->last();
        if ($p_row) {
            $loadrow->row = ($p_row->row) + 1;
        } else {
            $row = 1;
        }
        $carnumber = Reservation::where('car_number', implode('',$arr))->update([
            'status' => 0
        ]);
        $loadrow->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }

    public function reservesearch(Request $request)
    {
        $reserves=Reservation::orderBy('issue_date','asc')->paginate(10);
    $products=Product::all();
        $a=$request->twonumber;
        $b=$request->alefba;
        $c=$request->threenumber;
        $d=$request->country;
        $e=$request->city;
        $arr=[$e,$d,'-',$c,$b,$a];
        $q2 = implode('',$arr);
            $items = Reservation::where('car_number','LIKE','%'.$q2.'%')->get()->last();
            $q3=$request->product;
            $items1 = Product::where('name','LIKE','%'.$q3.'%')->get()->last();

//            dd($items->driver_name);
//        dd($q2);

        return view('search',compact('items','products','reserves','q2','items1'));
    }
}
