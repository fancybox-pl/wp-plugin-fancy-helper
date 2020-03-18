<?php

class Fancy_Lifesaver_Controller
{
    public function __construct()
    {
        add_action('admin_footer', [$this, 'widget_template']);
        add_action('admin_footer', [$this, 'modal_template']);
    }

    public function send_help_message(\WP_REST_Request $request)
    {
        $response = [
            'status' => 'success',
            'data' => __('Message was send', 'fancy-lifesaver'),
        ];

        global $wp_version;
        $form_data = $request->get_params();
        $theme = wp_get_theme();

        if (!function_exists('get_plugins')) {
            require_once ABSPATH.'wp-admin/includes/plugin.php';
        }
        $plugins = (array) get_plugins();

        $subject = __('Fancy Lifesaver - new issue', 'fancy-lifesaver');
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        $body = '
            <p><b>'.__('Name and surname / company name', 'fancy-lifesaver').'</b>: '.$form_data['fancy-lifesaver-name'].'</p>
            <p><b>'.__('Contact email address', 'fancy-lifesaver').'</b>: '.$form_data['fancy-lifesaver-email'].'</p>
            <p><b>'.__('Phone number', 'fancy-lifesaver').'</b>: '.$form_data['fancy-lifesaver-phone'].'</p>
            <p><b>'.__('Description of the problem', 'fancy-lifesaver').'</b>:</p>
            '.nl2br($form_data['fancy-lifesaver-content']).'
            <p>-------------------- <b>'.__('System Info', 'fancy-lifesaver').'</b> --------------------</p>
            <p><b>'.__('Site url', 'fancy-lifesaver').'</b>: '.get_option('blogname').' <a href="'.get_option('siteurl').'" target="blank">'.get_option('siteurl').'</a></p>
            <p><b>'.__('Send from url', 'fancy-lifesaver').'</b>: <a href="'.$form_data['fancy-lifesaver-url'].'" target="blank">'.$form_data['fancy-lifesaver-url'].'</a></p>
            <p><b>'.__('WP version', 'fancy-lifesaver').'</b>: v'.$wp_version.'</p>
            <p><b>'.__('User Agent', 'fancy-lifesaver').'</b>: '.$_SERVER['HTTP_USER_AGENT'].'</p>
            <p><b>'.__('Theme', 'fancy-lifesaver').'</b>: '.$theme->display('Name').' - v'.$theme->display('Version').'</p>
            <p><b>'.__('Installed plugins', 'fancy-lifesaver').'</b>:</p>
            <ul>
        ';
        foreach ($plugins as $plugin) {
            $body .= '<li>'.$plugin['Name'].' - v'.$plugin['Version'].'</li>';
        }
        $body .= '</ul>';
        $body .= '<p><b>'.__('PHP version', 'fancy-lifesaver').'</b>: '.phpversion().'</p>';

        $result = wp_mail(Fancy_Lifesaver::DELIVERY_ADDRESS, $subject, $body, $headers);
        if (!$result) {
            $response['status'] = 'fail';
            $response['data'] = __('Occurred error', 'fancy-lifesaver');
        }

        return $response;
    }

    public function widget_template()
    {
        include_once Fancy_Lifesaver::PLUGIN_DIR.'/templates/widget.html.php';
    }

    public function options_template()
    {
        include_once Fancy_Lifesaver::PLUGIN_DIR.'/templates/options.html.php';
    }

    public function modal_template()
    {
        include_once Fancy_Lifesaver::PLUGIN_DIR.'/templates/modal.html.php';
    }
}
