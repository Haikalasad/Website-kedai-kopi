<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('templates.main', function ($view) {
            $cartItemCount = 0;

            if (Auth::check()) {
                $cart = Cart::where('user_id', Auth::id())->first();

                if ($cart) {
                    $cartItemCount = $cart->items()->distinct('coffee_id')->count('coffee_id');
                }
            }

            $view->with('cartItemCount', $cartItemCount);
        });
    }
}
