<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Food;

use App\Models\Foodchef;

use App\Models\Cart;

use App\Models\Order;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            return redirect('redirects');
        }
        else

        $data = food::all();
        $data2 = foodchef::all();
        
        $user_id=Auth::id();
            $count=cart::where('user_id',$user_id)->count();

        return view("home",compact("data","data2","count"));
    }

    public function redirects()
    {
        $data = food::all();
        $data2 = foodchef::all();
        $usertype = Auth::user()->usertype;

        if($usertype == '1'){
            return view('admin.adminhome');
        }
        else{
            $user_id=Auth::id();

            $count=cart::where('user_id',$user_id)->count();

            return view('home',compact('data','data2','count'));
        }
    }

    public function addcart(Request $request, $id)
    {
        if(Auth::id())
        {
            $user_id=Auth::id();

            $foodid=$id;
            $quantity=$request->quantity;

            $cart=new Cart;
            $cart->user_id=$user_id;
            $cart->food_id=$foodid;
            $cart->quantity=$quantity;

            $cart->save();

            return redirect()->back();
        }
        else
        {
            return redirect('/login');
        }
    }

    public function showcart(Request $request, $id)
    {
        if(Auth::id()==$id)
        {
        $count=cart::where('user_id',$id)->count();

        $data2=cart::select('*')->where('user_id',"=",$id)->get();

        $data=cart::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();

        return view('showcart',compact('data','data2','count'));
        }
        else
        {
            return redirect()->back();
        }
    }

    public function remove($id)
    {
        $data=cart::find($id);

        $data->delete();

        return redirect()->back();
    }

    public function orderconfirm(Request $request)
    {
        
        foreach($request->foodname as $key=> $foodname);
        {

            $conforder= new order;
            $conforder->foodname = $foodname;
            $conforder->price = $request->price[$key];
            $conforder->quantity = $request->quantity[$key];
            
            $conforder->name = $request->name;
            $conforder->phone = $request->phone;
            $conforder->address = $request->address;
            $conforder->save();


        }
        
    return redirect()->back();
        
    }
}
