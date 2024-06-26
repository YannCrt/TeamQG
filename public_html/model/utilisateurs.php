<?php

include_once "databaselogin.php";

function getUtilisateurs() {
    $resultat = array(); // tableau pour stocker les utilisateurs

    try {
        $cnx = DBconnection(); // fonction pour se connecter à la base
        $req = $cnx->prepare("SELECT * FROM utilisateurs;"); // requête pour selectionner les utilisateurs
        $req->execute();  // fonction php pour executer la requête

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC); // fetch permet de recuperer la ligne suivante d'un jeu de résultat PDO
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage(); 
        die();
    } 
    return $resultat;
}

function getUtilisateurById($id) {
    $resultat = array(); 

    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("select * from utilisateurs where id=:id;");
        $req->bindvalue(':id', $id, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurBymail($mail) {
    $resultat = array();

    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("select * from utilisateurs where mail=:mail;");
        $req->bindvalue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
}

function getUtilisateurByPseudo($pseudo) {
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("SELECT * FROM utilisateurs WHERE pseudo = :pseudo;");
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $e) {
        print 'Erreur !: ' . $e->getMessage(); 
        die();
    }
}
function updtPseudoUtilisateur($mail, $pseudo) {
    $resultat = -1;
    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("update utilisateurs set pseudo=:pseudo where mail=:mail");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function updtMdpUtilisateur($mail, $mdp) {
    $resultat = -1;

    try {
        $cnx = DBconnection();

        $mdpUCrypt = crypt($mdp, "sel");
        $req = $cnx->prepare("update utilisateurs set mdp=:mdp where pseudo=:pseudo;");
        $req->bindvalue(':mdp', $mdp, PDO::PARAM_STR);
        $req->bindvalue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
}

function UpdMailUtilisateur($mail, $mdp) {
    $resultat = -1;

    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("update utilisateurs set mail=:mail where mdp=:mdp;");
        $req->bindvalue(':mdp', $mdp, PDO::PARAM_STR);
        $req->bindvalue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
}

function UpdNomUtilisateur($nom, $mail) {
    $resultat = -1;

    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("update utilisateurs set nom=:nom where mail=:mail;");
        $req->bindvalue(':nom', $nom, PDO::PARAM_STR);
        $req->bindvalue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
}

function UpdPrenomUtilisateur($prenom, $mail) {
    $resultat = -1;

    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("update utilisateurs set prenom=:prenom where mail=:mail;");
        $req->bindvalue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindvalue(':mail', $mail, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }
    return $resultat;
}

function addUtilisateur($prenom, $nom, $pseudo, $mdp, $mail) {
    try {
        $cnx = DBconnection();

        // Utilisation de password_hash pour sécuriser le mot de passe
        $mdpcrypt = password_hash($mdp, PASSWORD_DEFAULT);
        $req = $cnx->prepare('INSERT INTO utilisateurs (prenom, nom, pseudo, mdp, mail) VALUES (:prenom, :nom, :pseudo, :mdp, :mail)');
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdpcrypt, PDO::PARAM_STR);
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);

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

function deleteUtilisateurbyid($id) {
     try {
        $cnx = DBconnection();
        $req = $cnx->prepare('DELETE FROM utilisateurs WHERE id=:id;');
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();

        if (!isset($_SESSION)) {
            session_start();
        }

        if (isLoggedOn()) {
            if ($_SESSION["id"] == $id) {

                logout();

                session_destroy();
            }
        }
     } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
     }
}

function deleteUtilisateurbypseudo($pseudo) {
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare('DELETE FROM utilisateurs WHERE pseudo=:pseudo;');
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $resultat = $req->execute();

        if (!isset($_SESSION)) {
            session_start();
        }

        if (isLoggedOn() && $_SESSION["pseudo"] == $pseudo) {
            logout();
            session_destroy();
        }

        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !:". $e->getMessage();
        die();
    }

}

function censorEmail($email) {
    $parts = explode("@", $email);
    $name = $parts[0];
    $domain = $parts[1];
    $nameCensored = substr($name, 0, 2) . str_repeat('*', strlen($name) - 2);
    return $nameCensored . '@' . $domain;
}
