<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        *{
            box-sizing: border-box;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
        }
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

        h2{
            text-align: center;
            font-size: 18px;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: white;
            padding: 30px 0;
        }

        /* Table Styles */

        .table-wrapper{
            margin: 10px 70px 70px;
            box-shadow: 0px 35px 50px rgba( 0, 0, 0, 0.2 );
        }

        .fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td, .fl-table th {
            text-align: center;
            padding: 8px;
        }

        .fl-table td {
            border-right: 2px solid #d6f1ff;
            border-bottom: 1px solid #95bedb;
            font-size: 12px;
        }

        .fl-table thead th {
            color: #ffffff;
            background: #426b82;
        }


        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .fl-table tr:nth-child(even) {
            background: #95bedb;
            /* background: #F8F8F8; */
        }

        /* Responsive */

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }
            .table-wrapper:before{
                /* content: "Scroll horizontally >"; */
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }
            .fl-table thead, .fl-table tbody, .fl-table thead th {
                display: block;
            }
            .fl-table thead th:last-child{
                border-bottom: none;
            }
            .fl-table thead {
                float: left;
            }
            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }
            .fl-table td, .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }
            .fl-table thead th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }
            .fl-table tbody tr {
                display: table-cell;
            }
            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }
            .fl-table tr:nth-child(even) {
                background: transparent;
            }
            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }
            .fl-table tr td:nth-child(even) {
                background: #95bedb;
                border-right: 1px solid #E6E4E4;
            }
            .fl-table tbody td {
                display: block;
                text-align: center;
            }
        }



    </style>

</head>
<body>
    @isset($user)
    <h1>Welcome {{ $user->fullname }} </h1>

    <div><h4>Address : {{ $user->address}}</h4></div>
    <div><h4>Email : {{ $user->email}}</h4></div>

    @error('con')
    @if ($message != "true")
    <div><h4>Detail : {{ $user->description}}</h4></div>
    @endif
    @enderror

    @endisset

    <button >Cart</button>
    <button onclick="window.location.href='/vendor'">List Vendor</button>
    <button >Transaction History</button>
    <button onclick="window.location.href='/logout'">Logout</button>

    <br>

    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
            <tr>

                <th>Item Name</th>
                <th>Item Stock</th>
                <th>Price</th>
                <th>Description</th>
                <th>Owner</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($items as $item)

                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->count}}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->desc }}</td>
                    <td>{{ $item->owner }}</td>
                    <td><form action="/addtocart" method="post">
                        @csrf
                        <input type="hidden" name="name" value="{{ $item->name }}">
                        <input type="hidden" name="owner" value="{{ $item->owner }}">
                        <button>Add To Cart</button>

                    </form></td>
                <tr>

            @endforeach
            </tbody>

        </table>
        </div>

</body>
</html>
