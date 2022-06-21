<?php
function connect_table($table_name)
{
    $hostname = "";
    $username = "";
    $password = "";

    $conn = new mysqli($hostname, $username, $password, $table_name);
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    return $conn;
}
?>