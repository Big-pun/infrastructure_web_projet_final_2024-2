<?php
include_once(__DIR__ . '/include/header.php');
$pageTitle = "Supprimer une recette";

if (!isset($_GET['id'])) {
    echo 'Identifiant manquant';
    exit();
}

$messageSuppression = "";

// Suppression de la recette si le formulaire est soumis et que l'identifiant est présent
if (isset($_POST['submit']) && isset($_GET['id'])) {
    $mysqli = new mysqli($host, $username, $password, $dbname);
    if ($mysqli->connect_errno) {
        echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
        exit();
    }

    if ($requete = $mysqli->prepare("DELETE FROM recettes WHERE id=?")) {
        error_log("Exécution de la requête avec : id=" . $_GET['id']);

        $requete->bind_param("i", $_GET['id']);

        if ($requete->execute()) {
            error_log("Requête exécutée avec succès");
            $messageSuppression = "<div class='alert alert-success'>Recette supprimée</div>";
        } else {
            error_log("Erreur lors de l'exécution de la requête : " . $requete->error);
            $messageSuppression =  "<div class='alert alert-danger'>Une erreur est survenue lors de la suppression.</div>";
        }

        $requete->close();
    } else {
        echo "Erreur préparation de la requête : " . $mysqli->error;
    }
    $mysqli->close();
}

// Récupération de la recette à supprimer pour affichage dans le formulaire
$mysqli = new mysqli($host, $username, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
    exit();
}


if ($requete = $mysqli->prepare("SELECT * FROM recettes WHERE id=?")) {
    $requete->bind_param("i", $_GET['id']);
    $requete->execute();

    $result = $requete->get_result();
    $recette = $result->fetch_assoc();

    $requete->close();
}
$mysqli->close();
?>

<main>
    <h1>Supprimer une recette</h1>
    <?php if ($recette) { ?>
        <p>Êtes-vous sûr de vouloir supprimer la recette suivante?</p>
        <p><strong><?= $recette['nom'] ?></strong></p>
        <p><?= $recette['description'] ?></p>

        <form method="POST">
            <input type="hidden" name="id" value="<?= $recette['id'] ?>">
            <button type="submit" name="submit" class="btn btn-danger">Oui</button>
            <a href="administration_module_personnel.php" class="btn btn-primary">Non</a>
        </form>
    <?php } else { ?>
        <?= $messageSuppression ?><br>
    <?php } ?>


</main>

<?php
include_once(__DIR__ . '/include/footer.php');
?>