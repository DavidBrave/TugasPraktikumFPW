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



    </style>

</head>
<body>
    @isset($user)
    <h1>Welcome {{ $user->fullname }} </h1>

    <div><h4>Address : {{ $user->address}}</h4></div>
    <div><h4>Email : {{ $user->email}}</h4></div>
    <div><h4>Detail : {{ $user->description}}</h4></div>

    @endisset

    <button >Cart</button>
    <button onclick="window.location.href='/vendor'">List Vendor</button>
    <button >Transaction History</button>
    <button onclick="window.location.href='/login'">Logout</button>

</body>
</html>