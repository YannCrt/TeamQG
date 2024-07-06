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

// Vérification si l'utilisateur est administrateur
// authentification.php (ou où vous gérez les fonctions d'authentification)
// authentification.php// Assurez-vous que la fonction estAdmin est correctement définie et qu'elle fonctionne comme prévu
function estAdmin($utilisateur_id) {
    try {
        $cnx = DBconnection(); // Assurez-vous que DBconnection() retourne une connexion PDO valide
        $query = "SELECT est_admin FROM utilisateurs WHERE id = :id";
        $stmt = $cnx->prepare($query);
        $stmt->bindParam(':id', $utilisateur_id);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultat['est_admin'] ?? false;
    } catch (PDOException $e) {
        // Gérer les erreurs PDO
        echo "Erreur : " . $e->getMessage();
        return false;
    }
}


// Ajouter un utilisateur en tant qu'administrateur
function ajouterAdmin($id_utilisateur) {
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("UPDATE utilisateurs SET est_admin = 1 WHERE id = :id");
        $req->bindValue(':id', $id_utilisateur, PDO::PARAM_INT);
        $req->execute();
        return true;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
// Rétrograder un administrateur (revenir à un utilisateur normal)
function retrograder($id_utilisateur) {
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("UPDATE utilisateurs SET est_admin = 0 WHERE id = :id");
        $req->bindValue(':id', $id_utilisateur, PDO::PARAM_INT);
        $req->execute();
        return true;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
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

function getMailByPseudo($pseudo) {
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("SELECT mail FROM utilisateurs WHERE pseudo = :pseudo;");
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
        return $resultat['mail']; // Retourne seulement l'e-mail
    } catch (PDOException $e) {
        print 'Erreur !: ' . $e->getMessage(); 
        die();
    }
}
function updPseudoUtilisateur($mail, $pseudo) {
    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("UPDATE utilisateurs SET pseudo=:pseudo WHERE mail=:mail");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

        $resultat = $req->execute();
        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function updMdpUtilisateur($mail, $mdp) {
    try {
        $cnx = DBconnection();

        $mdpCrypt = password_hash($mdp, PASSWORD_DEFAULT); // Mettez à jour le mot de passe crypté
        $req = $cnx->prepare("UPDATE utilisateurs SET mdp=:mdp WHERE mail=:mail");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':mdp', $mdpCrypt, PDO::PARAM_STR);

        $resultat = $req->execute();
        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
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
    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("UPDATE utilisateurs SET nom=:nom WHERE mail=:mail");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':nom', $nom, PDO::PARAM_STR);

        $resultat = $req->execute();
        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function UpdPrenomUtilisateur($prenom, $mail) {
    try {
        $cnx = DBconnection();

        $req = $cnx->prepare("UPDATE utilisateurs SET prenom=:prenom WHERE mail=:mail");
        $req->bindValue(':mail', $mail, PDO::PARAM_STR);
        $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);

        $resultat = $req->execute();
        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
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
