<?php

namespace Fancybox\Fancy_Lifesaver;

use Fancybox\Fancy_Lifesaver\Controller\Fancy_Lifesaver_Api_Controller;

class Fancy_Lifesaver_Router
{
    public function __construct()
    {
        $this->admin_routes();
    }

    public function admin_routes()
    {
        if (!current_user_can('administrator')) {
            return null;
        }

        register_rest_route('fancy-lifesaver', '/help', [
            'methods' => 'POST',
            'callback' => [Fancy_Lifesaver_Api_Controller::class, 'send_help_message'],
        ]);
    }
}
