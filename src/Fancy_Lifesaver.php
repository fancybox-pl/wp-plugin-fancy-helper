<?php

class Fancy_Lifesaver
{
    const VERSION = FANCY_LIFESAVER_VERSION;
    const PLUGIN_URL = FANCY_LIFESAVER_PLUGIN_URL;
    const PLUGIN_DIR = FANCY_LIFESAVER_PLUGIN_DIR;

    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'load_assets']);
        add_action('admin_footer', [$this, 'render_template']);
        add_action('admin_bar_menu', [$this, 'admin_bar_item'], 1000);
        add_action('plugins_loaded', [$this, 'load_languages']);
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

    public function admin_bar_item($admin_bar)
    {
        if (!is_admin()) {
            $icon = '<span class="ab-icon dashicons dashicons-sos"></span>';
            $admin_bar->add_menu([
                'id'    => 'fb-help-button',
                'title' => $icon.' <span class="ab-label">'.__('Help', 'fancy-lifesaver').'</span>',
                'href'  => '#',
            ]);
        }
    }

    public function load_languages()
    {
        load_plugin_textdomain('fancy-lifesaver', FALSE, '/fancy-lifesaver/languages/' );
    }
}
