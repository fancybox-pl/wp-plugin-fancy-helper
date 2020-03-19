<?php

namespace Fancybox\Fancy_Lifesaver\Controller;

use Fancybox\Fancy_Lifesaver\Fancy_Lifesaver_Kernel;

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
        wp_enqueue_style('fancy_livesaver_style', Fancy_Lifesaver_Kernel::PLUGIN_URL.'assets/css/style.css');
        wp_enqueue_script('fancy_livesaver_js', Fancy_Lifesaver_Kernel::PLUGIN_URL.'assets/js/app.js');
    }

    public function modal_template()
    {
        include_once Fancy_Lifesaver_Kernel::PLUGIN_DIR.'/templates/modal.html.php';
    }
}
