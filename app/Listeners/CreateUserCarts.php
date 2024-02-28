<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class CreateUserCarts
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $carts = [];

        for ($i = 0; $i < 8; $i++) {
            $carts[] = [
                'user_id' => $event->user->id,
                'name' => "Carrito". $i + 1,
                'active' => $i === 0 ? true : false
            ];
        }

        DB::table('carts')->insert($carts);
    }
}
