<?php

require "db.php";

//var_dump($_GET);

try {
    $stat = $pdo->prepare("DELETE FROM livre WHERE id_livre = :id");
    $stat->execute([
        "id" => $_GET["id_livre"]
    ]);

    header("Location: livres.php");exit;

} catch (PDOException $e) {
    echo $e->getMessage();
}