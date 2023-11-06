<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;
use App\models\region;
use DB;
use Carbon\Carbon;

class RegionController extends Controller
{

        // Getting zone data and return view
        function getRegion(){

            $guessId=region::count();
            $AutomaticId=$guessId+1;

            $data=zone::get();

            $currentDateTime = Carbon::now('Asia/Colombo');
            $dateTime = $currentDateTime->format('l, jS F Y g:i A');

            return view('region.region',['data'=>$data,'dateTime'=>$dateTime,'autoId'=>$AutomaticId]);
        }


        function store(Request $request){
   
        $validation=$request->validate([
            'zoneId'=>['required'],
            'regName'=>['required']
        ]);

        $data=region::create([
            'zoneId'=>$validation['zoneId'],
            'regName'=>$validation['regName'],
        ]);

        if($data){
            return redirect()->route('Region')->with('message', 'Region added successfully');
        }

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
        
        if($affected){
            return redirect()->route('regionView')->with('message', 'Region update successfully');
        }
    }
    
}
