<?php

class Fancy_Lifesaver_Front_Controller
{
    public function __construct()
    {
        if (current_user_can('administrator')) {
            add_action('wp_enqueue_scripts', [$this, 'load_assets']);
            add_action('wp_footer', [$this, 'modal_template']);
        }
    }

    public function load_assets()
    {
        wp_enqueue_style('fancy_livesaver_style', Fancy_Lifesaver::PLUGIN_URL.'assets/css/style.css');
        wp_enqueue_script('fancy_livesaver_js', Fancy_Lifesaver::PLUGIN_URL.'assets/js/app.js');
    }

    public function modal_template()
    {
        include_once Fancy_Lifesaver::PLUGIN_DIR.'/templates/modal.html.php';
    }
}
