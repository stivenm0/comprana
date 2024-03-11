<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('orders.index', [
            'orderStatus' => Order::STATUS
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $cart = Cart::find($id);
        $this->authorize('author', $cart);
        return view('orders.create', [
            'cart'=> $cart
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


}
