<?php

namespace App\Http\Controllers;

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
}
