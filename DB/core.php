<?php
function connect_table($db_name)
{
    $ini = parse_ini_file(__DIR__ . '/../vendor/settings.ini');

    $hostname = $ini['hostname'];
    $username = $ini['username'];
    $password = $ini['password'];

    $conn = new mysqli($hostname, $username, $password, $db_name);
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    return $conn;
}
?>