<?php include_once(__DIR__ . '/include/header.php');
include_once "include/config.php";

// Requête pour obtenir les informations du camping sélectionné
$requete = $mysqli->prepare("SELECT nom, region, adresse, ville, code_postal, description, nb_etoiles, accepte_animaux  FROM campings WHERE id = ?;");
$requete->bind_param("i", $_GET["id"]);
$requete->execute();
$resultat = $requete->get_result();
$camping = $resultat->fetch_assoc();
?>

<!-- a-programmer -->

<div> 
        <img src="https://picsum.photos/id/<?= $_GET["id"] ?>/500/300" alt="<?= $camping['nom'] ?>">
        <h2><?= $camping['nom'] ?></h2>
        <p><?= $camping['region'] ?></p>
        <p><?= $camping['description'] ?></p>
        <p><?= $camping['adresse'] ?></p>
        <p><?= $camping['ville'] ?></p>
        <p><?= $camping['code_postal'] ?></p>
        <p><?= $camping['nb_etoiles'] ?> étoiles</p>
        <p><?= $camping['accepte_animaux'] ? "Animaux acceptés" : "Animaux non acceptés" ?></p>
</div>

 

<!-- Cette page doit être utilisée pour afficher la fiche détaillée du camping choisi par l'utilisateur -->
<!-- Elle est volontairement vide, c'est à vous de la construire -->

<!-- La mise en forme est à votre discrétion. -->

<!-- Les informations à afficher sont 
        - l’image (statique ou dynamique selon le # picsum)
        - le nom du camping
        - la région
        - la description
        - l'adresse complète (adresse, ville et code postal)
        - le nombre d’étoiles
        - le nombre de terrains
        - la mention « animaux acceptés : » suivie de « oui » ou « non ». 
-->

<!-- Assurez-vous que la page affiche l'entête et le pied de page, comme les autres pages -->
<!-- et que tout est valide W3C -->

<main>
        <div>
                
        </div>
</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>