<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;
use App\Models\favourites;
use App\Models\favourites_idea;
use App\Models\roles;
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
        view()->composer('admin.sidebar', function($view) {
            $role_get = roles::find(Auth::guard('admin')->user()->role_id);

            $view->with(compact('role_get'));
        });

        view()->composer('website.layouts', function($view) {
            $cart_items = Cart::getContent();
            if(Auth::check()){
                $favourites_count = favourites::where('customer_id',Auth::user()->id)->count();
                $favourites_idea_count = favourites_idea::where('customer_id',Auth::user()->id)->count();
                $wishlist_count = $favourites_count + $favourites_idea_count;
            }else{
                $wishlist_count = 0;
            }
            $view->with(compact('cart_items','wishlist_count'));
        });
    }
}
