<?php
require_once 'databaselogin.php';

// Fonction pour obtenir tous les événements
function getAllCompetitions() {
    try {
        $conn = DBconnection();
        $query = "SELECT * FROM competition";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conn = null; // Fermer la connexion
        return $events;
    } catch (PDOException $e) {
        print "Erreur lors de la récupération des compétitions : " . $e->getMessage();
        return []; // Retourner un tableau vide en cas d'erreur
    }
}

// Fonction pour obtenir un événement par ID
function getCompetitionById($id) {
    try {
        $conn = DBconnection();
        $query = "SELECT * FROM competition WHERE idCompetition = :idCompetition";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idCompetition', $id, PDO::PARAM_INT); // Corrected parameter binding
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null; // Fermer la connexion
        return $event;
    } catch (PDOException $e) {
        print "Erreur lors de la récupération de compétition : " . $e->getMessage();
        return null;
    }
}

// Fonction pour inscrire un utilisateur à un événement
function registerUserToCompetition($competition_id, $user_id) {
    try {
        $conn = DBconnection();
        $query = "INSERT INTO inscriptioncompetition (idCompetition, utilisateurs_id) VALUES (:competition_id, :user_id)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':competition_id', $competition_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $success = $stmt->execute();
        $conn = null; // Fermer la connexion
        return $success;
    } catch (PDOException $e) {
        print "Erreur lors de l'inscription à la compétition : " . $e->getMessage();
        return false;
    }
}

// Fonction pour désinscrire un utilisateur d'un événement
function unregisterUserFromCompetition($competition_id, $user_id) {
    try {
        $conn = DBconnection();
        $query = "DELETE FROM inscriptioncompetition WHERE idCompetition = :competition_id AND utilisateurs_id = :user_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':competition_id', $competition_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $success = $stmt->execute();
        $conn = null; // Fermer la connexion
        return $success;
    } catch (PDOException $e) {
        print "Erreur lors de la désinscription de la compétition : " . $e->getMessage();
        return false;
    }
}

// Fonction pour vérifier si un utilisateur est inscrit à une compétition
function isUserRegisteredToCompetition($competition_id, $user_id) {
    try {
        $conn = DBconnection();
        $query = "SELECT * FROM inscriptioncompetition WHERE idCompetition = :competition_id AND utilisateurs_id = :user_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':competition_id', $competition_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null; // Fermer la connexion
        return $result ? true : false;
    } catch (PDOException $e) {
        print "Erreur lors de la vérification de l'inscription à la compétition : " . $e->getMessage();
        return false;
    }
}
?>
