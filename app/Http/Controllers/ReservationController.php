<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Hekmatinasser\Verta\Verta;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        $validated = $request->validate([
            'load_number' => 'required|unique:reservations|numeric',
//            'row' => 'required|unique:reservations|numeric',
//            'car_number' => 'required',
            'product_type' => 'required',
            'issue_date' => 'required',
            'tracking_number' => 'required|numeric',
        ]);
        $loadrow = new Reservation();
        $a=$request->twonumber;
        $b=$request->alefba;
        $c=$request->threenumber;
        $d=$request->country;
        $e=$request->city;
        $arr=[$a,$b,$c,$d,$e];
        $loadrow->car_number = implode('',$arr);
        $loadrow->load_number = $request->load_number;
        $loadrow->product_type = $request->product_type;
        $loadrow->issue_date = verta()->format('Y/m/d');
        $loadrow->tracking_number = $request->tracking_number;
        $p_row = Reservation::orderBy('row', 'asc')->get()->last();
        if ($p_row) {
            $loadrow->row = ($p_row->row) + 1;
        } else {
            $row = "000000";
        }
        $carnumber = Reservation::where('car_number', implode('',$arr))->update([
            'status' => 0
        ]);
        $loadrow->save();




//
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
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
    public function update(Request $request, Reservation $reservation)
    {
        //
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
}
