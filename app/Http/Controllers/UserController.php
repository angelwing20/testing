<?php

namespace App\Http\Controllers;

use App\Models\cartids;
use App\Models\carts;
use App\Models\products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $login=$request->validate([
            'name'=>'required|max:50',
            'password'=>'required|min:6'
        ]);
        if (Auth::attempt($login)) {
            return redirect()->route('index')->with('message','Login Success');
        }else{
            return back()->with('message','Login Failed');
        }
    }

    public function register(Request $request){
        $condition=User::where('name',$request->name)->get();
        $register=$request->validate([
            'name'=>'required|max:50',
            'password'=>'required|min:6|confirmed'
        ]);
        $register['password']=bcrypt($register['password']);
        if (count($condition)=='1') {
            return back()->with('message','User already exists');
        }else{
            $user=User::create($register);
            Auth::login($user);
            if (Auth::check()) {
                return redirect()->route('login_page')->with('message','Register Success');
            }else{
                return back()->with('message','Register Failed');
            }
        }
        
    }

    public function addcart(products $id){
        $cart=carts::where("user_id",Auth::id())->where("p_id",$id->id)->where("c_status","pending")->exists();
        if ($cart) {
            return back()->with("message","Already have in your cart");
        }else{
            carts::create([
                'c_id'=>'0',
                'user_id'=>Auth::id(),
                'p_id'=>$id->id,
                'c_mass'=>$id->mass,
                'c_price'=>$id->price,
                'c_status'=>'pending'
            ]);
            return redirect()->route("index")->with("message","Add Cart Success");
        }
    }

    public function addcart_view(Request $request,products $id){
        $cart=carts::where("user_id",Auth::id())->where("p_id",$id->id)->where("c_status","pending")->exists();
        if ($cart) {
            return redirect()->route("cart")->with("message","Already have in your cart");
        }else{
            $addcart=$request->validate([
                'c_mass'=>'required|numeric|min:100',
                'c_price'=>'required'
            ]);
            $addcart['c_id']='0';
            $addcart['user_id']=Auth::id();
            $addcart['p_id']=$id->id;
            $addcart['c_status']='pending';
            carts::create($addcart);
            return back()->with("message","Add Cart Success");
        }
    }

    public function deletecart(Request $request,carts $id){
        $id->delete();
        return back()->with('message','Delete 1 Cart Item');
    }

    public function checkout(){
        $cart=carts::where("user_id",Auth::id())->where('c_id','0')->where('c_status','pending')->first();
        if ($cart==null) {
            $cart_id=1;
        }else{
            $cart_id=$cart->id+1;
        }
        
        if ($cart==null) {
            return back()->with('message','No Have Item In Your Cart');
        }else{
            $checkout=carts::where("user_id",Auth::id())->where('c_id','0')->where('c_status','pending')
            ->update([
                'c_id'=>$cart_id,
                'c_status'=>'checkout'
            ]);

            if ($checkout) {
                cartids::create([
                    'c_id'=>$cart_id
                ]);
            }
            return back()->with('message','Checkout Success');
        }
    }
}
