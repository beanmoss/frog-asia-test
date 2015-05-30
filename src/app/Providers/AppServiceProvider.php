<?php namespace App\Providers;

use App\Models\Frog;
use App\Services\FrogService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Services\FrogService', function(){
            return new FrogService(new Frog());
        });
    }
}
