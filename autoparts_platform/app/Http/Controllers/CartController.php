<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Parts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    


    function addToCart(Request $request)
    {
        // data validation
        $user = Auth::user();
        $ownerId = Auth::id();




        $partId = $request->input('id');
            $part = Parts::where('id', $partId)->get();

            // Cart::

            if(Cart::where('part_id', $partId)->exists())
            {
                $cartCount = DB::table('carts')
            ->where('user_id', $ownerId)->count();
                return response()->json([
                    'cartCount' => $cartCount,
                    'msg' => 'Ši prekė jau yra krepšelyje'
                ]);
            }
            else
            {
                $cart = Cart::create(
                [
                    'part_id' => $partId
                ]
            );

            $cart->user()->associate($user);

            $cart->save();

            $cartCount = DB::table('carts')
            ->where('user_id', $ownerId)->count();

            $msg = 'Prekė įdėta į krepšelį';
            return response()->json([
                'cartCount' => $cartCount,
                'msg' => 'Ši prekė jau yra krepšelyje'
            ]); 
            }
    }
    function removeFromCart(Request $request)
    {
        // data validation
        $user = Auth::user();
        $ownerId = Auth::id();

        $cartId = $request->input('id');

            Cart::where('id', $cartId)->delete();

            // $cartCount = DB::table('carts')
            // ->where('user_id', $ownerId)->count();
            //     return response()->json([
            //         'cartCount' => $cartCount,
            //         'msg' => 'Ši prekė buvo panaikinta iš krepšelio'
            //     ]); 
            
    }
}
