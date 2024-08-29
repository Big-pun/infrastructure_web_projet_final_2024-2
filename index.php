<?php $pageTitle = "Accueil";
include_once(__DIR__ . '/include/header.php');
include_once "include/config.php";

?>

<main>
  <h1>Projet final</h1>

  <!-- Campings sous forme de cartes -->
  <?php 
  $requete = "SELECT * FROM campings WHERE actif = 1 ORDER BY popularite DESC LIMIT 8";
  $resultat = $mysqli->query($requete);
  ?>

  <div class="flex">
    <?php foreach ($resultat as $camping) : ?>
      <div class="card">
        <img src="https://picsum.photos/id/<?= $camping['id'] ?>/250/120" alt="<?= $camping['nom'] ?>">
        <div class="container">
          <div class="region-and-stars">
            <div>
              <span class="material-symbols-outlined">location_on</span>
              <span class=""><?= $camping['region'] ?></span>
            </div>
            <div>
              <span class=""><?= $camping['nb_etoiles'] ?></span>
              <span class="material-symbols-outlined">family_star</span>
            </div>
          </div>
          <h4 class=""><?= $camping['nom'] ?></h4>
          <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="">Pour en savoir plus</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>