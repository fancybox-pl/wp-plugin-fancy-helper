<?php

class Fancy_Lifesaver
{
    const VERSION = FANCY_LIFESAVER_VERSION;
    const PLUGIN_URL = FANCY_LIFESAVER_PLUGIN_URL;
    const PLUGIN_DIR = FANCY_LIFESAVER_PLUGIN_DIR;
    const PLUGIN_BASENAME = FANCY_LIFESAVER_PLUGIN_BASENAME;

    private $controler;

    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'load_assets']);
        add_action('plugins_loaded', [$this, 'load_languages']);
        add_action('admin_bar_menu', [$this, 'admin_bar_item'], 1000);
        add_action('plugin_action_links_'.self::PLUGIN_BASENAME, [$this, 'plugin_action_links']);

        $this->load_controllers();
    }

    public function load_assets()
    {
        wp_enqueue_style('fancy_livesaver_css', self::PLUGIN_URL.'assets/css/style.css');
        wp_enqueue_script('fancy_livesaver_js', self::PLUGIN_URL.'assets/js/app.js');
    }

    public function load_languages()
    {
        load_plugin_textdomain('fancy-lifesaver', false, '/fancy-lifesaver/languages/');
    }

    public function load_controllers()
    {
        $this->controller = new Fancy_Lifesaver_Controller();
    }

    public function admin_bar_item(\WP_Admin_Bar $admin_bar)
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

    public function plugin_action_links(array $links_array): array
    {
        array_unshift($links_array, '<a href="#">'.__('Settings', 'fancy-lifesaver').'</a>');

        return $links_array;
    }
}
