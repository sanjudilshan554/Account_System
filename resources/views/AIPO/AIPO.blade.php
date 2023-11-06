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
                    <h2><b>ADD INDIVIDUAL PURCHASE ORDER</b></h2>
                </div>
                <div class="SearchSetupOne">
                    <div class="cardForSearch">
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>Zone</b></label>
                                    <select class="Set" aria-label="Default select example" name="zoneId">
                                        <option selected>Select</option>
                                        @foreach($zone as $zones)
                                        <option value="{{$zones->id}}">{{$zones->shortDesc}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                                    <label for="staticEmail" class=""><b>Distributor</b></label>
                                    <select class="Set" aria-label="Default select example" name="distributor">
                                        <option selected>Select</option>
                                        @foreach($user as $users)
                                        <option value="{{$users->id}}">{{$users->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="SearchSetupTwo ">
                    <div class="cardForSearch">
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>Date</b></label>
                                    <label for="staticEmail" class="" name="dateTime" value="{{$dateTime}}">{{$dateTime}}</label>
                                </div>
                            </div>

                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>PO No</b></label>
                                    <label for="staticEmail" class="">Automatically</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>Remark</b></label>
                                    <input type="text" class="Set" name="remark" name="remark"> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tableMain">
                    <div class="tableSetup">
                        <table>
                            <thead>
                                <tr>
                                    <th><div class="tableHead">SKU CODE</div></th>
                                    <th><div class="tableHead">SKU NAME</div></th>
                                    <th><div class="tableHead">UNIT PRICE</div></th>
                                    <th><div class="tableHead">AVB QTY</div></th>
                                    <th><div class="tableHead">ENTER QTY</div></th>
                                    <th><div class="tableHead">UNITS</div></th>
                                    <th><div class="tableHead">TOTAL PRICE</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productReg as $products)
                                <tr>
                                    <td name="skuCode"><div class="tableBody" ><input type="text"  class="tableText" value="{{$products->skuCode}}" readonly></div></td>
                                    <td name="skuName"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->skuName}}" readonly></div></div></td>
                                    <td name="unitPrice"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->mrp}}" readonly></div></div></td>
                                    <td name="qty"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->skuCode}}" readonly></div></div></td>
                                    <td name="customQty"><div class="tableBody"><input type="text"  class="tableText" value="" placeholder="Enter"></div></div></td>
                                    <td name="units"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->unit}}" readonly></div></div></td>
                                    <td name="totalPrice"><div class="tableBody">TOTAL PRICE</div></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pt-5 btnBackPOV">
                            <a href="{{route('homeBackViewUser')}}" class="submiClass view secondary">BACK</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>