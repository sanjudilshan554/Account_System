<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\zone;
use App\models\region;
use App\models\territory;
use App\models\userRegs;
use App\models\AIPO;
use App\models\productReg;
use Carbon\Carbon;

class AIPOController extends Controller
{
    function getAIPO(){

        $guessId=AIPO::count();
        $AutomaticId=$guessId+1;


        $zoneData=zone::get();
        $regionData=region::get();
        $territoryData=territory::get();
        $userData=userRegs::get();
        $dateTime=Carbon::now('Asia/Colombo');

        $productData=productReg::get();

     
        return view('AIPO.AIPO',[
            'zone'=>$zoneData,
            'region'=>$regionData,
            'territory'=>$territoryData,
            'user'=>$userData,
            'dateTime'=>$dateTime,
            'productReg'=>$productData,
            'autoId'=>$AutomaticId
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
            'quantity'=>['required'],
            'units'=>['required'],
            'totalPrice'=>['required'],
        ]);

        $aipoData=[];
     
        for ($i = 0; $i < count($validate_data['skuCode']); $i++) {
            $aipoData[] = [
                'zoneId' => $validate_data['zoneId'],
                'regId' => $validate_data['regId'],
                'terId' => $validate_data['terId'],
                'distributor' => $validate_data['distributor'],
                'dateTime' => $validate_data['dateTime'],
                'remark' => $validate_data['remark'],
                'skuCode' => $validate_data['skuCode'][$i],
                'skuName' => $validate_data['skuName'][$i],
                'unitPrice' => $validate_data['unitPrice'][$i],
                'qty' => $validate_data['qty'][$i],
                'customQty' => $validate_data['quantity'][$i],
                'units' => $validate_data['units'][$i],
                'totalPrice' => $validate_data['totalPrice'][$i],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

       

        $data=AIPO::insert($aipoData);

        return redirect()->route('AIPO')->with(['message'=>'Purchase order added successfully']);
    }

    function getPOV(){
        $regionData=region::get();

        return view('POV.POV', [
            'regions'=> $regionData,
        ]);
    }

    function getTerr($zid,$rid){
        $data=territory::select('terrName','id')
        ->where('zoneId', $zid && 'regId', $rid)
        ->get();

        return response()->json(['data'=>$data]);
    }

    function getTerrForPov($id){

        $data=territory::select('terrName','id')
        ->where('regId', $id)
        ->get();

        return response()->json(['data'=>$data]);
    }

    function getPoNumber(Request $request){
        $regId = $request->input('regId');
        $terrySelect = $request->input('terrySelect');

        $poNumbers = AIPO::where('regId', $regId)
            ->where('terId', $terrySelect)
            ->pluck('id');

        return response()->json(['poNumbers' => $poNumbers]);
    }

    function getPovTable(Request $request){
        
        $regionId = $request->input('regId');
        $territoryId = $request->input('terrySelect');
        $poNumber = $request->input('poNo');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $aiposData = AIPO::with(['region', 'territory', 'distributor'])
            ->where('zoneId', $regionId)
            ->where('regId', $territoryId)
            ->where('id', $poNumber)
            ->whereBetween('dateTime', [$fromDate, $toDate])
            ->get();
        
        return response()->json(['aiposData' => $aiposData]);
    }
}
