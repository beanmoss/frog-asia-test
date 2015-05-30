<?php namespace App\Http\Controllers;

use App\Http\ViewComposers\NotificationComposer;
use Illuminate\Support\Facades\App;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @var NotificationComposer
     */
    protected $notify;

    public function __construct()
    {
        $this->notify = App::make('App\Http\ViewComposers\NotificationComposer');
    }
}
