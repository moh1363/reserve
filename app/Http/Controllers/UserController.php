<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }

    public function fetchuser()
    {
        $users=User::all();
        return response()->json([
            'users'=>$users
        ]);
        return view('user.index',compact('users'));
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
        $validator=Validator::make($request->all(),[
            'name'=>'required|unique:products',
            'role'=>'required|numeric',
            'codemelli'=>'required|numeric|unique:users|digits:10',
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
            $user=new User();
            $user->name=$request->name;
            $user->role=$request->role;
            $user->codemelli=$request->codemelli;
            $user->password = bcrypt('12345678');
            $user->save();
            return response()->json([
                'status'=>200,
                'message'=>'success','ok',
            ]);

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
        $user=User::find($id);
        if ($user){
            return response()->json([
                'status'=>200,
                'user'=>$user,
            ]);
        }
        else{
            return response()->json([
                'status'=>400,
                'user'=>'kkjhk',
            ]);
        }
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
        $user = User::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'role' => 'required|numeric',
            'codemelli' => 'required|numeric|digits:10|unique:users,codemelli,'.$id
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        }
        else {
            $user = User::find($id);
            if ($user) {
                $user->name = $request->name;
                $user->role = $request->role;
                $user->codemelli = $request->codemelli;
                $user->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'ویرایش کاربر با موفقیت انجام شد',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'user' => 'kkjhk',
                ]);
            }
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
        $user=User::find($id);
        $user->delete();
        return response()->json([
            'status' => 200,
            'message' => 'کاربر انتخاب شده با موفقیت حذف گردید',
        ]);

    }
}
