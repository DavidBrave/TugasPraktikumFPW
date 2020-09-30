<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="jq.js"></script>
    <script src="js.js"></script>
    <script>

        function ClickLogin() {
            rand = Math.floor(Math.random() * 3);

            if (rand == 0) {
                alert(rand);
                            return redirect()->action(
                'Vendor_Controller@profile', ['id' => 1]
            );
            }
        }
    </script>

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
    @yield('myjsfile')
    @yield('content')

<script src="{{ asset('js/js.js') }}"> </script>
<script src="{{ asset('js/jq.js') }}"> </script>
</body>
</html>
