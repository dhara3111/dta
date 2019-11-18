<?php

namespace App\Providers;

use App\Models\OurDetail;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
        View::composer('*', function ($view) {
            //
            $otherDetail = OurDetail::whereId('1')->first();
            $view->with('otherDetail',$otherDetail);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
