<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Purchase Order</title>
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

@if(session('message'))
    <script>
        alert("{{ session('message') }}");
    </script>
@endif


    <section>
        <div class="">
            <form action="postAIPO" method="POST">
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
                                    <select class="Set" aria-label="Default select example" name="zoneId" id="zoneSelect">
                                        <option value="" selected>Select</option>
                                        @foreach($zone as $zones)
                                        <option value="{{$zones->id}}">{{$zones->shortDesc}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>Region</b></label>
                                    <select class="Set" aria-label="Default select example" name="regId" id="regionSelect">
                                        <option value="" selected>Select</option>
                                    </select>
                                 </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>Territory</b></label>
                                    <select class="Set" aria-label="Default select example" name="terId" id="territorySelect" >
                                        <option value="" selected>Select</option>
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
                                    <input type="text" class="Sets" name="dateTime" value="{{ $dateTime }}" readonly>
                                </div>
                            </div>

                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>PO No</b></label>
                                    <label for="staticEmail" class="" >{{$autoId}}</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>Remark</b></label>
                                    <input type="text" class="Set" name="remark" value="" required> 
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
                                    <td name="skuCode"><div class="tableBody" ><input type="text"  class="tableText" value="{{$products->skuCode}}" name="skuCode[]" readonly></div></td>
                                    <td name="skuName"><div class="tableBody"><input type="text"  class="tableText" value="{{$products->skuName}}" name="skuName[]" readonly></div></div></td>
                                    <td name="unitPrice"><div class="tableBody"><input type="text"  class="tableText" id="unitPrice" name="unitPrice[]" value="{{$products->mrp}}" readonly></div></div></td>
                                    <td name="qty"><div class="tableBody"><input type="text"  class="tableText" id="qty" name="qty[]"value="{{$productReg->where('skuCode', $products->skuCode)->count()}}" readonly></div></div></td>

                                    <td name="customQty">
                                        <div class="tableBody">
                                        <input type="text"  class="tableText" value="" placeholder="Type" name="quantity[]" required>
                                        </div>
                                    </td>


                                    <td ><div class="tableBody"><input type="text"  class="tableText" value="{{$products->unit}}" name="units[]"  readonly></div></div></td>
                                    <td name="totalPrice" value="">
                                        <div  class="tableBody" >
                                        <input type="text" class="tableText" name="totalPrice[]" id="qty"readonly>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pt-5 btnBackPOV">
                            <input type="submit" class="addPo" value="ADD PO">
                            <a href="{{route('homeBackViewUser')}}" class="submiClass view secondary">BACK</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>

<script>
function calculateTotalPrice(unitPrice, quantity) {
    return (unitPrice * quantity).toFixed(2);
}

function handleRowCalculation(row) {
    const unitPrice = parseFloat(row.querySelector('input[name="unitPrice[]"]').value);
    const availableQty = parseFloat(row.querySelector('input[name="qty[]"]').value);
    const quantityInput = row.querySelector('input[name="quantity[]"]');
    let quantity = parseFloat(quantityInput.value);

    if (quantity > availableQty) {
        quantityInput.value = availableQty;
        quantity = availableQty;
        alert('Entered quantity cannot exceed available quantity');
    }

    const totalPrice = calculateTotalPrice(unitPrice, quantity);
    row.querySelector('input[name="totalPrice[]"]').value = totalPrice;
}

const quantityInputs = document.querySelectorAll('input[name="quantity[]"]');

quantityInputs.forEach(input => {
    input.addEventListener('input', function() {
        const row = this.closest('tr');
        handleRowCalculation(row);
    });
});
</script>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const zoneSelect = document.getElementById('zoneSelect');
    const regionSelect = document.getElementById('regionSelect');
    const territorySelect = document.getElementById('territorySelect');

    function fetchRegions(selectedZoneId) {
        fetch(`/get-regions/${selectedZoneId}`)
            .then(response => response.json())
            .then(data => {
                regionSelect.innerHTML = '<option value="" selected>Select</option>';
                data.data.forEach(region => {
                    const option = document.createElement('option');
                    option.value = region.id;
                    option.text = region.regName;
                    regionSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error:', error));
    }

    function fetchTerritories(selectedZoneId, selectedRegionId) {
        fetch(`/get-territories/${selectedZoneId}/${selectedRegionId}`)
            .then(response => response.json())
            .then(data => {
                territorySelect.innerHTML = '<option value="" selected>Select</option>';
                data.data.forEach(territory => {
                    const option = document.createElement('option');
                    option.value = territory.id;
                    option.text = territory.terrName;
                    territorySelect.appendChild(option);
                });
                territorySelect.style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
    }

    zoneSelect.addEventListener('change', function() {
        const selectedZoneId = this.value;
        if (selectedZoneId !== '') {
            fetchRegions(selectedZoneId);
        } else {
            regionSelect.innerHTML = '<option value="" selected>Select</option>';
            territorySelect.innerHTML = '<option value="" selected>Select</option>';
            territorySelect.style.display = 'none';
        }
    });

    regionSelect.addEventListener('change', function() {
        const selectedZoneId = zoneSelect.value;
        const selectedRegionId = this.value;

        if (selectedZoneId !== '' && selectedRegionId !== '') {
            fetchTerritories(selectedZoneId, selectedRegionId);
        } else {
            territorySelect.innerHTML = '<option value="" selected>Select</option>';
            territorySelect.style.display = 'none';
        }
    });
});
    </script>

</html>