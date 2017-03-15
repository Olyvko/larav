<?php

namespace App\Providers;

use App\Helpers\SaveEloquentOrm;
use Illuminate\Support\ServiceProvider;

class SaveStrServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singelton('App\Helpers\Contracts\SaveStr'
        $this->app->bind('App\Helpers\Contracts\SaveStr', function() {
            return new SaveEloquentOrm();
        });
        //
    }
}
