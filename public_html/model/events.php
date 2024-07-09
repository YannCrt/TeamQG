<?php
require_once 'databaselogin.php';

// Fonction pour obtenir tous les événements
function getAllEvents() {
    try {
        $conn = DBconnection();
        $query = "SELECT * FROM events";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $conn = null; // Fermer la connexion
        return $events;
    } catch (PDOException $e) {
        print "Erreur lors de la récupération des événements: " . $e->getMessage();
        return []; // Retourner un tableau vide en cas d'erreur
    }
}

// Fonction pour obtenir un événement par ID
function getEventById($id) {
    try {
        $conn = DBconnection();
        $query = "SELECT * FROM events WHERE idEvent = :idEvent";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':idEvent', $id, PDO::PARAM_INT);
        $stmt->execute();
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        $conn = null; // Fermer la connexion
        return $event;
    } catch (PDOException $e) {
        print "Erreur lors de la récupération de l'événement: " . $e->getMessage();
        return null;
    }
}

// Fonction pour inscrire un utilisateur à un événement
function registerUserToEvent($event_id, $user_id) {
    try {
        $conn = DBconnection();
        $query = "INSERT INTO inscriptionevent (idEvent, utilisateurs_id) VALUES (:event_id, :user_id)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $success = $stmt->execute();
        $conn = null; // Fermer la connexion
        return $success;
    } catch (PDOException $e) {
        print "Erreur lors de l'inscription à l'événement: " . $e->getMessage();
        return false;
    }
}
?>
