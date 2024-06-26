<?php

$racine = $_SERVER['DOCUMENT_ROOT'];

logout();

header("Location: /?action=connexion");
exit();

?>