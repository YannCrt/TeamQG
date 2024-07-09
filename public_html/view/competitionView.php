<div class="competition_mainscreen">
    <h1 class="title">COMPÉTITION EN COURS</h1>
</div>
<div class="events">
<?php 
    require_once "$racine/model/competitions.php";
    
    $competitions = getAllCompetitions(); // Obtient toutes les compétitions
    
    if (!empty($competitions)) {
        $isCompetition = false;
        $currentDate = date('Y-m-d');

        foreach ($competitions as $competition) {
            if ($currentDate <= $competition["datecompetition"]) {
                $isCompetition = true;
                include "$racine/view/singlecompetition.php";
            }
        }

        if (!$isCompetition) {
            include "$racine/view/nocompetition.php";
        }
    } else {
        // Aucune compétition trouvée
        include "$racine/view/nocompetition.php";
    }
?>
</div>
