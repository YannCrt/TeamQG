<?php 

include_once "databaselogin.php";

function getVideo() {
    $resultat = array(); // tableau pour stocker les utilisateurs

    try {
        $cnx = DBconnection(); // fonction pour se connecter à la base
        $req = $cnx->prepare("SELECT * FROM video;"); // requête pour selectionner les utilisateurs
        $req->execute();  // fonction php pour executer la requête

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC); // fetch permet de recuperer la ligne suivante d'un jeu de résultat PDO
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage(); 
        die();
    } 
    return $resultat;
}

function getVideoById($id) {
    $resultat = array(); 

    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("select * from video where id=:id;");
        $req->bindvalue(':id', $id, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
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
        $req->bindValue(':description', $titre, PDO::PARAM_STR);

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
        $req->bindValue(':datee', $titre, PDO::PARAM_STR);

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
        $req->bindValue(':fichier', $titre, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addVideo($id, $titre, $description, $fichier, $datee) {
    try {
        $cnx = DBconnection();

        $req = $cnx->prepare('INSERT INTO video (id, titre, description, fichier, datee) VALUES (:id, :titre, :description, :fichier, :datee)');
        $req->bindValue(':id', $prenom, PDO::PARAM_STR);
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':description', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':fichier', $fichier, PDO::PARAM_STR);
        $req->bindValue(':datee', $datee, PDO::PARAM_STR);

        $resultat = $req->execute();
        if ($resultat) {
            return true;
        } else {
            // Si l'exécution échoue, on log les erreurs possibles
            $errorInfo = $req->errorInfo();
            print "Erreur d'insertion: " . $errorInfo[2];
            return false;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function deleteVideoById($id) {
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare('DELETE FROM video WHERE id=:id;');
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $resultat = $req->execute();

        if (!isset($_SESSION)) {
            session_start();
        }

        if (isLoggedOn() && $_SESSION["id"] == $id) {
            logout();
            session_destroy();
        }

        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }

}
