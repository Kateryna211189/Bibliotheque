<?php

include 'header.php';



if (isset($_POST["envoyer"])) {
    $error = "";
    

    if (empty($_POST['nom'])) {
        $error .= "<p>Le nom est obligatoire.</p>";
    }
    if (empty($_POST['prenom'])) {
        $error .= "<p>Le prénom est obligatoire.</p>";
    }
    if (empty($_POST['date_naissance'])) {
        $error .= "<p>La date de naissance est obligatoire.</p>";
    }
    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error .= "<p>Un email valide est obligatoire.</p>";
    }
    if (empty($_POST['mot_de_passe']) || strlen($_POST['mot_de_passe']) < 6) {
        $error .= "<p>Le mot de passe doit avoir au moins 6 caractères.</p>";
    }
    if ($_POST['mot_de_passe'] !== $_POST['confirmer_mot_de_passe']) {
        $error .= "<p>Les mots de passe ne correspondent pas.</p>";
    }
    }

    if (empty($error)) {
        // Here you can add code to save the user information to a database
        echo "<p>Inscription réussie !</p>";
    }
    function valideDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    if ($d && $d->format($format) == $date) {
        return true;
    } else {
        return false;
    }
}

if(empty($_POST["date"])){
    $error .= "<p>la date est obligatoire</p>";
} elseif (!valideDate($_POST["date"])){
    $error .= "<p>format date est invalide</p>";
    }
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>

<body>

    <div class="container mt-5">
        <h1>Formulaire d'Inscription</h1>

    
        <form action="" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="date_naissance" class="form-label">Date de Naissance:</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo isset($_POST['date_naissance']) ? $_POST['date_naissance'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            </div>

            <div class="mb-3">
                <label for="mot_de_passe" class="form-label">Mot de Passe:</label>
                <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe">
            </div>

            <div class="mb-3">
                <label for="confirmer_mot_de_passe" class="form-label">Confirmer Mot de Passe:</label>
                <input type="password" class="form-control" id="confirmer_mot_de_passe" name="confirmer_mot_de_passe" placeholder="Confirmer mot de passe">
            </div>

            <button type="submit" class="btn btn-outline-success" name="envoyer">S'inscrire</button>
        </form>

        <?php 
        if (!empty($error)) {
            echo '<div class="alert alert-warning mt-3">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <h4 class="alert-heading">Attention!</h4>
                    <p>' . $error . '</p>
                </div>';
        }
        ?>

    </div>

  
</body>

</html>

