<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use function GuzzleHttp\json_decode;

class CartController extends Controller
{
    public function AddToCart(Request $request)
    {
        $name = $request->input("name");
        $owner = $request->input("owner");

        $cart = Cookie::get('cart');
        if ($cart == null) {
            $cart = [];
            $cart = json_encode($cart);
        }
        $cart = json_decode($cart);

        $items = [];

        $item_list = Cookie::get('items');
        if ($item_list != null) {
            $item_list = json_decode($item_list);

            foreach ($item_list as $item) {


                    if ($item->name == $name && $item->owner == $owner && $item->count > 0) {
                        $item->count = $item->count - 1;

                        $new_item = true;

                        foreach ($cart as $item_cart) {
                           if ($cart->name == $name) {
                               $item_cart->count = $item_cart->count + 1;
                               $new_item = false;
                           }
                        }

                        if ($new_item == true) {
                            $cart[] = (object) $cart;
                        }

                    }
                    else if ($item->owner != $owner) {

                        $item->count = $item->count - 1;


                        $cart = [];
                        $cart[] = (object) $cart;


                    }


                    $items[] = (object) $item;
            }
        }

        $cart = json_encode($cart);
        Cookie::queue('cart', $cart, 120);
        $items = json_encode($items);
        Cookie::queue('items', $items, 120);

        $user = Cookie::get('user_now');
        $user = json_decode($user);


        $items = json_decode($items);
        // return view('menu.menuId', [
        //     'var' => 'user',
        //     'user' => $user
        // ]);

        return view('menu.menuId')->with('user',$user)->with('items', $items);
    }
}
