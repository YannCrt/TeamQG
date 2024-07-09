<div class="competition_mainscreeen">
    <h1 class="title">ÉVENEMENT EN COURS.</h1>
</div>
<div class="events">
<?php 
    require_once "$racine/model/events.php";
    
    $events = getAllEvents(); // Obtient tous les événements
    
    if (!empty($events)) {
        $isevent = false;
        $currentdate = date('Y-m-d');

        foreach ($events as $event) {
            if ($currentdate <= $event["date_event"]) {
                $isevent = true;
                include "$racine/view/singleEvent.php";
            }
        }

        if (!$isevent) {
            include "$racine/view/noEvent.php";;
        }
    } else {
        // Aucun événement trouvé
        include "$racine/view/noEvent.php";
    }
?>
</div>