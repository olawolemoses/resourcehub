<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('*', function( $view){
            $view->with('tagsList', \App\Models\Service::tagsList(11));
            $view->with('cart_count', \App\Helpers::get_cart_total());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->bind('path.public', function () {
            return dirname( base_path() );
        });
    }
}
