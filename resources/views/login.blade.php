
<style>
    .login-page {
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
    .form .register-form {
        display: none;
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
</style>

@section('myjsfile')
<script>

</script>
@stop

@extends('layouts.app')
@section('content')

@error('unique')
    <h2 style="color: #a60c0c; text-align: center">{{$message}}</h2>
@enderror

<div class="login-page">
    <div class="form">
      <form class="login-form" method="POST">
          @csrf
        <input type="text" placeholder="username" name="username"/>
        @error('username') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        <input type="password" placeholder="password" name="password"/>
        @error('password') <br> <span style="color: #a60c0c">{{ $message }}</span> <br> @enderror
        <button onclick="ClickLogin()">login</button>
        <p class="message">Don't Have An Account Yet? <a href="/register">Create an account</a></p>
      </form>
    </div>
</div>

@endsection
