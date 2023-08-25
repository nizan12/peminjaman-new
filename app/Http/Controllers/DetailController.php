<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id)
    {
        $product =  Product::with(['galleries','user'])->where('slug', $id)->firstOrFail();

        // dd($product);
        return view('pages.detail',[
            'product' => $product
        ]);
    }

    public function add(Request $request, $id)
    {
       
        $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id,
            'total' => $request->total,
        ];

        $cart = Cart::where('users_id', Auth::user()->id)
                    ->where('products_id', $id)->first();


                    
        if ($cart){
           $cart->total = $cart->total + $request->total;
           $cart->save();
        } else {
            Cart::create($data);
        }

        return redirect()->route('cart');
    }
}
