<?php 

class CreateEvents{
    private $event = array();   

    public function __construct(){
         try {
                $cnx = DBconnection();
                $req = $cnx->prepare("select * from events");
                $req->execute();

                $line = $req->fetch(PDO::FETCH_ASSOC);
                while ($line) {
                    $this->event[] = new event($line["nom"], 
                    $line["date_event"], $line["lieu"], 
                    $line["description"], $line["idEvent"], $line["image_path"],$line["informations"]);
                    $line = $req->fetch(PDO::FETCH_ASSOC);
                }
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage();
                die();
            }    
    }

    public function getArray(){
        return $this->event;
    }
}

class event{
    private $name;
    private $date;
    private $location;
    private $description;
    private $imagepath;
    private $informations;
    private $id;

    public function __construct($name,$date,$location,$description,$id,$imagepath,$info){
        $this->name = $name;
        $this->date = $date;
        $this->location = $location;
        $this->description = $description;
        $this->id = $id;
        $this->imagepath = $imagepath;
        $this->informations = $info;
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
        $a = array(
            'name' => $this->name,
            'description' => $this->description,
            'location' => $this->location,
            'date' => $this->date,
            'id' => $this->id,
            'imagepath' => $this->imagepath,
            'informations' => $this->informations);

        return $a;
    }
}



?>