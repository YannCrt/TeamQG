<?php 
include "$racine/model/events_class.php";

$events = new CreateEvents;
$events = $events->getArray();

?>