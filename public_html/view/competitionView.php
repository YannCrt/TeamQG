<div class = 'competition_mainscreeen'>
<h1 class = 'title'>COMPéTTION EN COURS.</h1>
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
             include "$root/view/singlecompetition.php";
        }
    }

    if(!$db){
        $comp = array(
            "name" => "Aucune compétition en cours.",
            "date" => "",
            "description" =>"",
            "location" => ""
        );
        include "$root/view/nocompetition.php";
    }

    ?>
</div>