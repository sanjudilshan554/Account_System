<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;
use App\models\region;
use App\models\territory;
use App\models\userRegs;
use App\models\AIPO;
use App\models\productReg;

class AIPOController extends Controller
{
    function getAIPO(){
        $zoneData=zone::get();
        $regionData=region::get();
        $territoryData=territory::get();
        $userData=userRegs::get();
        $dateTime=now();
        $productData=productReg::get();

        return view('AIPO.AIPO',[
            'zone'=>$zoneData,
            'region'=>$regionData,
            'territory'=>$territoryData,
            'user'=>$userData,
            'dateTime'=>$dateTime,
            'productReg'=>$productData
        ]);
    }

    function store(Request $request){

        $validate_data=$request->validate([
            'zoneId'=>['required'],
            'regId'=>['required'],
            'terId'=>['required'],
            'distributor'=>['required'],
            'dateTime'=>['required'],
            'remark'=>['required'],
            'skuCode'=>['required'],
            'skuName'=>['required'],
            'unitPrice'=>['required'],
            'qty'=>['required'],
            'customQty'=>['required'],
            'units'=>['required'],
            'totalPrice'=>['required'],
        ]);

        $data=AIPO::create([
            'zoneId'=>$validate_data['zoneId'],
            'regId'=>$validate_data['regId'],
            'terId'=>$validate_data['terId'],
            'distributor'=>$validate_data['distributor'],
            'dateTime'=>$validate_data['dateTime'],
            'remark'=>$validate_data['remark'],
            'skuCode'=>$validate_data['skuCode'],
            'skuName'=>$validate_data['skuName'],
            'unitPrice'=>$validate_data['unitPrice'],
            'qty'=>$validate_data['qty'],
            'customQty'=>$validate_data['customQty'],
            'units'=>$validate_data['units'],
            'totalPrice'=>$validate_data['totalPrice'],
        ]);

        return redirect()->route('AIPO');
    }

    function getPOV(){
        $zoneData=zone::get();
        $regionData=region::get();
        $territoryData=territory::get();
        $userData=userRegs::get();
        $dateTime=now();
        $productData=productReg::get();

        return view('POV.POV',[
            'zone'=>$zoneData,
            'region'=>$regionData,
            'territory'=>$territoryData,
            'user'=>$userData,
            'dateTime'=>$dateTime,
            'productReg'=>$productData
        ]);
    }
}
