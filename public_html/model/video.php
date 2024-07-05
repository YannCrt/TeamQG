<?php 

include_once "databaselogin.php";

function getVideos() {
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("SELECT * FROM video;");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getVideoById($id) {
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("SELECT * FROM video WHERE id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $e) {
        print 'Erreur !: ' . $e->getMessage();
        die();
    }
}

function getVideoByTitre($titre) {
    $resultat = array();

    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("select * from video where titre=:titre;");
        $req->bindvalue(':titre', $titre, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
}

function getVideoByDescription($description) {
    $resultat = array();

    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("select * from video where description=:description;");
        $req->bindvalue(':description', $description, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
}

function getVideoByFichier($fichier) {
    $resultat = array();

    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("select * from video where fichier=:fichier;");
        $req->bindvalue(':fichier', $fichier, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
}

function getVideoBydate($fichier) {
    $resultat = array();

    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("select * from video where fichier=:fichier;");
        $req->bindvalue(':fichier', $fichier, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
}

function updVideo($id, $titre, $description) {
    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("UPDATE video SET titre = :titre, description = :description WHERE id = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);

        $resultat = $req->execute();
        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function updTitreVideo($id,$titre) {
    $resultat = -1;
    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("update video set titre=:titre where id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updDescriptionVideo($id,$description) {
    $resultat = -1;
    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("update video set description=:description where id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updDateVideo($id,$datee) {
    $resultat = -1;
    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("update video set datee=:datee where id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->bindValue(':datee', $datee, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updFichierVideo($id,$fichier) {
    $resultat = -1;
    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("update video set fichier=:fichier where id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->bindValue(':fichier', $fichier, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addVideo($titre, $description, $fichier, $datee, $utilisateur_id) {
    global $pdo;  // Assurez-vous que $pdo est globalement accessible
    $query = "INSERT INTO video (titre, description, fichier, datee, utilisateur_id) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$titre, $description, $fichier, $datee, $utilisateur_id]);
}

function getVideosByUserId($userId) {
    global $pdo;  // Assurez-vous que $pdo est globalement accessible
    $query = "SELECT * FROM video WHERE utilisateur_id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$userId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteVideoById($id) {
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare('DELETE FROM video WHERE id=:id;');
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $resultat = $req->execute();

        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
