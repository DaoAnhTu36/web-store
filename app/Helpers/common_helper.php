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
