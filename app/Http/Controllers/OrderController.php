<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function showInvoice(string $name)
    {
        $order = Order::with('user')->where('invoice', $name)->first();

        if($order && $order->invoice){
            $user = Auth::user();
            if($order->user->id === $user->id || $user->role != 'USUARIO'){
                return response()->file(Storage::disk('invoices')->path($order->invoice));
            }
        }
        abort(404);

    }


}
