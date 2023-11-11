<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zone Registration</title>
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
        <div class="WelcomeText">
            <label><b>Welcome System Admin</b></label><br>
            <label>{{$dateTime}}</label>
        </div>
        <div class="">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <div class="HeadText">
                        <h4><b>ADD ZONE</b></h4>
                    </div>
                </div>
            </div>
            
            <div class="Segment">
                <div class="card  border-0">
                    <form action="postZone" method="POST">
                    @csrf
                        <div class="fomr-group row">
                            <label for="" class="col-sm-6 col-form-label labelText">Zone Code</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="{{$autoId}}" name="" value="{{$autoId}}" readonly>
                            </div>
                        </div> 
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-6 col-form-label labelText">Zone Long Description</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Ex. ZONE 1" name="longDescription">
                            </div>
                        </div>  
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-6 col-form-label labelText">Short Description</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" placeholder="Ex. Z01" name="shortDescription">
                            </div>
                        </div>  
                        <div class="fomr-group row pt-4">
                            <label for="" class="col-sm-6 col-form-label labelText"></label>
                            <div class="col-sm-6">
                                <input type="submit" class="submiClass" value="SAVE">
                                <a href="{{route('zoneView')}}" class="submiClass view">VIEW</a>
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