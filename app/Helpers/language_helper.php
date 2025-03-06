<?php
$data_language = [
    "descriptionLabel" => "Mô tả",
    "cancelButtonLabel" => "Hủy",
    "saveButtonLabel" => "Lưu",
    "imageLabel" => "Chọn ảnh",
];

function GetLanguage($key)
{
    global $data_language;
    echo "<pre>";
    print_r($data_language);
    echo "</pre>";
    // return $data_language[$key];
}
