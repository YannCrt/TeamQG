<div class = 'competition_mainscreeen'>
<h1 class = 'title'>ÉVENEMENT EN COURS.</h1>
</div>
<div class = 'events'>
<?php 
    $isevent = false;
    foreach ($events as $object){
        $event = $object->getAll();
        $currentdate = date('Y-m-d');

        if ($currentdate <= $event["date"]){
            $isevent = true;
            include "$racine/view/singleEvent.php";
        }
    }

    if(!$isevent){
        include "$racine/view/noEvent.php";
    }
?>
</div>