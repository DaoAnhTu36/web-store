<?php

use CodeIgniter\Email\Email;

function EchoCommon($object)
{
    echo "<pre>";
    print_r($object);
    echo "</pre>";
    exit;
}

function GetLimitAndOffsetPagination($size, $page)
{
    $offset = ($page - 1) * $size;
    $limit = $size;
    return [
        'limit' => $limit,
        'offset' => $offset
    ];
}

function convert_vi_to_slug($str)
{
    $str = mb_strtolower($str, 'UTF-8');
    $str = preg_replace([
        '/(á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ)/u',
        '/(é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ)/u',
        '/(í|ì|ỉ|ĩ|ị)/u',
        '/(ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ)/u',
        '/(ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự)/u',
        '/(ý|ỳ|ỷ|ỹ|ỵ)/u',
        '/(đ)/u',
    ], [
        'a',
        'e',
        'i',
        'o',
        'u',
        'y',
        'd'
    ], $str);

    $str = preg_replace('/[^a-z0-9\s]/', '', $str);
    $str = preg_replace('/\s+/', '-', $str);
    $str = trim($str, '-');
    return $str;
}

function convert_decimal_to_int($number)
{
    return ($number == floor($number)) ? (int) $number : (float) $number;
}

function format_datetime_input($datetime, $format = 'Y-m-d\TH:i')
{
    if (empty($datetime) || $datetime == '0000-00-00 00:00:00') {
        return '';
    }
    $dateTimeObj = new DateTime($datetime);
    return $dateTimeObj->format($format);
}

function get_current_datetime_local()
{
    $now = new DateTime();
    return $now->format('Y-m-d\TH:i'); // Định dạng chuẩn cho datetime-local
}

function get_current_datetime()
{
    $date = new DateTime();
    return $date->format('d-m-Y H:i');
}

function format_currency($number, $currency = '')
{
    if (empty($currency)) {
        return number_format($number, 0, ',', '.');
    }
    return number_format($number, 0, ',', '.') . ' ' . $currency;
}

function get_number_format_currency($number_str)
{
    if (!empty($number_str)) {
        return str_replace('.', '', $number_str);
    }
    return $number_str;
}

function get_validate_upload_file($files)
{
    $has_file = false;
    if (isset($files['images'])) {
        $validFiles = [];
        foreach ($files['images'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $validFiles[] = $file;
            }
        }

        if (!empty($validFiles)) {
            $has_file = true;
        }
    }
    if ($has_file) {
        $rule_value = 'uploaded[images]|max_size[images,150]|is_image[images]|mime_in[images,image/jpg,image/jpeg,image/png]';
        $web_configs = session()->get('web_configs');
        if ($web_configs) {
            $rule_upload = isset($web_configs['max_upload_size']) ? $web_configs['max_upload_size'] : 150;
            $option_size = '|max_size[images,' . $rule_upload . ']';
            $rule_value = 'uploaded[images]' . $option_size;
            if (isset($web_configs['allowed_file_types']) && $web_configs['allowed_file_types']) {
                $rule_file = 'images';
                foreach (explode(',', $web_configs['allowed_file_types']) as $value) {
                    $rule_file .= ',image/' . trim($value);
                }
                $option_file = '|is_image[images]|mime_in[' . $rule_file . ']';
                $rule_value .= $option_file;
            }
        }
        return $rule_value;
    }
    return '';
}

function get_message_error_file()
{
    return  [
        'uploaded' => 'Vui lòng chọn một tệp ảnh.',
        'is_image' => 'Tệp phải là hình ảnh.',
        'max_size' => 'Dung lượng ảnh không được quá 2MB.',
        'mime_in'  => 'Chỉ chấp nhận các định dạng JPG, JPEG, PNG.',

    ];
}

function send_mail_native($mail_to, $template)
{
    $email = \Config\Services::email();
    $email->setTo($mail_to);
    $email->setMessage($template);
    if ($email->send()) {
        return true;
    } else {
        print_r($email->printDebugger());
        return false;
    }
}

function get_image($image_str, $charactor = ',')
{
    $result = array();
    if (empty($image_str)) {
        return '';
    }
    $result = explode($charactor, $image_str);
    if (count($result) > 0) {
        return $result[0];
    }
    return '';
}

function get_image_array($image_str, $charactor = ',')
{
    $result = array();
    if (empty($image_str)) {
        return '';
    }
    $result = explode($charactor, $image_str);
    return $result;
}

function get_current_symboy()
{
    return '₫';
}
