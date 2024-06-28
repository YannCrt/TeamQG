<?php
$objects = $members->getArray();
echo"<div class='space_member'></div>"; 

echo"<div class='members'>"; 
foreach($objects as $key => $object){
    $Name = $object->getName();
    $Description = $object->getDescription();
    $imagepath = "assets/membersimages/" . $object->getImagePath(); // Assurez-vous que le chemin est correct

    include "$racine/view/previewPresentation.php";
}

echo"</div>";
echo"<div class='space_member'></div>"; 
echo"<div class='boxes'>";

foreach($objects as $key => $object){
    $Name = $object->getName();
    $Description = $object->getDescription();
    $imagepath = "assets/membersimages/" . $object->getImagePath(); // Assurez-vous que le chemin est correct

    include "$racine/view/presentationbox.php";
}
echo"</div>";
?>
