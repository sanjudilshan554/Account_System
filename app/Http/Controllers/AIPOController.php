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

    function store(Request $request) {
        $validatedData = $request->validate([
            'zoneId' => ['required'],
            'regId' => ['required'],
            'terId' => ['required'],
            'distributor' => ['required'],
            'dateTime' => ['required'],
            'remark' => ['required'],
            'skuCode' => ['required'],
            'skuName' => ['required'],
            'unitPrice' => ['required'],
            'qty' => ['required'],
            'quantity' => ['required'],
            'units' => ['required'],
            'totalPrice' => ['required'],
        ]);
    
        $items = [];
        foreach ($validatedData['skuCode'] as $key => $skuCode) {
            $items[] = [
                'skuCode' => $validatedData['skuCode'][$key],
                'skuName' => $validatedData['skuName'][$key],
                'unitPrice' => $validatedData['unitPrice'][$key],
                'qty' => $validatedData['qty'][$key],
                'quantity' => $validatedData['quantity'][$key],
                'units' => $validatedData['units'][$key],
                'totalPrice' => $validatedData['totalPrice'][$key]
            ];
        }
    
        $aipoData = [
            'zoneId' => $validatedData['zoneId'],
            'regId' => $validatedData['regId'],
            'terId' => $validatedData['terId'],
            'distributor' => $validatedData['distributor'],
            'dateTime' => $validatedData['dateTime'],
            'remark' => $validatedData['remark'],
            'purchase_order_items' => $items,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    
        AIPO::create($aipoData);
    
        return redirect()->route('AIPO')->with(['message' => 'Purchase order added successfully']);
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

    // without po
    function getPovTable(Request $request){
        
        $regionId = $request->input('regId');
        $territoryId = $request->input('terrySelect');
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $aiposData = AIPO::with(['region', 'territory', 'distributor'])
        ->where('zoneId', $regionId)
        ->where('regId', $territoryId)
        ->whereBetween('dateTime', [$fromDate, $toDate])
        ->get();

        $netTotal = 0;
        foreach ($aiposData as $purchaseOrder) {
            $purchaseItems = $purchaseOrder->purchase_order_items; // No decoding needed
            foreach ($purchaseItems as $item) {
                $netTotal += $item['totalPrice'];
            }
        }
        return response()->json(['aiposData' => $aiposData, 'netTotal' => $netTotal]);
    }

    // with po
    function PovTablewithpovNumber(Request $request){
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

        $netTotal = 0;
        foreach ($aiposData as $purchaseOrder) {
            $purchaseItems = $purchaseOrder->purchase_order_items; // No decoding needed
            foreach ($purchaseItems as $item) {
                $netTotal += $item['totalPrice'];
            }
        }
        return response()->json(['aiposData' => $aiposData, 'netTotal' => $netTotal]);
    }


}
