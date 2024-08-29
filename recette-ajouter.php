<?php
include_once(__DIR__ . '/include/header.php');
$pageTitle = "Ajouter une recette";

$messageAjout =  "Message qui sera généré selon le succès ou l’échec de l’ajout";

// Vérification de la soumission du formulaire

if (isset($_POST['nom'], $_POST['description'], $_POST['temps_preparation'], $_POST['niveau_difficulte'])) {
    $mysqli = new mysqli($host, $username, $password, $dbname);

    if ($mysqli->connect_errno) {
        echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
        exit();
    }

    if ($requete = $mysqli->prepare("INSERT INTO recettes (nom, description, temps_preparation, niveau_difficulte) VALUES (?, ?, ?, ?)")) {
        error_log("Exécution de la requête avec : nom=" . $_POST['nom'] . ", description=" . $_POST['description'] . ", temps_preparation=" . $_POST['temps_preparation'] . ", niveau_difficulte=" . $_POST['niveau_difficulte']);

        $requete->bind_param("ssis", $_POST['nom'], $_POST['description'], $_POST['temps_preparation'], $_POST['niveau_difficulte']);

        if ($requete->execute()) {
            error_log("Requête exécutée avec succès");
            $messageAjout = "<div class='alert alert-success'>Recette ajoutée !!!</div>";
        } else {
            error_log("Erreur lors de l'exécution de la requête : " . $requete->error);
            $messageAjout =  "<div class='alert alert-danger'>Une erreur est survenue lors de l'ajout.</div>";
        }

        $requete->close();
    } else {
        echo "Erreur préparation de la requête : " . $mysqli->error;
    }

    $mysqli->close();
}
?>

<main>
    <?= $messageAjout ?>
    <h1>Ajouter une recette</h1>
    <p>Remplissez le formulaire pour ajouter une recette.</p>
    <p>Les champs marqués d'un astérisque (*) sont obligatoires.</p>
    <p>Le temps de préparation doit être en minutes.</p>

    <div class="flex">
        <form method="post">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required minlength="2" maxlength="25">
            </div>

            <div class="form-group">
                <label for="description">Description<span>*</span></label>
                <input type="text" class="form-control" id="description" name="description" required minlength="10">
            </div>

            <div class="form-group">
                <label for="temps_preparation">Temps de préparation</label>
                <input type="number" class="form-control" id="temps_preparation" name="temps_preparation" required min="1" max="120">
            </div>

            <div class="form-group">
                <label for="niveau_difficulte">Niveau de difficulté</label>
                <select class="form-control" id="niveau_difficulte" name="niveau_difficulte" required>
                    <option value="Facile">Facile</option>
                    <option value="Moyen">Moyen</option>
                    <option value="Difficile">Difficile</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Ajouter</button>
            <div class="form-group">
                <a href="administration_module_personnel.php">Retour à la page admin</a>
            </div>
        </form>
    </div>
</main>

<?php
include_once(__DIR__ . '/include/footer.php');
?>