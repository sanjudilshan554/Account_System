<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;
use App\models\region;
use App\models\territory;
use DB;
use Carbon\Carbon;

class TerritoryController extends Controller
{
    function getTerritory(){

        $guessId=territory::count();
        $AutomaticId=$guessId+1;

        $regionData=region::get();
        $zoneData=zone::get();

        $currentDateTime = Carbon::now('Asia/Colombo');
        $dateTime = $currentDateTime->format('l, jS F Y g:i A');

        return view('territory.territory',['regData'=>$regionData,'data'=>$zoneData,'dateTime'=>$dateTime,'autoId'=>$AutomaticId]);
    }

    function store(Request $request){
   
        $validate_data=$request->validate([
            'zoneId'=>['required'],
            'regId'=>['required'],
            'terrName'=>['required'],
        ]);

        $data=territory::create([
            'zoneId'=>$validate_data['zoneId'],
            'regId'=>$validate_data['regId'],
            'terrName'=>$validate_data['terrName'],
        ]);

        if($data){
            return redirect()->route('Territory')->with('message', 'Territory added successfully');
        }
    
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
        

        if($affected){
            return redirect()->route('terrView')->with('message', 'Territory update successfully');
        }

    }


}
