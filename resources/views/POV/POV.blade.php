<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Purchase Order</title>
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section>
        <div class="">
            <form action="postAIPO" method="POST"></form>
            @csrf
                <div class="AddRegion pt-4">
                    <h2><b>PURCHASE ORDER VIEW</b></h2>
                </div>
                <div class="SearchSetupOneForPOV">
                    <div class="cardForSearchForPOV">
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>Region</b></label>
                                    <select class="Set" aria-label="Default select example" name="regId">
                                        <option selected>Select</option>
                                        @foreach($region as $regions)
                                        <option value="{{$regions->id}}">{{$regions->regName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>Territory</b></label>
                                    <select class="Set" aria-label="Default select example" name="terId">
                                        <option selected>Select</option>
                                        @foreach($territory as $territorys)
                                        <option value="{{$territorys->id}}">{{$territorys->terrName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>PO NO</b></label>
                                    <input type="text" class="Set" name="remark" name="remark"> 
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>FROM</b></label>
                                    <input type="date" class="Set P-1" name="remark" name="remark"> 
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>TO</b></label>
                                    <input type="date" class="Set P-1" name="remark" name="remark"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tableMain pt-5">
                    <div class="tableSetup">
                        <table>
                            <thead>
                                <tr>
                                    <th><div class="tableHeadPov">REGION</div></th>
                                    <th><div class="tableHeadPov">TERRITORY</div></th>
                                    <th><div class="tableHeadPov">DISTRIBUTOR</div></th>
                                    <th><div class="tableHeadPov">PO NUMBER</div></th>
                                    <th><div class="tableHeadPov">DATE</div></th>
                                    <th><div class="tableHeadPov">TIME</div></th>
                                    <th><div class="tableHeadPov">TOTAL AMOUNT</div></th>
                                    <th><div class="tableHeadPov">VIEW PO</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productReg as $products)
                                <tr>
                                    <td name="skuCode"><div class="tableBody" ><input type="text"  class="tableText" value="{{$products->skuCode}}" readonly></div></td>
                                    <td name="skuName"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->skuName}}" readonly></div></div></td>
                                    <td name="unitPrice"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->mrp}}" readonly></div></div></td>
                                    <td name="qty"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->skuCode}}" readonly></div></div></td>
                                    <td name="qty"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->skuCode}}" readonly></div></div></td>
                                    <td name="units"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->unit}}" readonly></div></div></td>
                                    <td name="units"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->unit}}" readonly></div></div></td>
                                    <td name="units"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->unit}}" readonly></div></div></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>