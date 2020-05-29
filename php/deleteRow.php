<?php
    require 'configDB.php';

    $idTableRow = $_POST["indexRow"];

    // удаление записи
    $sql = 'DELETE FROM `employes` WHERE `id` = :del';
    $query = $pdo->prepare($sql);
    $query->execute(['del' => $idTableRow]);

    header('Location: /');

?>
