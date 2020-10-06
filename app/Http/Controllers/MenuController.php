<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MenuController extends Controller
{
    public function MenuId($id)
    {

        $items = [];

        $item_list = Cookie::get('items');
        if ($item_list != null) {
            $item_list = json_decode($item_list);

            foreach ($item_list as $item) {

                    $items[] = (object) $item;
            }
        }



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

        // return view('menu.menuId', [
        //     'var' => 'user',
        //     'user' => $user
        // ]);

        return view('menu.menuId')->with('user',$user)->with('items', $items);
    }

    public function Manage(Request $request)
    {


        //return redirect()->route('vendor', ['id' => $id]);
    }

    public function ManagingId(Request $request)
    {

        $request->validate([
            "item_name" => "required",
            "item_count" => "required | numeric| min:0",
            "item_price"=> "required | numeric | min:0"
        ]);

        $user_now = Cookie::get('user_now');
        $user_now = json_decode($user_now);

        $name = $request->input("item_name");
        $count = $request->input("item_count");
        $price = $request->input("item_price");
        $desc = $request->input("item_desc");


        $items = Cookie::get('items');
        if ($items == null) {
            $items = [];
            $items = json_encode($items);
        }

        $items = json_decode($items);

        $items[] = (object)[
            'name' => $name,
            'count' => $count,
            'price' => $price,
            'desc' => $desc,
            'owner' => $user_now->username
        ];

        $items = json_encode($items);
        Cookie::queue('items', $items, 120);

        return redirect()->route('manage', ['id' => $user_now->username]);
    }

    public function ManageId($id)
    {



        $user_now = Cookie::get('user_now');
        $user_now = json_decode($user_now);

        return view('menu.menuManageId', [
            'var' => 'user',
            'user' => $user_now
        ]);



    }
}
