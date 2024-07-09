<?php
include_once "databaselogin.php";

function getMembers() {
    try {
        $pdo = DBconnection();

        $sql = "SELECT id, nom, description, imagefile FROM assomembers";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $members;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
        die();
    }
}
?>
