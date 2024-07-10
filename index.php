<?php include_once(__DIR__ . '/include/header.php');
include_once "include/config.php";
?>

<main>
  <h1>Projet final</h1>

  <!-- Campings sous forme de cartes -->
  <!-- Affiche 8 camping actifs, en ordre décroissant de popularité (le camping le plus populaire s’affiche en premier). -->
  <!-- Respectez la mise en forme existante:
        Les campings doivent s'afficher dans les cartes et doivent présenter 
          - une image (statique ou dynamique selon le # picsum)
          - la région
          - le nom du camping
          - le nombre d’étoiles
        Le lien Pour en savoir plus doit mener à la fiche détaillée du camping.
  -->

  <?php 
  $sql = "SELECT * FROM campings WHERE actif = 1 ORDER BY popularite DESC LIMIT 8";
  $result = $mysqli->query($sql);
  ?>

  <div class="flex">
    <?php foreach ($result as $camping) : ?>
      <div class="card">
        <img src="https://picsum.photos/id/<?= $camping['id'] ?>/250/120" alt="<?= $camping['nom'] ?>">
        <div class="container">
          <div class="region-and-stars">
            <div>
              <span class="material-symbols-outlined">location_on</span>
              <span class="a-programmer"><?= $camping['region'] ?></span>
            </div>
            <div>
              <span class="a-programmer"><?= $camping['nb_etoiles'] ?></span>
              <span class="material-symbols-outlined">family_star</span>
            </div>
          </div>
          <h4 class="a-programmer"><?= $camping['nom'] ?></h4>
          <a href="fiche_camping.php?id=<?= $camping['id'] ?>" class="a-programmer">Pour en savoir plus</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>