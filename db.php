<?php
$host = "localhost";
$user = "root";     // Имя пользователя БД
$password = "root";     // Пароль БД
$dbname = "training_center";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
?>
