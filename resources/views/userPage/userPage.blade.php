<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>SysAdmin</title>
</head>
<body>
    <h4 class="display-2 mainText">USER'S HOME</h4>
    <div class="setups">
        <div class="sams">
            <a href="{{route('ProductRegistration')}}" class="links pt-">PRODUCT REGISTRATION</a>
            <a href="{{route('AIPO')}}" class="links pt-4"> ADD PURCHASE ORDER</a>
            <a href="{{route('POV')}}" class="links pt-4">PURCHASE ORDER VIEW</a>
        </div>
    </div>  
</body>
</html>