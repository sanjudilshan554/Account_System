<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;
use App\models\region;
use App\models\territory;
use DB;


class TerritoryController extends Controller
{
    function getTerritory(){
        $regionData=region::get();
        $zoneData=zone::get();

        return view('territory.territory',['regData'=>$regionData,'data'=>$zoneData]);
    }

    function store(Request $request){
   
        $validate_data=$request->validate([
            'zoneId'=>[''],
            'regId'=>[''],
            'terrName'=>[''],
        ]);

        $data=territory::create([
            'zoneId'=>$validate_data['zoneId'],
            'regId'=>$validate_data['regId'],
            'terrName'=>$validate_data['terrName'],
        ]);

        return redirect()->route('Territory');
    }

    
    function terrView(){
        $data=territory::get()->all();

        return view('territory.territoryView',['terryData'=>$data]);
    }

    function updateTerrView($id){
        $regionData=region::get();
        $zoneData=zone::get();

        $terrData=territory::where('id',$id)
        ->get();

        return view('territory.updateTerr',['terrData'=>$terrData,'regData'=>$regionData,'data'=>$zoneData]);
    }

    function updateTerr(Request $request){
        $id=$request->id;
        $zoneId=$request->zoneId;
        $regId=$request->regId;
        $terrName=$request->terrName;

        $affected = DB::table('territories')
              ->where('id', $id)
              ->update([
                'zoneId'=>$zoneId,
                'regId'=>$regId,
                'terrName'=>$terrName,
            ]);
        
        return redirect()->route('terrView',['message'=>'update successfully']);
    }


}
