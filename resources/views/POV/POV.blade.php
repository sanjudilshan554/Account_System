<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Purchase Order</title>
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script>
        document.addEventListener('DOMContentLoaded', function() {
            const zoneSelect = document.querySelector('select[name="regId"]');
            const terrySelect = document.getElementById('terrySelect');
            
            function fetchRegions() {
                const selectedZoneId = zoneSelect.value;
                if (selectedZoneId !== 'Select') {
                    fetch(`/get-territories/${selectedZoneId}`)
                        .then(response => response.json())
                        .then(data => {
                            terrySelect.innerHTML = '';
                            const defaultOption = document.createElement('option');
                            defaultOption.text = 'Select';
                            defaultOption.value = '';
                            terrySelect.appendChild(defaultOption);

                            data.data.forEach(region => {
                                const option = document.createElement('option');
                                option.value = region.id;
                                option.text = region.terrName;
                                terrySelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    terrySelect.innerHTML = '<option selected>Select</option>';
                }
            }

            zoneSelect.addEventListener('change', fetchRegions);
        });
    </script>

<script>
        document.addEventListener("DOMContentLoaded", function() {
        const regId = document.getElementById('regId');
        const terrySelect = document.getElementById('terrySelect');
        const poNo = document.getElementById('poNo');

   
        [regId, terrySelect].forEach(element => {
            element.addEventListener('change', fetchPONumbers);
        });

        function fetchPONumbers() {
            const selectedRegId = regId.value;
            const selectedTerryId = terrySelect.value;

            if (selectedRegId !== 'Select' && selectedTerryId !== 'Select') {
                fetch(`/fetchPONumbers?regId=${selectedRegId}&terrySelect=${selectedTerryId}`)
                    .then(response => response.json())
                    .then(data => {
                        poNo.innerHTML = '<option selected>Select</option>'; 
                        data.poNumbers.forEach(poNumber => {
                            const option = document.createElement('option');
                            option.value = poNumber;
                            option.text = poNumber;
                            poNo.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                poNo.innerHTML = '<option selected>Select</option>'; 
            }
        }
    });
    </script>



<script>
  document.addEventListener("DOMContentLoaded", function () {
    const regId = document.getElementById('regId');
    const terrySelect = document.getElementById('terrySelect');
    const poNo = document.getElementById('poNo');
    const fromDate = document.getElementById('fromDate');
    const toDate = document.getElementById('toDate');
    const tableBody = document.getElementById('tableBody');

    [regId, terrySelect, poNo, fromDate, toDate].forEach((element) => {
        element.addEventListener('change', updateTable);
    });

    function updateTable() {
        const selectedRegId = regId.value;
        const selectedTerryId = terrySelect.value;
        const selectedPoNo = poNo.value;
        const selectedFromDate = fromDate.value;
        const selectedToDate = toDate.value;

        fetch(`/fetchAiposData?regId=${selectedRegId}&terrySelect=${selectedTerryId}&poNo=${selectedPoNo}&fromDate=${selectedFromDate}&toDate=${selectedToDate}`)
            .then(response => response.json())
            .then(data => {
                tableBody.innerHTML = ''; 
                data.aiposData.forEach(rowData => {
                    const row = document.createElement('tr');

                    const { region, territory, dateTime, distributor, id, totalPrice } = rowData;

                    const checkboxCell = document.createElement('td');
                    const checkbox = document.createElement('input');
                    checkbox.type = 'checkbox';
                    checkbox.name = 'selectedPOs[]';
                    checkbox.value = rowData.id; 
                    checkboxCell.appendChild(checkbox);
                    checkboxCell.style.textAlign = 'center';

                    const regionCell = document.createElement('td');
                    regionCell.textContent = region.regName;
                    regionCell.style.textAlign = 'center';

                    const territoryCell = document.createElement('td');
                    territoryCell.textContent = territory.terrName;
                    territoryCell.style.textAlign = 'center';

                    const distributorCell = document.createElement('td');
                    distributorCell.textContent = distributor.name;
                    distributorCell.style.textAlign = 'center';

                    const poNoCell = document.createElement('td');
                    poNoCell.textContent = id;
                    poNoCell.style.textAlign = 'center';

                    const dateTimeParts = dateTime.split(' ');
                    const dateCell = document.createElement('td');
                    dateCell.textContent = dateTimeParts[0];
                    dateCell.style.textAlign = 'center';

                    const timeCell = document.createElement('td');
                    timeCell.textContent = dateTimeParts[1];
                    timeCell.style.textAlign = 'center';

                    const totalAmountCell = document.createElement('td');
                    totalAmountCell.textContent = totalPrice;
                    totalAmountCell.style.textAlign = 'center';

                    const viewCell = document.createElement('td');
                    const viewLink = document.createElement('a');
                    viewLink.textContent = 'VIEW';
                    
                    viewLink.href = '#';
                    viewCell.appendChild(viewLink);
                    viewCell.style.textAlign = 'center';

                  
                    row.appendChild(checkboxCell);
                    row.appendChild(regionCell);
                    row.appendChild(territoryCell);
                    row.appendChild(distributorCell);
                    row.appendChild(poNoCell);
                    row.appendChild(dateCell);
                    row.appendChild(timeCell);
                    row.appendChild(totalAmountCell);
                    row.appendChild(viewCell);

                    tableBody.appendChild(row);
                });
            })
            .catch(error => console.error('Error:', error));
    }
});
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    
    function updateTable() {
       
        
        data.aiposData.forEach(rowData => {
            const row = document.createElement('tr');
            
            const checkboxCell = document.createElement('td');
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.value = rowData.id; 
            checkboxCell.appendChild(checkbox);

            row.appendChild(checkboxCell);
            tableBody.appendChild(row);
        });
    }
    
    const selectAllCheckbox = document.getElementById('selectAllCheckbox');
    selectAllCheckbox.addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('#tableBody input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });
});
</script>

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
                                    <label for="staticEmail" class=""><b>REGION</b></label>
                                    <select name="regId" id="regId" class="Set" required>
                                    <option selected>Select</option>
                                    @foreach($regions as $zones)
                                        <option value="{{$zones->id}}">{{$zones->regName}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>TERRY</b></label>
                                    <select name="terrySelect" id="terrySelect" class="Set" required>
                                        <option selected>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>PO NO</b></label>
                                    <select name="poNo" id="poNo" class="Set" required>
                                        <option selected>Select</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>FROM</b></label>
                                    <input type="date" class="Set P-1" name="fromDate" id="fromDate"> 
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="">
                                    <label for="staticEmail" class=""><b>TO</b></label>
                                    <input type="date" class="Set P-1" name="toDate" id="toDate"> 
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
                                    <th><div class="tableHeadPov">SELECT</div></th>
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
                            <tbody id="tableBody" calss="dc">
                               
                            </tbody>
                        </table>

                      
                      @if(session('role') == 'admin')
                        <div class="pt-5 btnBackPOV">
                            <a href="{{route('homeBackView')}}" class="submiClass view secondary">BACK</a>
                        </div>
                     @else
                        <div class="pt-5 btnBackPOV">
                            <a href="{{route('homeBackViewUser')}}" class="submiClass view secondary">BACK</a>
                        </div>
                    @endif
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>