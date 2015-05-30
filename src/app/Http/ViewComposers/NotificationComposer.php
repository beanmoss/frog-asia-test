<?php namespace App\Http\ViewComposers;

use \Session;

class NotificationComposer {

    protected $notifications = [];

    public function addFlash($message = '', $type = 'info')
    {
        $this->notifications[] = [
            'message' => $message,
            'type' => $type
        ];
        Session::flash('notifications', $this->notifications);
    }

    public function add($message = '', $type = 'info')
    {
        $this->notifications[] = [
            'message' => $message,
            'type' => $type
        ];
    }
} 