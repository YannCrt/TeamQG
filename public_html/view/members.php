<?php
$objects = $members->getArray();
echo"<div class ='space_member'></div>"; 

 echo"<div class ='members'>"; 
foreach($objects as $key => $object){
    $Name = $object->getName();
    $Description = $object->getDescription();
    $imagepath = $object->getImagePath();

    include "$racine/view/previewPresentation.php";
}

echo"</div>";
echo"<div class ='space_member'></div>"; 
echo"<div class ='boxes'>";

foreach($objects as $key => $object){
    $Name = $object->getName();
    $Description = $object->getDescription();
    $imagepath = $object->getImagePath();

    include "$racine/view/presentationbox.php";
}
echo"</div>";
?>