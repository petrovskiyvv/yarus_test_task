<?php
function connect_db($db_name)
{
    $ini = parse_ini_file(__DIR__ . '/settings.ini');

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