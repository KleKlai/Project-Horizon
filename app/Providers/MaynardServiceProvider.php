<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Maynard\Maynard;

class MaynardServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('maynard',function(){

            return new Maynard();

        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
