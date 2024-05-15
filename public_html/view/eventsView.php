<div class = 'competition_mainscreeen'>
<h1 class = 'title'>évenement EN COURS.</h1>
</div>
<div class = 'events'>
<?php 
    $isevent = false;
    foreach ($events as $object){
        $event = $object->getAll();
        $currentdate = date('Y-m-d');

        if ($currentdate <= $event["date"]){
            $isevent = true;
            include "$root/view/singleEvent.php";
        }
    }

    if(!$isevent){
        include "$root/view/noEvent.php";
    }
?>
</div>