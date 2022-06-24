<?php
function connect_table($table_name)
{
    $hostname = "имя хоста, на котором находится база данных";
    $username = "имя пользователя";
    $password = "пароль пользователя";

    $conn = new mysqli($hostname, $username, $password, $table_name);
    if ($conn->connect_error) {
        die("Ошибка: " . $conn->connect_error);
    }
    return $conn;
}
?>