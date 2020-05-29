<?php
    // создаём подключение к базе данных и проверяем на ошибку подключения
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=database_company', 'root', 'root');
    } catch (PDOException $e) {
        die('Подключение не удалось: ' . $e->getMessage());
    }

?>
