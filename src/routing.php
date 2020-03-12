<?php

add_action('rest_api_init', function () {
    if (current_user_can('editor') || current_user_can('administrator')) {

        register_rest_route('fancy-lifesaver', '/help', [
            'methods' => 'POST',
            'callback' => ['Fancy_Lifesaver_Controller', 'send_help_message'],
        ]);

    }
});
