<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use App\Models\Order;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //We pass this data to the navbar basket Via the HandleInertiaRequests middleware

       /*  Inertia::share([
            'basket' => function () {
                return Order::basket();
            },
            'total_amount' => function () {
                return Order::basket()->sum(function ($product) {
                    return $product->products->sum('total_price');
                });
            }
        ]); */
    }
}
