<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;
use DB;
use Carbon\Carbon;

class ZoneController extends Controller
{
    function getZone(){

        $guessId=zone::count();
        $AutomaticId=$guessId+1;

        $currentDateTime = Carbon::now('Asia/Colombo');
        $dateTime = $currentDateTime->format('l, jS F Y g:i A');
        
        return view('zone.zone',['dateTime'=>$dateTime,'autoId'=>$AutomaticId]);
    }

    function store(Request $request){
        
        $validation=$request->validate([
            'longDescription'=>['required'],
            'shortDescription'=>['required'],
        ]);

        $data=zone::create([
            'longDesc'=>$request->longDescription,
            'shortDesc'=>$request->shortDescription,
        ]);

        if($data){
            return redirect()->route('Zone')->with('message', 'Zone added successfully');
        }
       
    }

    function zoneView(){
        $data=zone::get()->all();

        return view('zone.zoneView',['zoneData'=>$data]);
    }

    function zoneUpdateView($id){
        $zone=zone::where('id',$id)
        ->get();

        return view('zone.zoneUpdate',['zone'=>$zone]);
    }

    function zoneUpdate(Request $request){
        $id=$request->id;
        $longDesc=$request->longDesc;
        $shortDesc=$request->shortDesc;

        $affected = DB::table('zones')
              ->where('id', $id)
              ->update([
                'longDesc'=>$longDesc,
                'shortDesc'=>$shortDesc,
            ]);
        
        if($affected){
            return redirect()->route('zoneView')->with('message', 'Zone update successfully');
        }
    }

    
}
