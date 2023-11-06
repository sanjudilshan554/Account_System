<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;
use App\models\region;
use DB;
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

        return redirect()->route('Region',['message'=>'data successfully saved','status'=>'200','data'=>$data]);
    }

    function regionView(){
        $data=region::get()->all();

        return view('region.regionView',['regionData'=>$data]);
    }

    function updateReigonView($id){
        $data=zone::get();

        $region=region::where('id',$id)
        ->get();

        return view('region.regionUpdate',['region'=>$region,'data'=>$data]);
    }

    function updateRegion(Request $request){
        $id=$request->regCode;
        $zoneId=$request->zoneId;
        $regName=$request->regName;

        $affected = DB::table('regions')
              ->where('id', $id)
              ->update([
                'zoneId'=>$zoneId,
                'regName'=>$regName,
            ]);
        
        return redirect()->route('regionView',['message'=>'update successfully']);
    }
    
}
