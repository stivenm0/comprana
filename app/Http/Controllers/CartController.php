<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('carts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        $this->authorize('author', $cart);

        return view('carts.show', [
            'cart' => $cart
        ]);
    }


}
