<?php
include_once "$racine/model/members.php";
$members = getMembers();
include "$racine/view/header.php";
include "$racine/view/homePage.php";
include "$racine/view/members.php";
include "$racine/view/credits.php";

?>
