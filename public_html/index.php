<?php
$root = dirname(__FILE__);
$origin = "..";

include("$root/model/handler.php");
include ("$root/model/databaselogin.php");
if (isset($_GET["_"])) {
    $action = $_GET["_"];
}
else {
    $action = "default";
}

$file = controllerhub($action);
include "$root/controller/$file";
?>
