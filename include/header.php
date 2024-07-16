<?php include_once(__DIR__ . '/config.php');

$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_errno) {
  echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
  exit();
} else {
  echo "Connexion réussie !!";
}
?>


<!DOCTYPE html>
<html lang="fr-CA">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Titre de la page (défi! rendre ce titre dynamique selon la page sélectionnée)</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
  <link rel="stylesheet" href="css/styles.css">
  <!-- <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: '#da373d',
          }
        }
      }
    }
  </script> -->

</head>

<body class="dark-mode">

  <!-- Navigation -->
  <?php
  $requete = "SELECT nom, id FROM experiences";
  $resultat = $mysqli->query($requete);
  ?>

  <header>
    <nav>
      <a href="index.php"><img src="img/Gemini_Generated_Image_wsz3zowsz3zowsz3.jpg" alt="logo"></a>
      <ul>
        <li><a href="index.php">Accueil</a></li>
        <li>
          <a href="#">Expériences &nbsp;<i class="arrow down"></i></a>
          <ul>
            <?php
            if ($resultat->num_rows > 0) : ?>
              <?php while ($row = $resultat->fetch_assoc()) : ?>
                <li><a href='liste_campings_par_experience.php?id=<?= $row["id"] ?>'><?= $row["nom"] ?></a></li>
              <?php endwhile; ?>
            <?php endif; ?>
          </ul>
        </li>
        <li><a href="liste_campings_trois_etoiles_et_plus.php">Campings 3* et plus</a></li>
        <li><a href="liste_campings.php">Liste complète</a></li>
        <li><a href="module_personnel.php">Module personnel</a></li>
        <li><a href="administration_module_personnel.php">Administration</a></li>
      </ul>
    </nav>
    <hr>
  </header>