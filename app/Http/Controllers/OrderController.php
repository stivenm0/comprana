<?php

namespace App\Http\Controllers;

use App\Events\CreateOrderEvent;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
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

    public function payOrder($id, Order $order) 
    {
        $cart = Cart::with(['products'=> function($q){
            $q->select('name', 'price', 'stock')
            ->where('stock', '>', 0);
        }])->find($id);
        
        $this->authorize('author', $cart);
        return view('orders.pay', [
            'cart'=> $cart,
            'order'=> $order
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

    public function orderComplete(Request $request, Order $order){
        $response = Http::withToken(config('services.mercadopago.token'))
        ->withUrlParameters([
            'id' => $request->payment_id,
        ])
        ->get('https://api.mercadopago.com/v1/payments/{id}');

        return $response['additional_info']['items'];

        CreateOrderEvent::dispatch($response['additional_info']['items'], $order);

        return view('orders.payComplete', [
            'status'=> "success"
        ]);
    }


}
