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
</head>

<body class="dark-mode">

  <!-- Navigation -->
<?php
  $sql = "SELECT nom FROM experiences";
$result = $mysqli->query($sql);
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
              if ($result->num_rows > 0): ?>
              <?php while ($row = $result->fetch_assoc()): ?>
                <li><a href='liste_campings_par_experience.php?id'><?= $row["nom"] ?></a></li>
              <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </li>
          <li><a href="#">Campings 3* et plus</a></li>  
          <li><a href="#">Liste complète</a></li>
          <li><a href="#">Module personnel</a></li>
          <li><a href="#">Administration</a></li>
      </ul>
    </nav>
    <hr>
  </header>

  
