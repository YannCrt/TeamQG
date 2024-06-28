<?php 
class Inscription {
    public function __construct(){}

    public function Register($name, $lastname, $age,$infos,$id,$email,$origin){
        $error = false;
        try {
            $cnx = DBconnection();
            $req = $cnx->prepare("insert into inscription(nom,prenom,email,age,autreinformations)         
            values(:lastname,:name,:email,:age,:infos)");
            
            $informations = "";
            
            foreach ($infos as $key => $value){
                $informations .= "$key = $value ";
            }
            
            $req->bindValue(':name', $name, PDO::PARAM_STR);
            $req->bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $req->bindValue(':age', $age, PDO::PARAM_STR);
            $req->bindValue(':infos', $informations, PDO::PARAM_STR);
            $req->bindValue(':email', $email, PDO::PARAM_STR); 
            $resultat = $req->execute();
            
            $idIns =$cnx->lastInsertId('idInscription');	
            //echo $idIns; 
            
            if ($origin == "event"){
                $req2 = $cnx->prepare("insert into inscriptionevent values(:idEvent,:idInscription)");
                $req2->bindValue(':idEvent', $id, PDO::PARAM_STR);
                $req2->bindValue(':idInscription',  $idIns, PDO::PARAM_STR);
  
                $req2->execute();
            }else{
                $req2 = $cnx->prepare("insert into inscriptioncompetition values(:idEvent,:idInscription)");
                $req2->bindValue(':idEvent', $id, PDO::PARAM_STR);
                $req2->bindValue(':idInscription',  $idIns, PDO::PARAM_STR);
                $req2->execute();
            }
        } catch (PDOException $e) {
            $error = true;
            print "Erreur !: " . $e->getMessage();
            return $error;
        }

        return $error;
    }
}

?>