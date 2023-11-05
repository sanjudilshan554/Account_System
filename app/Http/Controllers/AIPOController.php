<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\AIPO;

class AIPOController extends Controller
{
    function getAIPO(){

    }
    
    function store(Request $request){

        $validate_data=$request->validate([
            'zoneId'=>['required'],
            'regId'=>['required'],
            'terId'=>['required'],
            'distributor'=>['required'],
            'date'=>['required'],
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
            'date'=>$validate_data['date'],
            'remark'=>$validate_data['remark'],
            'skuCode'=>$validate_data['skuCode'],
            'skuName'=>$validate_data['skuName'],
            'unitPrice'=>$validate_data['unitPrice'],
            'qty'=>$validate_data['qty'],
            'customQty'=>$validate_data['customQty'],
            'units'=>$validate_data['units'],
            'totalPrice'=>$validate_data['totalPrice'],
        ]);
    }
}
