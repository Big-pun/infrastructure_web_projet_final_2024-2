<?php
include_once(__DIR__ . '/include/header.php');
$pageTitle = "Liste des campings";

// Requête pour obtenir la liste des campings actifs en ordre alphabétique
$requete = $mysqli->prepare("SELECT id, nom, region, id_picsum FROM campings WHERE actif = 1 ORDER BY nom ASC");
$requete->execute();
$resultat = $requete->get_result();
?>

<main>

  <h1>Liste les campings</h1>

  <div class="">
    <!-- Afficher la liste de tous les campings ACTIFS en ordre alphabétique -->
    <!-- L'affichage de la liste des campings doit être le même que celui utilisé pour l'affichage des campings par expérience -->

    <?php if ($resultat->num_rows > 0) : ?>
        <ul>
          <?php while ($row = $resultat->fetch_assoc()) : ?>
            <li class="flex">
              <h2><?= $row["nom"] ?></h2>
              <div class="background" style="background-image: url('https://picsum.photos/id/<?= $row["id_picsum"] ?>/500/300');background-size: cover; background-position: center;">
              <p><?= $row["region"] ?></p>
              </div>
              <a href="fiche_camping.php?id=<?= $row["id"] ?>">Pour en savoir plus</a>
              </div>
            </li>
            <br/>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p>Aucun camping actif trouvé</p>
      <?php endif; ?>
    
  </div>


</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>