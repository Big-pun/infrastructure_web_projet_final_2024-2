<?php 
include_once(__DIR__ . '/include/header.php');

if (!isset($_GET['id'])) {
    echo 'Identifiant manquant';
    exit();
}

$messageSuppression = "";

if (isset($_POST['submit'])&& isset($_GET['id'])) {
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