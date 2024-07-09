<div class="competition_mainscreen">
    <h1 class="title">ÉVÉNEMENTS EN COURS</h1>
</div>
<div class="events">
<?php 
    require_once "$racine/model/events.php";
    
    $events = getAllEvents(); // Obtient tous les événements
    
    if (!empty($events)) {
        $isEvent = false;
        $currentDate = date('Y-m-d');

        foreach ($events as $event) {
            if ($currentDate <= $event["date_event"]) {
                $isEvent = true;
                include "$racine/view/singleEvent.php";
            }
        }

        if (!$isEvent) {
            include "$racine/view/noEvent.php";
        }
    } else {
        // Aucun événement trouvé
        include "$racine/view/noEvent.php";
    }
?>
</div>
