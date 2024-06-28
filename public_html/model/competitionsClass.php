<?php 
class CreateCompetition{
    private $competition = array();   

    public function __construct(){
         try {
                $cnx = DBconnection();
                $req = $cnx->prepare("select * from competition");
                $req->execute();

                $line = $req->fetch(PDO::FETCH_ASSOC);
                while ($line) {
                    $this->competition[] = new competition($line["nomcompetition"], 
                    $line["datecompetition"], $line["lieu"], 
                    $line["description"], $line["idCompetition"],$line["informations"]);
                    $line = $req->fetch(PDO::FETCH_ASSOC);
                }
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }    
    }

    public function getArray(){
        return $this->competition;
    }
}

class competition{
    private $name;
    private $date;
    private $location;
    private $description;
    private $id;
    private $informations;

    public function __construct($name,$date,$location,$description,$id,$informations){
        $this->name = $name;
        $this->date = $date;
        $this->location = $location;
        $this->description = $description;
        $this->id = $id;
        $this->informations = $informations;
    }

    public function getName(){
        return $this->name;
    }

    public function getDate(){
        return $this->date;
    }

    public function getLocation(){
        return $this->location;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getID(){
        return $this->id;
    }
    public function getInformations(){
        return $this->informations;
    }
    public function getAll(){
        $a = array('name' => $this->name, 'description' => $this->description, 'location' => $this->location, 'date' => $this->date, 'id' => $this->id, 'informations' =>$this->informations);
        return $a;
    }
}



?>