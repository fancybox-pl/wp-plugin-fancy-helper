<?php

add_action('rest_api_init', function () {
    register_rest_route('fancy-lifesaver', '/help', [
        'methods' => 'POST',
        'callback' => ['Fancy_Lifesaver_Controller', 'send_help_message'],
    ]);
});
