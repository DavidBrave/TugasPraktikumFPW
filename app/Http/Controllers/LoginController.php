<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Schema;


class LoginController extends Controller
{
    public function Tes()
    {
        $users = Cookie::get('users');
        dump($users);
        $users = json_encode($users);
        dd($users);
    }

    public function Index()
    {
        return view("login");
    }

    public function ShowRegister()
    {
        return view("register");
    }

    public function Register(Request $request)
    {

        $username = $request->input("username");
        $password = $request->input("password");
        $confirm = $request->input("confirmation");
        $email = $request->input("email");
        $fullname = $request->input("fullname");
        $address = $request->input("address");
        $description = $request->input("description");
        $type = $request->get('vendor', "user");


        if ($type != "user") {
            $type = "vendor";
        }
        $false = false;
        $true = true;

        $users = Cookie::get('users');
        if ($users == null) {
            $users = [];
            $users = json_encode($users);
        }

        $users = json_decode($users);

        foreach ($users as $user) {
            if ($username == $user->username) {
                return redirect()->back()->withInput()->withErrors(['unique' =>'User Already Registered']);
            }
        }

        $request->validate([
            "username" => "required",
            "password" => "required | min:8 | regex:/[a-z]/ | regex:/[A-Z]/ | regex:/[0-9]/",
            "confirmation"=> "required | same:password",
            "email"=> "required | email",
            "fullname"=> "required|regex:/^[a-zA-Z ]+$/",
            "address"=> "required | regex:/[a-z]/ | regex:/[A-Z]/ | regex:/[0-9]/",
            "description"=> "required_if:vendor,on"

        ]);



        if ($password != $confirm) {
            //return redirect()->back()->withInput()->withErrors(['Bisa cek error dan return variable, tapi function ->withInput() tidak mau']);
        }
        else {


            $users[] = (object)[
                'username' => $username,
                'password' => $password,
                'email' => $email,
                'fullname' => $fullname,
                'address' => $address,
                'description' => $description,
                'type' => $type,
                'confirmation' => $false,
                //'confirmation' => $true,
                'blocked' => $false
            ];

            $users = json_encode($users);
            Cookie::queue('users', $users, 120);

            return redirect('/register');



        }
    }

    public function Login(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required"

        ]);

        $username = $request->input("username");
        $password = $request->input("password");

        $users = Cookie::get('users');
        if ($users == null) {
            $users = [];
            $users = json_encode($users);
        }

        $users = json_decode($users);

        if ($username == $password && $username == "admin") {
            return redirect('/admin/vendor/new');
        }

        foreach ($users as $user) {
            if ($username == $user->username && $password == $user->password) {
                $id = $user->username;
                if ($user->type == "vendor") {
                    if ($user->blocked == false) {

                        $con = "Not Yet Confirmed, Button Will Not Be Functioning";
                        if($user->confirmation) {
                            $con = "";
                        }
                        $user_now = json_encode($user);
                        Cookie::queue('user_now', $user_now, 120);
                        return redirect()->route('vendor', ['id' => $id])->withErrors(['con' => $con]);
                    }

                }
                else {
                    if ($user->blocked == false) {

                        $con = "true";

                        $user_now = json_encode($user);
                        Cookie::queue('user_now', $user_now, 120);
                        return redirect()->route('user', ['id' => $id])->withErrors(['con' => $con]);
                    }
                }


            }
        }

        return redirect('/login')->withErrors(['unique' =>'Username or Password Incorrect']);;
    }

    public function Logout()
    {
        Cookie::queue(Cookie::forget('cart'));
        return redirect('/login')->withCookie(Cookie::forget('user_now'));
    }

}
