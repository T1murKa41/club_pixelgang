<?php
    require_once 'setting.php';

    try {
        $pdo = new PDO("mysql:host=$host; dbname=$db_name;charset=$charset", 
                        $db_user, $db_pass, $options);
    } catch (PDOException $ex) {
        die("Ошибка подключения к базе: $ex");
    }
?>