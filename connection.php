<?php
include "header.php";


//connection
if (isset($_POST["connection"])) {
   // var_dump($_POST);
   $sql = "SELECT * FROM abonne WHERE mail = :mail AND mot_de_passe = :mot_de_passe";
   $statement = $pdo->prepare($sql);
   $statement->execute([
       "mail" => $_POST["mail"],
       "mot_de_passe" => $_POST["mot_de_passe"]
   ]);
   $abonne = $statement->fetch();
}
if ($abonne && password_verify($mot_de_passe, $abonne['mot_de_passe'])) {
    $_SESSION["abonne"] = $abonne;
    header("Location: index.php");
    exit;
} else {
    $error = "Identifiant ou mot de passe incorrect";
}
?>
<form action="" method="post">
    <div>
        <label class="form-label mt-4">Email</label>
        <input type="email" class="form-control" aria-describedby="emailHelp" name="mail">
    </div>
    <div>
        <label class="form-label mt-4">Mot de passe</label>
        <input type="password" class="form-control" aria-describedby="emailHelp" name="mot_de_passe">
    </div>
    <button type="submit" class="btn btn-outline-success" name="connection">Connection</button>
</form>
<?php if (!empty($error)) { ?>
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong><?= $error ?></strong>
    </div>
<?php } ?>  
