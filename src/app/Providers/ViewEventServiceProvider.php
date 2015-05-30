<?php namespace App\Providers;


use App\Http\ViewComposers\NotificationComposer;
use Illuminate\Support\ServiceProvider;
use \View;

class ViewEventServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\Http\ViewComposers\NotificationComposer', function(){
            return new NotificationComposer();
        });
    }
}