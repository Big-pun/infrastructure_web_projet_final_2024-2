<?php
include_once(__DIR__ . '/include/header.php');

// Affichage 
if (!isset($_GET['id'])) { // Vérification que la page reçoit un identifiant en paramètre
    echo 'Identifiant manquant';
    exit();
}

if ($requete = $mysqli->prepare("SELECT * FROM recettes WHERE id=?")) {  // Création d'une requête préparée 

    $requete->bind_param("i", $_GET['id']); // Envoi des paramètres à la requête
    $requete->execute(); // Exécution de la requête

    $result = $requete->get_result(); // Récupération de résultats de la requête
    $recette = $result->fetch_assoc(); // Récupération de l'enregistrement

    $requete->close(); // Fermeture du traitement 
}

if (empty($recette)) {
    echo 'Aucune recette trouvée pour l\'identifiant fourni.';
    exit();
}

// Mise à jour
$messageMAJ = "";

// Vérification de la soumission du formulaire
if (isset($_POST['id']) && isset($_POST['nom']) && isset($_POST['description']) && isset($_POST['temps_preparation']) && isset($_POST['niveau_difficulte'])) {
    $mysqli = new mysqli($host, $username, $password, $dbname); // Connexion à la base de données


    if ($mysqli->connect_errno) { // Gestion des erreurs de connexion
        echo "Échec de connexion à la base de données MySQL: " . $mysqli->connect_error;
        exit();
    }

    if ($requete = $mysqli->prepare("UPDATE recettes SET nom=?, description=?, temps_preparation=?, niveau_difficulte=? WHERE id=?")) { // Création d'une requête préparée 
    
    $requete->bind_param("ssssi", $_POST['nom'], $_POST['description'], $_POST['temps_preparation'], $_POST['niveau_difficulte'], $_POST['id']); // Envoi des paramètres à la requête. 
    
    if ($requete->execute()) { // Exécution de la requête
        $messageMAJ = "<div class='alert alert-success'>Produit mis à jour</div>";  // Message ajouté dans la page en cas d'ajout réussi
    } else {
        $messageMAJ =  "<div class='alert alert-danger'>Une erreur est survenue lors de la mise à jour.</div>";  // Message ajouté dans la page en cas d'ajout en échec
    }
    
    $requete->close(); // Fermeture du traitement
} else {
    echo "Erreur préparation de la requête : " . $mysqli->error; // Affichage d'une erreur en cas de problème avec la requête
}
    
    $mysqli->close(); // Fermeture de la connexion 
}
?>

<main>
    <div class="card">
        <h2>Modifier la recette de <?= $recette["nom"] ?></h2>

        <?php echo $messageMAJ ?>

        <form method="post">
            <input type="hidden" name="id" id="id" <?= $recette['id'] ?>>
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

