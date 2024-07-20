<!-- a-programmer -->
<!-- Cette page doit être utilisée comme point d'entrée pour gérer les données d'une des tables que vous avez ajoutées au modèle fourni -->
<!-- Elle est volontairement vide, c'est à vous de la construire -->
<!-- La mise en forme est à votre discrétion. -->
<!-- À partir de cette page, il doit être possible d'ajouter, de modifier et de supprimer des enregistrements de la table choisie. -->
<!-- Vous pouvez réaliser cette demande en utilisant plusieurs pages php (une pour l'ajout, une pour l'édition et une pour la suppression, que vous devrez créer) ou utiliser des dialogues (modals). -->
<!-- Assurez-vous que la page affiche l'entête et le pied de page, comme les autres pages -->
<!-- et que tout est valide W3C -->

<?php
include_once(__DIR__ . '/include/header.php');
$requete = $mysqli->prepare("SELECT * FROM recettes");
$requete->execute();
$resultat = $requete->get_result();
?>



<main>
    <?php if ($resultat->num_rows > 0) : ?>
        <?php while ($row = $resultat->fetch_assoc()) : ?>
            <div class="">
                <div class='card'>
                    <h2><?= ($row["nom"]) ?></h2>
                    </ul>
                    <a href="recette.php?id=<?= ($row["id"]) ?>">Voir la recette</a>
                    <a href="recette-modifier.php?id=<?= ($row["id"]) ?>">Modifier la recette</a>
                    <a href="recette-supprimer.php?id=<?= ($row["id"]) ?>">Supprimer la recette</a>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>Aucune recette trouvée</p>
    <?php endif; ?>
    <a href="recette-ajouter.php">Ajouter une recette</a>










</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>