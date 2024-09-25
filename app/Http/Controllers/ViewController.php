<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    //
    public function login_page(){
        return view('login');
    }

    public function register_page(){
        return view('register');
    }

    public function index(){
        return view('index',[
            'products'=>products::orderBy('created_at','DESC')->get()
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login_page');
    }

    public function view($id){
        return view('view',[
            'detail'=>products::find($id)
        ]);
    }
}
