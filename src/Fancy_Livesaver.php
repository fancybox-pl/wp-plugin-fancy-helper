<?php

class Fancy_Livesaver
{
    const VERSION = FANCY_LIFESAVER_VERSION;
    const PLUGIN_URL = FANCY_LIFESAVER_PLUGIN_URL;
    const PLUGIN_DIR = FANCY_LIFESAVER_PLUGIN_DIR;

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        add_action('admin_enqueue_scripts', [$this, 'load_assets']);
        add_action('admin_footer', [$this, 'render_template']);
    }

    public function load_assets()
    {
        wp_enqueue_style('fancy_livesaver_css', self::PLUGIN_URL.'assets/css/style.css');
        wp_enqueue_script('fancy_livesaver_js', self::PLUGIN_URL.'assets/js/app.js');
    }

    public function render_template()
    {
        include_once self::PLUGIN_DIR.'/templates/base.html.php';
    }
}
