<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\models\productReg;

class ProductRegController extends Controller
{
    function getSku(){
        
        $guessId=productReg::count();
        $AutomaticId=$guessId+1;
        return view('sku.sku',['autoId'=>$AutomaticId]);
    }
    function store(Request $request){
        
        $validate_data=$request->validate([
            'skuCode'=>['required'],
            'skuName'=>['required'],
            'mrp'=>['required'],
            'distPrice'=>['required'],
            'weight'=>['required'],
            'unit'=>['required'],
        ]);
       
        $data=productReg::create([
            'skuCode'=>$validate_data['skuCode'],
            'skuName'=>$validate_data['skuName'],
            'mrp'=>$validate_data['mrp'],
            'distPrice'=>$validate_data['distPrice'],
            'weight'=>$validate_data['weight'],
            'unit'=>$validate_data['unit'],
        ]);

        if($data){
            return redirect()->route('ProductRegistration')->with('message', 'Product registration successfully');
        }
        
    }

}
