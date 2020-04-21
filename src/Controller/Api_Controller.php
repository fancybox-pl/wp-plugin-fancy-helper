<?php

namespace Fancybox\Fancy_Lifesaver\Controller;

use Fancybox\Fancy_Lifesaver\Kernel;

class Api_Controller
{
    public function send_help_message(\WP_REST_Request $request)
    {
        $form_data = $request->get_params();
        $files = $request->get_file_params();

        $attachments = [];
        if (!empty($files['fancy-lifesaver-files'] && count($files['fancy-lifesaver-files']))) {
            if (!function_exists('wp_handle_upload')) {
                require_once ABSPATH.'wp-admin/includes/file.php';
            }
            $files = $files['fancy-lifesaver-files'];
            foreach ($files['name'] as $key => $value) {
                $file = [
                    'name' => $files['name'][$key],
                    'type' => $files['type'][$key],
                    'tmp_name' => $files['tmp_name'][$key],
                    'error' => $files['error'][$key],
                    'size' => $files['size'][$key]
                ];

                $res = wp_handle_upload($file, ['test_form' => false]);
                if (!empty($res['file'])) {
                    $attachments[] = $res['file'];
                }
            }
        }

        $subject = __('Fancy Lifesaver - new issue', 'fancy-lifesaver');
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        global $wp_version;
        $theme = wp_get_theme();
        $body = '
            <p><b>'.__('Name and surname / company name', 'fancy-lifesaver').'</b>: '.$form_data['fancy-lifesaver-name'].'</p>
            <p><b>'.__('Contact email address', 'fancy-lifesaver').'</b>: '.$form_data['fancy-lifesaver-email'].'</p>
            <p><b>'.__('Phone number', 'fancy-lifesaver').'</b>: '.$form_data['fancy-lifesaver-phone'].'</p>
            <p><b>'.__('Description of the problem', 'fancy-lifesaver').'</b>:</p>
            '.nl2br($form_data['fancy-lifesaver-content']).'
            <p>-------------------- <b>'.__('System Info', 'fancy-lifesaver').'</b> --------------------</p>
            <p><b>'.__('User Agent', 'fancy-lifesaver').'</b>: '.$_SERVER['HTTP_USER_AGENT'].'</p>
            <p><b>'.__('Screen resolution', 'fancy-lifesaver').'</b>: '.$form_data['fancy-lifesaver-screen'].'</p>
            <p><b>'.__('Site url', 'fancy-lifesaver').'</b>: '.get_option('blogname').' <a href="'.get_option('siteurl').'" target="blank">'.get_option('siteurl').'</a></p>
            <p><b>'.__('Send from url', 'fancy-lifesaver').'</b>: <a href="'.$form_data['fancy-lifesaver-url'].'" target="blank">'.$form_data['fancy-lifesaver-url'].'</a></p>
            <p><b>'.__('WP version', 'fancy-lifesaver').'</b>: v'.$wp_version.'</p>
            <p><b>'.__('Theme', 'fancy-lifesaver').'</b>: '.$theme->display('Name').' - v'.$theme->display('Version').'</p>
            <p><b>'.__('Installed plugins', 'fancy-lifesaver').'</b>:</p>
            <ul>
        ';
        if (!function_exists('get_plugins')) {
            require_once ABSPATH.'wp-admin/includes/plugin.php';
        }
        $plugins = (array) get_plugins();
        foreach ($plugins as $plugin) {
            $body .= '<li>'.$plugin['Name'].' - v'.$plugin['Version'].'</li>';
        }
        $body .= '</ul>';
        $body .= '<p><b>'.__('PHP version', 'fancy-lifesaver').'</b>: '.phpversion().'</p>';

        $result = wp_mail($_ENV['fancy_lifesaver_delivery_address'], $subject, $body, $headers, $attachments);
        foreach ($attachments as $attachment) {
            @unlink($attachment);
        }

        $response = [
            'status' => null,
            'data' => null,
        ];
        if (!$result) {
            $response['status'] = 'fail';
            $response['data'] = __('Occurred error', 'fancy-lifesaver');
        } else {
            $response['status'] = 'success';
            $response['data'] = __('Message was send', 'fancy-lifesaver');
        }

        return $response;
    }
}
