<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;

class ZoneController extends Controller
{
    function store(Request $request){
        
        $validation=$request->validate([
            'longDescription'=>[''],
            'shortDescription'=>[''],
        ]);

        $data=zone::create([
            'longDesc'=>$request->longDescription,
            'shortDesc'=>$request->shortDescription,
        ]);

        return view('zone.zone',['message'=>'data successfully saved']);
    }
}
