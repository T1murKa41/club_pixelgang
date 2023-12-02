<?php
    $host = 'localhost';
    $db_name = 'soldatov';
    $db_user = 'root';
    $db_pass = 'mysql';
    $charset = 'utf8';

    // Устанавливает атрибут объекту PDO.
    // ATTR_ERRMODE - Режим сообщения об ошибках PDO.
    // PDO::ERRMODE_EXCEPTION - Выбрасывает PDOException.
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
?>