<?php

include "header.php";
require "db.php";

$erreur = null;

@$id_livre = strip_tags($_GET['id_livre']);
@$auteur = strip_tags($_POST['auteur']);
@$titre = strip_tags($_POST['titre']);
@$categorie = strip_tags($_POST['categorie']);

$livre = $pdo->prepare("SELECT * FROM livre WHERE id_livre = :id_livre");
$livre->execute([
    "id_livre" => $id_livre
]);
$livre = $livre->fetch();

if (isset($_POST['envoyer'])) {
    //auteur
    if (empty($auteur)) {
        $erreur .= "Le champ auteur est vide <br>";
    }
    //titre
    if (empty($titre)) {
        $erreur .= "Le champ titre est vide <br>";
    }
    //categorie 
    if (empty($categorie)) {
        $erreur .= "Le champ categorie est vide <br>";
    }
    

    if (empty($erreur)) {
        $stat = $pdo->prepare("UPDATE livre SET auteur = :auteur, titre = :titre, categorie = :categorie WHERE id_livre = :id_livre");
        $stat->execute([
            "id_livre" => $id_livre,
            "auteur" => $auteur,
            "titre" => $titre,
            "categorie" => $categorie
        ]);

        header("location: livres.php");
    }

}
?>
<form action="" method="post">
    <div>
        <label class="form-label mt-4">categorie</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="categorie" value="<?= $livre['categorie'] ?>">
    </div>                                  
    <div>                                    
        <label class="form-label mt-4">auteur</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="auteur" value="<?= $livre['auteur'] ?>">
    </div>                                  
    <div>
        <label class="form-label mt-4">titre</label>        
        <input type="text" class="form-control" aria-describedby="emailHelp" name="titre" value="<?= $livre['titre'] ?>">

    </div>      

    <button type="submit" class="btn btn-outline-success" name="envoyer">Ajouter le livre</button>
</form>


<?php if (!empty($erreur)) { ?>
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Warning!</h4>
        <ul><?php echo $erreur; ?></ul>
    </div>
<?php } ?>
