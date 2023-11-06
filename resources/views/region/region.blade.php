<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Region Registration</title>
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section>
        <div class="WelcomeText">
            <label><b>Welcome System Admin</b></label><br>
            <label>{{$dateTime}}</label>
        </div>
        <div class="">
            
                <div class="AddRegion">
                        <h4><b>ADD REGION</b></h4>
                 </div>
            <div class="Segment">
                <div class="card border-0">
                    <form action="postRegion" method="POST">
                    @csrf
                        <div class="fomr-group row">
                            <label for="" class="col-sm-5 col-form-label labelText">Zone</label>
                            <div class="col-sm-3">
                                <select name="zoneId" id="" class="form-select">
                                    <option selected>Select</option>
                                    @foreach ($data as $dataSet)
                                    <option value="{{$dataSet->id}}">{{$dataSet->shortDesc}}</option>
                                  
                                    @endforeach
                                </select>
                            </div>
                        </div> 
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-5 col-form-label labelText">Region Code</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="Automatically" name="regCode">
                            </div>
                        </div>  
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-5 col-form-label labelText">Region Name</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Ex. REGION 1" name="regName">
                            </div>
                        </div>  
                        <div class="fomr-group row pt-4">
                            <label for="" class="col-sm-5 col-form-label labelText"></label>
                            <div class="col-sm-7">
                                <input type="submit" class="submiClass" value="SAVE">
                                <a href="{{route('regionView')}}" class="submiClass view">VIEW</a>
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