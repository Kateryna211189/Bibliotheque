<?php
include "header.php";
require "db.php";


$erreur = null;
@$id_livre = strip_tags($_GET['id_livre']);
@$categorie = strip_tags($_POST['categorie']);
@$auteur = strip_tags($_POST['auteur']);
@$titre = strip_tags($_POST['titre']);

    

if (isset($_POST['ajouter'])) {
    //id_livre
    if (empty($id_livre)) {
        $erreur .= "Le champ id_livre est vide <br>";
    }  elseif (strlen($id_livre) < 2 || strlen($id_livre) > 50) {   
        $erreur .= "Le champ id_livre doit contenir entre 2 et 50 caractères <br>";
        
    }
    
    //categorie
    if (empty($categorie)) {
        $erreur .= "Le champ categorie est vide <br>";
    }  elseif (strlen($categorie) < 2 || strlen($categorie) > 50) {
        $erreur .= "Le champ categorie doit contenir entre 2 et 50 caractères <br>";
    }
    //auteur
    if (empty($auteur)) {
        $erreur .= "Le champ auteur est vide <br>";
    } elseif (strlen($auteur) < 2 || strlen($auteur) > 50) {
        $erreur .= "Le champ auteur doit contenir entre 2 et 50 caractères <br>";   
    }
    //titre
    if (empty($titre)) {
        $erreur .= "Le champ titre est vide <br>";
    } elseif (strlen($titre) < 2 || strlen($titre) > 50) {
        $erreur .= "Le champ titre doit contenir entre 2 et 50 caractères <br>";    
    }


    if (empty($erreur)) {

  try {

    $statement = $pdo->prepare("INSERT INTO livre (id_livre, categorie, auteur, titre) VALUES (:id_livre, :categorie, :auteur, :titre)");
    $statement->execute([
        "id_livre" => $id_livre,
        "categorie" => $categorie,
        "auteur" => $auteur,
        "titre" => $titre
    ]); 

    header("Location: livres.php");exit;

} catch (PDOException $e) { 
    echo $e->getMessage();
}
    }
}

?>


<form action="" method="post">
     <div>
        <label class="form-label mt-4">id_livre</label> 
        <input type="text" class="form-control" aria-describedby="emailHelp" name="id_livre">
    </div>  

    <div>
        <label class="form-label mt-4">categorie</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="categorie">
    </div>
    <div>
        <label class="form-label mt-4">auteur</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="auteur">
    </div>
    <div>    
        <label class="form-label mt-4">titre</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" name="titre">
    </div>
    
    <button type="submit" class="btn btn-outline-success" name="envoyer">Ajouter le livre</button>

</form>

<?php if (!empty($erreur)) { ?>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong><?= $erreur ?></strong>
    </div>
<?php } ?>