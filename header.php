
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link href="https://bootswatch.com/5/lux/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="style.php">
  <title>Bibliotheque</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Bibliotheque</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01"> 
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Bibliotheque
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="livres.php">Livres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ajoutLivre.php">Ajouter un livre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Inscription.php">Inscription</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="connection.php">Connection</a>
        </li>
      
      </ul>
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</body>
</html>