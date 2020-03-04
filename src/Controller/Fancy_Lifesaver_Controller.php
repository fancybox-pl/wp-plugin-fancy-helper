<?php

class Fancy_Lifesaver_Controller
{
    public function __construct()
    {
        add_action('admin_footer', [$this, 'render_template']);
    }

    public function render_template()
    {
        include_once Fancy_Lifesaver::PLUGIN_DIR.'/templates/base.html.php';
    }
}
