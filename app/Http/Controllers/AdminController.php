<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    public function AllUser(Request $request)
    {

        $users = Cookie::get('users');
        if ($users == null) {
            $users = [];
            $users = json_encode($users);
        }

        $users = json_decode($users);


        return view('admin.adminAllUser', [
            'var' => 'users',
            'users' => $users
        ]);
    }

    public function BlockUser(Request $request)
    {
        $id = $request->input("hidden");


        $users = Cookie::get('users');
        if ($users != null) {
            $users = json_decode($users);

            foreach ($users as $user) {

                if ($id == $user->username) {
                    if ($user->blocked == true) {
                        $user->blocked = false;
                    }
                    else {
                        $user->blocked = true;
                    }
                }
            }
            $users = json_encode($users);
            Cookie::queue('users', $users, 120);
        }

        $users = json_decode($users);

        return view('admin.adminAllUser', [
            'var' => 'users',
            'users' => $users
        ]);


    }

    public function NewVendor(Request $request)
    {
        $vendors = [];

        $users = Cookie::get('users');
        if ($users != null) {
            $users = json_decode($users);

            foreach ($users as $user) {

                if ($user->type == "vendor") {
                    $vendors[] = (object) $user;
                }
            }
        }


        return view('admin.adminNewVendor', [
            'var' => 'vendors',
            'vendors' => $vendors
        ]);
    }

    public function ConfirmNewVendor(Request $request)
    {
        $id = $request->input("hidden");

        $vendors = [];

        $users = Cookie::get('users');
        if ($users != null) {
            $users = json_decode($users);

            foreach ($users as $user) {

                if ($user->type == "vendor") {
                    if ($id == $user->username) {
                        $user->confirmation = true;
                    }
                    $vendors[] = (object) $user;
                }
            }
        }

        $users = json_encode($users);
        Cookie::queue('users', $users, 120);

        // dump($user->username);
        // dd($id);

        //return redirect('admin/vendor/new');

        return view('admin.adminNewVendor', [
            'var' => 'vendors',
            'vendors' => $vendors
        ]);
    }
}
