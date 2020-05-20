<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\User;
use Validator;
class loginController extends Controller
{
    public function index(Request $req)
    {
    	return view('admin.index');
    }

    public function login(Request $req)

    {
    	return view ('login.login');
    }
    
    public function validateInfo(Request $req )
    {
      $validatedData = $req->validate([
        'uname' => 'required',
        'password' => 'required',
             ]); 

       $uname = $req->uname;
    	$password = $req->password;
     
        $user = DB::table('users')
                ->where('uname', $uname)
                ->where('password', $password)
                ->first();

		if($user != null && $user->status=="active"){
            if($user->position == "admin"){
                $req->session()->put('uid',$user->uid);
    			return view ('admin.home',compact('user'));
            }
            elseif($user->position== "administrative"){
               $req->session()->put('uid', $user->uid);
                return view ('administrative.home',compact('user'));
            } 

           
		}
        else
        {

			return view ('login.login');
		}
    
         
   }
        
           
   
    
}
