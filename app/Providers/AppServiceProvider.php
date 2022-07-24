<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;
use App\Models\favourites;
use Auth;

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
        view()->composer('website.layouts1', function($view) {
            $cart_items = Cart::getContent();
            if(Auth::check()){

                $wishlist_count = favourites::where('customer_id',Auth::user()->id)->count();
            }else{
                $wishlist_count = 0;

            }
            $view->with(compact('cart_items','wishlist_count'));
        });
    }
}
