<?php

function EchoCommon($object)
{
    echo "<pre>";
    print_r($object);
    echo "</pre>";
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
