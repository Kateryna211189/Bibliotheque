<?php
//var_dump($db);
include "header.php";
require "db.php";   


try {
 $sql = "SELECT * FROM livre";
    $statement = $pdo->query($sql);
    $livres = $statement->fetchAll();
    //var_dump($livres);

}
catch (PDOException $e) {
    echo $e->getMessage();
}    
?>  

<div class="container">
    <table class="table table-hover">    
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">auteur</th>
                <th scope="col">titre</th>
                <th scope="col">categorie</th>
               
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livres as $livre) {  ?>
                <tr>
                    <td><?= $livre['id_livre'] ?></td>
                    <td><?= $livre['auteur'] ?></td>
                    <td><?= $livre['titre'] ?></td>
                    <td><?= $livre['categorie'] ?></td>
                   
                    <td><a href="modification.php?id_livre=<?= $livre['id_livre'] ?>">Modifier</a></td>
                    <td><a href="./suppression.php?id_livre=<?= $livre['id_livre'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet livre?');">Supprimer</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div> 