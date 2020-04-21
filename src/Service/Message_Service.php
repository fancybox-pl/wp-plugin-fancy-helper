<?php

namespace Fancybox\Fancy_Lifesaver\Service;

class Message_Service
{
    public function validate(array $form_data, array $files): array
    {
        $errors = [];
        if (empty($form_data['fancy-lifesaver-name'])) {
            $errors[] = [
                'path' => 'fancy-lifesaver-name',
                'message' => __('Empty name', 'fancy-lifesaver'),
            ];
        }
        if (empty($form_data['fancy-lifesaver-email'])
            || !filter_var($form_data['fancy-lifesaver-email'], FILTER_VALIDATE_EMAIL)
        ) {
            $errors[] = [
                'path' => 'fancy-lifesaver-email',
                'message' => __('Invalid or empty email', 'fancy-lifesaver'),
            ];
        }
        if (empty($form_data['fancy-lifesaver-content'])) {
            $errors[] = [
                'path' => 'fancy-lifesaver-content',
                'message' => __('Empty content', 'fancy-lifesaver'),
            ];
        }
        if (!isset($form_data['fancy-lifesaver-acceptance'])) {
            $errors[] = [
                'path' => 'fancy-lifesaver-acceptance',
                'message' => __('Missing acceptance', 'fancy-lifesaver'),
            ];
        }
        if (!empty($files['fancy-lifesaver-files'])
            && !empty($files['fancy-lifesaver-files']['type'])
        ) {
            foreach ($files['fancy-lifesaver-files']['type'] as $type) {
                if (strpos($type, 'image/') === false) {
                    $errors[] = [
                        'path' => 'fancy-lifesaver-files[]',
                        'message' => __('Invalid file type', 'fancy-lifesaver'),
                    ];
                }
            }
        }

        return $errors;
    }

    public function save_tmp_attachments(array $files): array
    {
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

                $result = wp_handle_upload($file, ['test_form' => false]);
                if (!empty($result['file'])) {
                    $attachments[] = $result['file'];
                }
            }
        }

        return $attachments;
    }

    public function remove_tmp_attachments(array $attachments)
    {
        foreach ($attachments as $attachment) {
            @unlink($attachment);
        }
    }
}
