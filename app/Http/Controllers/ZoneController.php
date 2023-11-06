<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;
use DB;

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

        return redirect()->route('Zone',['message'=>'data successfully saved']);
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
        
        return redirect()->route('zoneView',['message'=>'update successfully']);
    }
}
