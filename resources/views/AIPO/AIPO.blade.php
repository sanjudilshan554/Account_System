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
            <div class="AddRegion pt-4">
                <h2><b>ADD INDIVIDUAL PURCHASE ORDER</b></h2>
            </div>
            
            <div class="SearchSetupOne">
                <div class="cardForSearch">
                    <div class="row">
                        <div class="col">
                            <div class="">
                                <label for="staticEmail" class=""><b>Zone</b></label>
                                <select class="Set" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>

                        <div class="col">
                            <div class="">
                                <label for="staticEmail" class=""><b>Region</b></label>
                                <select class="Set" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="">
                                <label for="staticEmail" class=""><b>Territory</b></label>
                                <select class="Set" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="">
                                <label for="staticEmail" class=""><b>Distributor</b></label>
                                <select class="Set" aria-label="Default select example">
                                    <option selected>Select</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
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
                                <label for="staticEmail" class="">Automatically</label>
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
                                <input type="text" class="Set"> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="">

            </div>
        </div>
    </section>
</body>
</html>