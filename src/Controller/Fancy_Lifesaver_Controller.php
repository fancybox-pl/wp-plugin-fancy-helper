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

        $form_data = $request->get_params();
        $subject = 'Fancy Lifesaver - new issue';
        $headers = ['Content-Type: text/html; charset=UTF-8'];
        $body = '
            <p><b>'.__('Imię i nazwisko/nazwa firmy').'</b>: '.$form_data['fancy-lifesaver-name'].'</p>
            <p><b>'.__('E-mail').'</b>: '.$form_data['fancy-lifesaver-email'].'</p>
            <p><b>'.__('Telefon').'</b>: '.$form_data['fancy-lifesaver-phone'].'</p>
            <p><b>'.__('Opis problemu').'</b></p>
            '.$form_data['fancy-lifesaver-content'].'
        ';

        $result = wp_mail('m.kosmala@fancybox.pl', $subject, $body, $headers);
        if (!$result) {
            $response['status'] = 'fail';
            $response['status'] = __('Błąd podczas wysyłania wiadomości');
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
