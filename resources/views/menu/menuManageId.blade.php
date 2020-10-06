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

    <form action="{{url('menu/manage/id')}}"method="post">
        @csrf
        Item Name : <input type="text" name="item_name" id=""> <br>
        @error('item_name') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        Quantity : <input type="text" name="item_count" id=""> <br>
        @error('item_count') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        Price : <input type="text" name="item_price" id=""> <br>
        @error('item_price') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        Description : <input type="text" name="item_desc" id=""> <br>
        @error('item_desc') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        <button type="submit">Insert</button>

    </form>

</body>
</html>
