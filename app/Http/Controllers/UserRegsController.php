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

        return view('user.user');
    }
}
