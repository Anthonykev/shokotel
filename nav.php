<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Startseite</title>
  <link rel="stylesheet" href="formato.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Shokotel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Startseite</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="hilfeSeite.php">Hilfe Seite</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="impressum.php">Impressum</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Buchungen
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="buchungzimmer.php">Zimmer & Suiten</a></li>
            <li><a class="dropdown-item" href="buchungspa.php">Boutique Spa</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="buchungschach.php">Shokotels Chessclub</a></li>
          </ul> 
          <?php
        if (!isset($_SESSION['username'])) {
         echo' <li class="nav-item"><a class="nav-link" href="anmelderequ.php">Registrierungsformular</a></li>';
        echo '<li class="nav-item"><a class="nav-link" href="login.php">Anmelden</a>';
        
        }
        
        ?>
        <?php
            // Überprüfen, ob der Benutzer angemeldet ist

            
            if (isset($_SESSION['username'])) {
              echo '<li class="nav-item"> <a class="nav-link" href="profil.php">Profil</a></li>';
              echo '<li class="nav-item"><a class="nav-link" href="upload.php">Uploads</a>';
              echo ' <li class="nav-item"> <a class="nav-link" href="logout.php">Abmelden</a></li>';
       
            }
            ?>
       
     
      </ul>
    </div>
  </nav>




</body>

</html>






