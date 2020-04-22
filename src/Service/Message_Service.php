<?php

namespace Fancybox\Fancy_Helper\Service;

class Message_Service
{
    public function validate(array $form_data, array $files): array
    {
        $errors = [];
        if (empty($form_data['fancy-helper-name'])) {
            $errors[] = [
                'path' => 'fancy-helper-name',
                'message' => __('Empty name', 'fancy-helper'),
            ];
        }
        if (empty($form_data['fancy-helper-email'])
            || !filter_var($form_data['fancy-helper-email'], FILTER_VALIDATE_EMAIL)
        ) {
            $errors[] = [
                'path' => 'fancy-helper-email',
                'message' => __('Invalid or empty email', 'fancy-helper'),
            ];
        }
        if (empty($form_data['fancy-helper-content'])) {
            $errors[] = [
                'path' => 'fancy-helper-content',
                'message' => __('Empty content', 'fancy-helper'),
            ];
        }
        if (!isset($form_data['fancy-helper-acceptance'])) {
            $errors[] = [
                'path' => 'fancy-helper-acceptance',
                'message' => __('Missing acceptance', 'fancy-helper'),
            ];
        }
        if (!empty($files['fancy-helper-files'])
            && !empty($files['fancy-helper-files']['type'])
        ) {
            foreach ($files['fancy-helper-files']['type'] as $type) {
                if (strpos($type, 'image/') === false) {
                    $errors[] = [
                        'path' => 'fancy-helper-files[]',
                        'message' => __('Invalid file type', 'fancy-helper'),
                    ];
                }
            }
        }

        return $errors;
    }

    public function save_tmp_attachments(array $files): array
    {
        $attachments = [];
        if (!empty($files['fancy-helper-files'] && count($files['fancy-helper-files']))) {
            if (!function_exists('wp_handle_upload')) {
                require_once ABSPATH.'wp-admin/includes/file.php';
            }
            $files = $files['fancy-helper-files'];
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
