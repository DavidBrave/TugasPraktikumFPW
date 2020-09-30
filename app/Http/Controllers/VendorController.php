<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use PhpParser\Node\Stmt\Foreach_;

class VendorController extends Controller
{
    public function VendorList(Request $request)
    {
        $vendors = [];

        $users = Cookie::get('users');
        if ($users != null) {
            $users = json_decode($users);

            foreach ($users as $user) {

                if ($user->type == "vendor" && $user->confirmation == true) {
                    $vendors[] = (object) $user;
                }
            }
        }


        return view('vendor.vendor', [
            'var' => 'vendors',
            'vendors' => $vendors
        ]);
    }

    public function VendorId($id)
    {
        $users = Cookie::get('users');
        if ($users != null) {
            $users = json_decode($users);

            foreach ($users as $user) {

                if ($user->type == "vendor" && $user->confirmation == true && $user->username == $id) {
                    $vendor = (object) $user;
                }
            }
        }

        return view('vendor.vendorId', [
            'var' => 'vendor',
            'vendor' => $vendor
        ]);

    }
}
