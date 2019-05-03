<?php
    $pdo = new PDO("mysql:host=localhost;dbname=administracion",
            "root",
            "");

    $sentenciaSQL = $pdo->prepare("SELECT * FROM calendario");
    $sentenciaSQL->execute();

    $resultado = $sentenciaSQL -> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
?>