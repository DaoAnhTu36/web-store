<?php
function dbConnect()
{
    try {
        $db = \Config\Database::connect();
        if ($db->connect() == false) {
            echo "Kết nối thất bại!";
        }
    } catch (\Throwable $th) {
        echo $th;
    }
    return $db;
}
