<?php
include_once(__DIR__ . '/include/header.php');
$pageTitle = "Modifier une recette";

// Affichage 
if (!isset($_GET['id'])) {
    echo 'Identifiant manquant';
    exit();
}

if ($requete = $mysqli->prepare("SELECT * FROM recettes WHERE id=?")) {
    $requete->bind_param("i", $_GET['id']);
    $requete->execute();

    $result = $requete->get_result();
    $recette = $result->fetch_assoc();

    $requete->close();
}

if (empty($recette)) {
    echo 'Aucune recette trouvée pour l\'identifiant fourni.';
    exit();
}

// Mise à jour
$messageMAJ = "";

// Vérification de la soumission du formulaire
if (isset($_POST['id'], $_POST['nom'], $_POST['description'], $_POST['temps_preparation'], $_POST['niveau_difficulte'])) {
    $mysqli = new mysqli($host, $username, $password, $dbname);

    if ($mysqli->connect_errno) {
        echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
        exit();
    }

    if ($requete = $mysqli->prepare("UPDATE recettes SET nom=?, description=?, temps_preparation=?, niveau_difficulte=? WHERE id=?")) {
        error_log("Exécution de la requête avec : nom=" . $_POST['nom'] . ", description=" . $_POST['description'] . ", temps_preparation=" . $_POST['temps_preparation'] . ", niveau_difficulte=" . $_POST['niveau_difficulte'] . ", id=" . $_POST['id']);

        $requete->bind_param("ssisi", $_POST['nom'], $_POST['description'], $_POST['temps_preparation'], $_POST['niveau_difficulte'], $_POST['id']);

        if ($requete->execute()) {
            error_log("Requête exécutée avec succès");
            $messageMAJ = "<div class='alert alert-success'>Recette mise à jour</div>";
        } else {
            error_log("Erreur lors de l'exécution de la requête : " . $requete->error);
            $messageMAJ =  "<div class='alert alert-danger'>Une erreur est survenue lors de la mise à jour.</div>";
        }

        $requete->close();
    } else {
        echo "Erreur préparation de la requête : " . $mysqli->error;
    }

    $mysqli->close();
}
?>

<main>
    <?= $messageMAJ ?>
    <div class="card">
        <h2>Modifier la recette de <?= $recette["nom"] ?></h2>

        <form method="post">
            <input type="hidden" name="id" id="id" value="<?= $recette['id'] ?>">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required minlength="2" maxlength="25" value="<?= $recette['nom'] ?>">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" required minlength="10" value="<?= $recette['description'] ?>">
            </div>

            <div class="form-group">
                <label for="temps_preparation">Temps de préparation</label>
                <input type="number" class="form-control" id="temps_preparation" name="temps_preparation" required min="1" max="120" value="<?= $recette['temps_preparation'] ?>">
            </div>

            <div class="form-group">
                <label for="niveau_difficulte">Niveau de difficulté</label>
                <select class="form-control" id="niveau_difficulte" name="niveau_difficulte" required>
                    <option value="Facile" <?= $recette['niveau_difficulte'] == 'Facile' ? 'selected' : '' ?>>Facile</option>
                    <option value="Moyen" <?= $recette['niveau_difficulte'] == 'Moyen' ? 'selected' : '' ?>>Moyen</option>
                    <option value="Difficile" <?= $recette['niveau_difficulte'] == 'Difficile' ? 'selected' : '' ?>>Difficile</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Modifier</button>
            <div class="form-group">
                <a href="administration_module_personnel.php">Retour à la page admin</a>
            </div>
        </form>
    </div>
</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>
