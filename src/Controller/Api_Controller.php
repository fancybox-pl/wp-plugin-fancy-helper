<?php

namespace Fancybox\Fancy_Helper\Controller;

use Fancybox\Fancy_Helper\Kernel;
use Fancybox\Fancy_Helper\Service\Message_Service;

class Api_Controller
{
    public function send_help_message(\WP_REST_Request $request)
    {
        $message_service = new Message_Service();
        $form_data = $request->get_params();
        $files = $request->get_file_params();

        $errors = $message_service->validate($form_data, $files);
        if (count($errors)) {
            return [
                'status' => 'fail',
                'data' => __('Form has errors', 'fancy-helper'),
                'errors' => $errors,
            ];
        }

        $subject = __('Fancy Helper - new issue', 'fancy-helper');
        $headers = ['Content-Type: text/html; charset=UTF-8'];

        global $wp_version;
        $theme = wp_get_theme();
        $body = '
            <p><b>'.__('Name and surname / company name', 'fancy-helper').'</b>: '.$form_data['fancy-helper-name'].'</p>
            <p><b>'.__('Contact email address', 'fancy-helper').'</b>: '.$form_data['fancy-helper-email'].'</p>
            <p><b>'.__('Phone number', 'fancy-helper').'</b>: '.$form_data['fancy-helper-phone'].'</p>
            <p><b>'.__('Description of the problem', 'fancy-helper').'</b>:</p>
            '.nl2br($form_data['fancy-helper-content']).'
            <p>-------------------- <b>'.__('System Info', 'fancy-helper').'</b> --------------------</p>
            <p><b>'.__('User Agent', 'fancy-helper').'</b>: '.$_SERVER['HTTP_USER_AGENT'].'</p>
            <p><b>'.__('Screen resolution', 'fancy-helper').'</b>: '.$form_data['fancy-helper-screen'].'</p>
            <p><b>'.__('Site url', 'fancy-helper').'</b>: '.get_option('blogname').' <a href="'.get_option('siteurl').'" target="blank">'.get_option('siteurl').'</a></p>
            <p><b>'.__('Send from url', 'fancy-helper').'</b>: <a href="'.$form_data['fancy-helper-url'].'" target="blank">'.$form_data['fancy-helper-url'].'</a></p>
            <p><b>'.__('WP version', 'fancy-helper').'</b>: v'.$wp_version.'</p>
            <p><b>'.__('Theme', 'fancy-helper').'</b>: '.$theme->display('Name').' - v'.$theme->display('Version').'</p>
            <p><b>'.__('Installed plugins', 'fancy-helper').'</b>:</p>
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
        $body .= '<p><b>'.__('PHP version', 'fancy-helper').'</b>: '.phpversion().'</p>';

        $attachments = $message_service->save_tmp_attachments($files);

        $result = wp_mail($_ENV['fancy_helper_delivery_address'], $subject, $body, $headers, $attachments);

        $message_service->remove_tmp_attachments($attachments);

        if (!$result) {
            $response['status'] = 'fail';
            $response['data'] = __('Occurred error', 'fancy-helper');
        } else {
            $response['status'] = 'success';
            $response['data'] = __('Message was send', 'fancy-helper');
        }

        return $response;
    }
}
