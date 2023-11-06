<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\userRegs;
use App\models\territory;

class UserRegsController extends Controller
{
    function getUser(){
        
        $data=territory::get();
        $gender=['male','female','other','prefer not to say'];

        return view('user.user',['terData'=>$data,'gender'=>$gender]);

        
    }

    function store(Request $request){
        $validate_data=$request->validate([
            'name'=>['required'],
            'nic'=>['required'],
            'address'=>['required'],
            'mobile'=>['required'],
            'email'=>['required'],
            'gender'=>['required'],
            'territory'=>['required'],
            'userName'=>['required'],
            'password'=>['required'],
        ]);

        $data=userRegs::create([
            'name'=>$validate_data['name'],
            'nic'=>$validate_data['nic'],
            'address'=>$validate_data['address'],
            'mobile'=>$validate_data['mobile'],
            'email'=>$validate_data['email'],
            'gender'=>$validate_data['gender'],
            'territory'=>$validate_data['territory'],
            'userName'=>$validate_data['userName'],
            'password'=>$validate_data['password'],
        ]);

        return redirect()->route('userRegistration');
    }

    function login(Request $request){

        $un=$request->username;
        $pw=$request->password;

        $user=userRegs::where('userName',$un)
        ->get()
        ->first();

        if($un == 'admin' && $pw == 'admin'){
            return view('adminPage.adminPage',['message'=>'verified admin login']);
        }
        elseif($user){
            if($user->userName == $un && $user->password == $pw){
                return view('userPage.userPage',['message'=>'verified admin login']);
            }else{
                return redirect()->route('login',['message'=>'invalid username or password']);
            }
        }
        else{
            return redirect()->route('login',['message'=>'Try again later']);
        }   
    }
}
