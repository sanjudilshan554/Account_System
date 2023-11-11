<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Territory Registration</title>
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const zoneSelect = document.querySelector('select[name="zoneId"]');
            const regionSelect = document.getElementById('regionSelect');
            
            function fetchRegions() {
                const selectedZoneId = zoneSelect.value;
                if (selectedZoneId !== 'Select') {
                    fetch(`/get-regions/${selectedZoneId}`)
                        .then(response => response.json())
                        .then(data => {
                            regionSelect.innerHTML = ''; 
                            const defaultOption = document.createElement('option');
                            defaultOption.text = 'Select';
                            defaultOption.value = '';
                            regionSelect.appendChild(defaultOption);

                            data.data.forEach(region => {
                                const option = document.createElement('option');
                                option.value = region.id;
                                option.text = region.regName;
                                regionSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Error:', error));
                } else {
                    regionSelect.innerHTML = '<option selected>Select</option>';
                }
            }

            zoneSelect.addEventListener('change', fetchRegions);
        });
    </script>

</head>
<body>

@if(session('message'))
    <script>
        alert("{{ session('message') }}");
    </script>
@endif

    <section>
        <div class="WelcomeText">
            <label><b>Welcome System Admin</b></label><br>
            <label>{{$dateTime}}</label>
        </div>
        <div class="">
            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-7">
                    <div class="HeadText">
                        <h4><b>ADD TERRITORY</b></h4>
                    </div>
                </div>
            </div>
           
            <div class="Segment">
                <div class="card  border-0">
                    <form action="postTerritory" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="zoneSelect" class="col-sm-5 col-form-label labelText">Zone</label>
                            <div class="col-sm-3">
                                <select name="zoneId" id="zoneSelect" class="form-select" required>
                                    <option selected>Select</option>
                                    @foreach($data as $zones)
                                        <option value="{{$zones->id}}">{{$zones->longDesc}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row pt-2">
                            <label for="regionSelect" class="col-sm-5 col-form-label labelText">Region</label>
                            <div class="col-sm-3">
                                <select name="regId" id="regionSelect" class="form-select" required>
                                    <option selected>Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-5 col-form-label labelText">Territory Code</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="{{$autoId}}" readonly>
                            </div>
                        </div> 
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-5 col-form-label labelText">Territory Name</label>
                            <div class="col-sm-3">
                                <input type="text" name="terrName" class="form-control" placeholder="Ex. TERRITORY 1" required>
                            </div>
                        </div>   
                        <div class="form-group row pt-4">
                            <label for="" class="col-sm-5 col-form-label labelText"></label>
                            <div class="col-sm-7">
                                <input type="submit" class="submiClass" value="SAVE">
                                <a href="{{route('terrView')}}" class="submiClass view">VIEW</a>
                                <a href="{{route('homeBackView')}}" class="submiClass view secondary">BACK</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

