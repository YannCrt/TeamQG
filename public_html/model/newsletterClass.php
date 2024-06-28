<?php 
class NewsletterInscription {
    public function __construct(){}
    public function Register($nom, $prenom,$email){
        $error = false;

        try {
            $cnx = DBconnection();
            $req = $cnx->prepare("insert into newsletter(nom,prenom,email)         
            values(:lastname,:name,:email)");
    
            $req->bindValue(':name', $nom, PDO::PARAM_STR);
            $req->bindValue(':lastname', $prenom, PDO::PARAM_STR);
            $req->bindValue(':email', $email, PDO::PARAM_STR); 
        } catch (PDOException $e) {
            $error = true;
            print "Erreur !: " . $e->getMessage();
            return $error;
        }

        return $error;
    }
}

?>