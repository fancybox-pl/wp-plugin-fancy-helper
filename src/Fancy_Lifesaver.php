<?php

class Fancy_Lifesaver
{
    const VERSION = FANCY_LIFESAVER_VERSION;
    const PLUGIN_URL = FANCY_LIFESAVER_PLUGIN_URL;
    const PLUGIN_DIR = FANCY_LIFESAVER_PLUGIN_DIR;
    const PLUGIN_BASENAME = FANCY_LIFESAVER_PLUGIN_BASENAME;
    const DELIVERY_ADDRESS = 'm.kosmala@fancybox.pl';

    private $adminController;
    private $frontController;

    public function __construct()
    {
        add_action('plugins_loaded', [$this, 'load_languages']);
        add_action('admin_bar_menu', [$this, 'admin_bar_link'], 1000);
        add_action('plugin_action_links_'.self::PLUGIN_BASENAME, [$this, 'plugin_action_links']);
        add_action('plugins_loaded', [$this, 'load_controllers']);
    }

    public function load_controllers()
    {
        $this->adminController = new Fancy_Lifesaver_Admin_Controller();
        $this->frontController = new Fancy_Lifesaver_Front_Controller();
    }

    public function load_languages()
    {
        load_plugin_textdomain('fancy-lifesaver', false, '/fancy-lifesaver/languages/');
    }

    public function admin_bar_link(\WP_Admin_Bar $admin_bar)
    {
        if (!is_admin() && !empty(get_option('fancy_lifesaver_admin_bar_link_visible', 1))) {
            $icon = '<span class="ab-icon dashicons dashicons-sos"></span>';
            $title = __('Help', 'fancy-lifesaver');
            $admin_bar->add_menu([
                'id' => 'fancy-lifesaver-help-button',
                'title' => $icon.' <span class="ab-label">'.$title.'</span>',
                'href' => '#',
            ]);
        }
    }

    public function plugin_action_links(array $links_array): array
    {
        $settings_url = admin_url('options-general.php?page=fancy_lifesaver');
        $settings_title = __('Settings', 'fancy-lifesaver');

        array_unshift($links_array, '<a href="'.$settings_url.'">'.$settings_title.'</a>');

        return $links_array;
    }
}
