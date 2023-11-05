<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;
use App\models\region;

class RegionController extends Controller
{

        // Getting zone data and return view
        function getZone(){
            $data=zone::get();

           
            
            return view('region.region',['data'=>$data]);
        }


        function store(Request $request){
   
        $validation=$request->validate([
            'zoneId'=>[''],
            'regName'=>['']
        ]);

        $data=region::create([
            'zoneId'=>$validation['zoneId'],
            'regName'=>$validation['regName'],
        ]);

        return view('region.region',['message'=>'data successfully saved','status'=>'200','data'=>$data]);
    }
}
