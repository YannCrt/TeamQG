<div class="competition_mainscreeen">
    <h1 class="title">COMPÉTITION EN COURS.</h1>
</div>
<div class="events">
<?php 
    require_once "$racine/model/competitions.php";
    
    $competitions = getAllCompetitions(); // Obtient tous les événements
    
    if (!empty($competitions)) {
        $iscompetition = false;
        $currentdate = date('Y-m-d');

        foreach ($competitions as $competition) {
            if ($currentdate <= $competition["datecompetition"]) {
                $iscompetition = true;
                include "$racine/view/singlecompetition.php";
            }
        }

        if (!$iscompetition) {
            include "$racine/view/nocompetition.php";
        }
    } else {
        // Aucun événement trouvé
        include "$racine/view/nocompetition.php";
    }
?>
</div>
S