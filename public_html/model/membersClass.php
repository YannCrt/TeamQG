<?php 
class CreateMembers{
    private $members = array();   

    public function __construct(){
         try {
                $cnx = DBconnection();
                $req = $cnx->prepare("select * from assomembers");
                $req->execute();

                $line = $req->fetch(PDO::FETCH_ASSOC);
                while ($line) {
                    $this->members[] = new member($line["nom"], $line["description"], "assets/membersimages/" . $line["imagefile"]); // Chemin relatif
                    $line = $req->fetch(PDO::FETCH_ASSOC);
                }
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }    
    }

    public function getArray(){
        return $this->members;
    }
}

class member{
    private $name;
    private $description;
    private $imagepath;

    public function __construct($name,$bio,$path){
        $this->name = $name;
        $this->description = $bio;
        $this->imagepath = $path;
    }

    public function getName(){
        return $this->name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getImagePath(){
        return $this->imagepath;
    }
}



?>