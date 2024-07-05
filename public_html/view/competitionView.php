<div class = 'competition_mainscreeen'>
<h1 class = 'title'>COMPÉTITION EN COURS.</h1>
</div>
<div class = 'main_divcomp'>
    <?php 
    $db = false;
    $competitions = $competitions->getArray();
    
    foreach ($competitions as $object){
        $currentdate = date('Y-m-d');
        $comp = $object->getAll();
        
        if ($currentdate <= $comp["date"]){
            $db = true;
             include "$racine/view/singlecompetition.php";
        }
    }

    if(!$db){
        $comp = array(
            "name" => "Aucune compétition en cours.",
            "date" => "",
            "description" =>"",
            "location" => ""
        );
        include "$racine/view/nocompetition.php";
    }

    ?>
</div>