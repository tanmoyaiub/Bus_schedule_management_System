<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Validator;

class LoginController extends Controller
{
    public function index(){
    	return view('Login.index');
    }

    public function verify(Request $req){
        $req->validate([
            'email' => 'bail|required|email',
            'password' => 'required'
        ]);

        $email = $req->email;
        $password = $req->password;
        $user = DB::table('users')
            ->where('email', $req->email)
            ->where('password', $req->password) 
            ->first();
        if($user != null){
            if($user->type == "admin"){
                $req->session()->put('email', $req->email);
                $req->session()->put('name', $user->name);
                return redirect()->route("admin.home");
            }
            else{
                $req->session()->put('email', $req->email);
                $req->session()->put('name', $user->name);
                return redirect()->route("manager.index");
            }
        }
        else{
            $req->session()->flash('msg', "invalid username/password");
            return redirect(route('login'));
        }
        
    }

    
}
