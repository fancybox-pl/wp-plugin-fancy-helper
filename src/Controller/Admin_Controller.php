<?php

namespace Fancybox\Fancy_Lifesaver\Controller;

use Fancybox\Fancy_Lifesaver\Kernel;

class Admin_Controller
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'load_assets']);
        add_action('admin_menu', [$this, 'options_page']);
        add_action('admin_init', [$this, 'options_register']);
        add_action('admin_footer', [$this, 'widget_template']);
        add_action('admin_footer', [$this, 'modal_template']);
    }

    public function load_assets()
    {
        wp_enqueue_style('fancy_livesaver_style', Kernel::PLUGIN_URL.'assets/css/style.css');
        wp_enqueue_style('fancy_livesaver_style_widget', Kernel::PLUGIN_URL.'assets/css/widget.css');
        wp_enqueue_script('fancy_livesaver_js', Kernel::PLUGIN_URL.'assets/js/app.js');
    }

    public function options_page()
    {
        add_options_page(
            'Fancy Lifesaver '.__('Settings', 'fancy-lifesaver'),
            'Fancy Lifesaver',
            'manage_options',
            'fancy_lifesaver',
            [$this, 'options_template']
        );
    }

    public function options_register()
    {
        register_setting('fancy_lifesaver_plugin_page', 'fancy_lifesaver_lifebuoy_visible');
        register_setting('fancy_lifesaver_plugin_page', 'fancy_lifesaver_admin_bar_link_visible');
    }

    public function options_template()
    {
        include_once Kernel::PLUGIN_DIR.'/templates/options.html.php';
    }

    public function widget_template()
    {
        include_once Kernel::PLUGIN_DIR.'/templates/widget.html.php';
    }

    public function modal_template()
    {
        include_once Kernel::PLUGIN_DIR.'/templates/modal.html.php';
    }
}
