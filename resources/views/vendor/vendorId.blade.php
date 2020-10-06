<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            background: #30a5db;

            background: -webkit-linear-gradient(right, #2179b0, #2179b0);
            background: -moz-linear-gradient(right, #2179b0, #2179b0);
            background: -o-linear-gradient(right, #2179b0, #2179b0);
            background: linear-gradient(to left, #2179b0, #2179b0);

            font-family: Verdana, Arial, Helvetica, sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }


        button {
            background:#d7ebfa;
            border: 3px solid #232F34;
            color: black;
            width: 180px;
            height: 30px;
            font-size: 12pt;
            border-radius: 10px;
            transition: all 0.175s ease-in-out;
            margin: 10px;
        }
        button:hover {
            transition: all 0.175s ease-in-out;
            border : 3px double black;
            background: #677f8f;
            color: whitesmoke;
        }



    </style>

</head>
<body>



    @error('con')
    @if ($message != "")
    <h2 style="color: #a60c0c; text-align: center">{{$message}}</h2>
    @endif
    @enderror

    <a href="@isset($vendor)
        {{ url('/menu/manage/' . $vendor->username) }}
    @endisset "><button>Menu Managment</button></a>
    <button onclick="window.location.href='/vendor'">List Vendor</button>
    <button >Transaction History</button>
    <button onclick="window.location.href='/logout'" style="float: right">Logout</button>

    @isset($vendor)
    <h1>Vendor {{ $vendor->fullname }} </h1>

    <div><h4>Address : {{ $vendor->address}}</h4></div>
    <div><h4>Email : {{ $vendor->email}}</h4></div>
    <div><h4>Detail : {{ $vendor->description}}</h4></div>

    @endisset



</body>
</html>
