<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Livewire\Order;
use App\Models\Cart;
use App\Models\Order as ModelsOrder;
use App\Policies\ResourcePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Cart::class => ResourcePolicy::class,
        ModelsOrder::class => ResourcePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
