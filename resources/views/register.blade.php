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

        .register-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }
        .form {
            position: relative;
            border-radius: 20px;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .form input {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            border-radius: 10px;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .form button {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            border-radius: 10px;
            text-transform: uppercase;
            outline: 0;
            background: #30a5db;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
        .form button:hover,.form button:active,.form button:focus {
            background: #307adb;
        }
        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }
        .form .message a {
            color: #307adb;
            text-decoration: none;
        }
        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }
        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }
        .container .info {
            margin: 50px auto;
            text-align: center;
        }
        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }
        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }
        .container .info span a {
            color: #000000;
            text-decoration: none;
        }
        .container .info span .fa {
            color: #EF3B3A;
        }

        .container input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
        }

        #radio_button_user {
            position: absolute;
            left: 20%;
        }
        #radio_button_vendor {
            position: absolute;
            left: 60%;
        }


        #text_deskripsi{
            display: none;
        }
        input[type="radio"]#radio_button_vendor:checked + div #text_deskripsi{
            display:contents;
        }

    </style>

    <script src="jq.js"></script>
    <script>
        function VendorCheck() {
                document.getElementById('text_deskripsi').style.display= 'block';
                document.getElementById('radioButton_vendor').checked = true;
                document.getElementById('radioButton_user').checked = false;
        }

        function UserCheck() {
            document.getElementById('text_deskripsi').style.display= 'none';
            document.getElementById('radioButton_user').checked = true;
            document.getElementById('radioButton_vendor').checked = false;
        }
    </script>
</head>
<body>


    @error('unique')
    <h2 style="color: #a60c0c; text-align: center">{{$message}}</h2>
    @enderror



    <div class="register-page">
    <div class="form">
    <form class="register-form" method="POST" action="/register">

        @csrf
        <input type="text" placeholder="username" name="username" value="{{ old('username') }}"/>
        @error('username') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        <input type="text" placeholder="email address" name="email"/>
        @error('email') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        <input type="text" placeholder="full name" name="fullname"/>
        @error('fullname') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        <input type="password" placeholder="password" name="password"/>
        @error('password') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        <input type="password" placeholder="confirm password" name="confirmation"/>
        @error('confirmation') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        <input type="text" placeholder="address" name="address"/> <br>
        @error('address') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror

        <div class="radio_form">
            <label for="radioButton_user" id="radio_button_user">
                <span>User</span>
                <input type="radio" id="radioButton_user" name="user" checked onclick="UserCheck()">
                <span class="radioButton"></span>
            </label>

            <label for="radioButton_vendor" id="radio_button_vendor">
                <span>Vendor</span>
                <input type="radio" id="radioButton_vendor" name="vendor" onclick="VendorCheck()">
                <span class="radioButton"></span>
            </label>
        </div>
        <br> <br> <br>

        {{-- <div id="text_deskripsi"> --}}
            <input id="text_deskripsi" type="text" name="description" placeholder="Description"/>
            @error('description') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        {{-- </div> --}}

        <button>Register</button>
        <p class="message">Already registered? <a href="/login">Sign In</a></p>
    </form>
    </div>
    </div>

</body>
</html>
