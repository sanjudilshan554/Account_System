<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Zones</title>
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <section>
        <h4 class="display-4 mainText">ZONE VIEW</h4>
             <div class="tableMain pt-5">
                    <div class="tableSetup">
                        <table>
                            <thead>
                                <tr>
                                    <th><div class="tableHeadPov">ID</div></th>
                                    <th><div class="tableHeadPov">LONG DESC</div></th>
                                    <th><div class="tableHeadPov">SHORT DESC</div></th>
                                    <th><div class="tableHeadPov">ACTION</div></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($zoneData as $zones)
                                <tr>
                                    <td name="skuCode"><div class="tableBody" ><input type="text"  class="tableText" value="{{$zones->id}}" readonly></div></td>
                                    <td name="skuName"><div class="tableBody"><input type="text"  class="tableText" value="{{$zones->longDesc}}" readonly></div></div></td>
                                    <td name="unitPrice"><div class="tableBody"><input type="text"  class="tableText" value="{{$zones->shortDesc}}" readonly></div></div></td>
                                    <td name="unitPrice"><div class="tableBody"><a href="{{route('zoneUpdateView',['id'=>$zones->id])}}" class="update">UPDATE</a></div></div></td>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pt-5 btnBackPOV">
                            <a href="{{route('Zone')}}" class="submiClass view secondary">BACK</a>
                        </div>
                    </div>
                </div>
    </section>
</body>
</html>