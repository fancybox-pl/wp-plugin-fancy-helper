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
            'data' => __('Wiadomość została wysłana'),
        ];

        global $wp_version;
        $form_data = $request->get_params();
        $theme = wp_get_theme();

        if (!function_exists('get_plugins')) {
            require_once ABSPATH.'wp-admin/includes/plugin.php';
        }
        $plugins = (array) get_plugins();

        $subject = 'Fancy Lifesaver - new issue';
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        $body = '
            <p><b>'.__('Imię i nazwisko/nazwa firmy').'</b>: '.$form_data['fancy-lifesaver-name'].'</p>
            <p><b>'.__('E-mail').'</b>: '.$form_data['fancy-lifesaver-email'].'</p>
            <p><b>'.__('Telefon').'</b>: '.$form_data['fancy-lifesaver-phone'].'</p>
            <p><b>'.__('Opis problemu').'</b>:</p>
            '.nl2br($form_data['fancy-lifesaver-content']).'
            <p>----- Informacje -----</p>
            <p><b>Site url</b>: '.get_option('blogname').' <a href="'.get_option('siteurl').'" target="blank">'.get_option('siteurl').'</a></p>
            <p><b>Wersja WP</b>: v'.$wp_version.'</p>
            <p><b>User Agent</b>: '.$_SERVER['HTTP_USER_AGENT'].'</p>
            <p><b>Theme</b>: '.$theme->display('Name').' v'.$theme->display('Version').'</p>
            <p><b>Plugins</b>:</p>
            <ul>
        ';
        foreach ($plugins as $plugin) {
            $body .= '<li>'.$plugin['Name'].' v'.$plugin['Version'].'</li>';
        }
        $body .= '</ul>';
        $body .= '<p><b>PHP version</b>: '.phpversion().'</p>';

        $result = wp_mail('m.kosmala@fancybox.pl', $subject, $body, $headers);
        if (!$result) {
            $response['status'] = 'fail';
            $response['data'] = __('Błąd podczas wysyłania wiadomości');
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
