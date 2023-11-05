<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Territory Registration</title>
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section>
        <div class="WelcomeText">
            <label><b>Welcome System Admin</b></label><br>
            <label>date and time</label>
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
                            <label for="" class="col-sm-5 col-form-label labelText">Zone</label>
                            <div class="col-sm-3">
                                <select name="zoneId" id="" class="form-select">
                                    <option selected>Select</option>
                                    @foreach($data as $zones)
                                    <option value="{{$zones->id}}">{{$zones->longDesc}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="form-group row pt-2">
                            <label for="" class="col-sm-5 col-form-label labelText">Region</label>
                            <div class="col-sm-3">
                                <select name="regId" id="" class="form-select">
                                @foreach($regData as $regions)
                                <option selected>Select</option>
                                <option value="{{$regions->id}}">{{$regions->regName}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-5 col-form-label labelText">Territory Code</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="Automatically">
                            </div>
                        </div> 
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-5 col-form-label labelText">Territory Name</label>
                            <div class="col-sm-3">
                                <input type="text" name="terrName" class="form-control" placeholder="Ex. TERRITORY 1">
                            </div>
                        </div>   
                        <div class="form-group row pt-4">
                            <label for="" class="col-sm-5 col-form-label labelText"></label>
                            <div class="col-sm-7">
                                <input type="submit" class="submiClass" value="SAVE">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>