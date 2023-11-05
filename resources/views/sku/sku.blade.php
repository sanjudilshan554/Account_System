<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Registration</title>
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section>
        <div class="pt-4">
            <div class="row">
                <div class="col-sm-5"></div>
                <div class="col-sm-7">
                    <div class="HeadText">
                        <h4><b>Product Registration</b></h4>
                    </div>
                </div>
            </div>
            
            <div class="Segment">
                <div class="card  border-0">
                    <form action="">
                         <div class="fomr-group row">
                            <label for="" class="col-sm-4 col-form-label labelText">SKU ID</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="Automatically">
                            </div>
                        </div> 

                         <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-4 col-form-label labelText">SKU Code</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-4 col-form-label labelText">SKU Name</label>
                            <div class="col-sm-3 ">
                                <input type="text" class="form-control" placeholder="Main Product Name /auto" >
                            </div>
                        </div>
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-4 col-form-label labelText">MRP</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-4 col-form-label labelText">Distributor Price</label>
                            <div class="col-sm-1">
                                <input type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="fomr-group row pt-2">
                            <label for="" class="col-sm-4 col-form-label labelText">Weight/Volume</label>

                            <div class="col-sm-2">
                                <input type="text" class="form-control" >
                            </div>

                            <div class="col-sm-2">
                                <select name="" id="" class="form-select">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                </select>
                            </div>

                        </div> 
                        <div class="form-group row pt-4">
                            <label for="" class="col-sm-4 col-form-label labelText"></label>
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