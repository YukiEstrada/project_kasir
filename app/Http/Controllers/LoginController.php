<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLogin()
    {
        DB::connection()->getPdo();

        return view('admin.login');
    }

    public function login(Request $request)
    { 
        //Method 1 (Raw Query)
        DB::select("SELECT * FROM admins");

        //Method 2 (DB table)
        DB::table('admins')->get();

        //Method 3 (Model)
        Admin::get();


        $username = $request['username'];
        $password = $request['password'];

        //Validate from Laravel
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if($validate->fails()){
            $error_array = $validate->errors()->all();
            return redirect()->back()->withErrors($error_array);
        }

        //Method Manual
        /*if(!$username || !$password){
            return redirect()->back()->withErrors(['Login field required']);
        }*/

        //Method 1
        //$admin = DB::select("SELECT * FROM admins where username = '" . $username . "' AND password = ". $password);

        //Method 2
        $username_check = DB::table('admins')
            ->where('username', '=', $username)
            ->first();

        //Method 3
        $username_check = Admin::
            where('username', '=', $username)
            ->first();

        if($username_check == true){
            $password_check = Hash::check($password, $username_check['password']);

            if($password_check){
                $request->session()->put('username','Diki Alfarabi Hadi');
                return redirect()->route('admin_home');
            }
            else{
                return redirect()->back()->withErrors(['Account login Failed!']);
            }
        }
        else{
            return redirect()->back()->withErrors(['Account login Failed!']);
        } 
    }
    
    public function logout(Request $request)
    {
        $request->session()->forget('username');
        return redirect()->route('login_show');
    }
}
