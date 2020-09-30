<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MenuController extends Controller
{
    public function MenuId($id)
    {
        $users = Cookie::get('users');
        $user = null;
        if ($users != null) {
            $users = json_decode($users);

            foreach ($users as $user1) {

                if ($user1->blocked == false && $user1->username == $id) {
                    $user = (object) $user1;
                }
            }
        }

        return view('menu.menuId', [
            'var' => 'user',
            'user' => $user
        ]);
    }

    public function Manage(Request $request)
    {
        # code...
    }

    public function ManageId($id)
    {
        # code...
    }
}
