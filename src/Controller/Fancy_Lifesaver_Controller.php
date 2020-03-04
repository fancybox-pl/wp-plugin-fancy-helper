<?php

class Fancy_Lifesaver_Controller
{
    public function __construct()
    {
        add_action('admin_footer', [$this, 'widget_template']);
    }

    public function widget_template()
    {
        include_once Fancy_Lifesaver::PLUGIN_DIR.'/templates/widget.html.php';
    }

    public function options_template()
    {
        $options = get_option('fancy_lifesaver_settings');

        include_once Fancy_Lifesaver::PLUGIN_DIR.'/templates/options.html.php';
    }
}
