<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;
use App\models\region;
use App\models\territory;


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

        return view('territory.territory');
    }

}
