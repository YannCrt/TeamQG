<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "$racine/PHPMailer/src/Exception.php";
require "$racine/PHPMailer/src/PHPMailer.php";
require "$racine/PHPMailer/src/SMTP.php";

include "$racine/model/competitionsHandler.php";
include "$racine/model/inscriptionClass.php";

$registration = new Inscription();

$data = $_POST["registration"];
$id = $_GET["id"];
$name = $data['name'];
$lastname = $data['lastname'];

//print_r($data);

$age = $data['age'];
$infos = $data['infos'];
$email = $data['email'];
$origin = $data['origin'];
$receivedName = $data['receivedName'];

try {
$mailToSend = new PHPMailer(true);
$mailToSend->isSMTP();

$mailToSend->Host = 'smtp.gmail.com';
$mailToSend->SMTPAuth = true;
$mailToSend->Username = "teamqgconfirmation@gmail.com";

$mailToSend->Password = "gjgf xnvd sevd jghd";
$mailToSend->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mailToSend->Port = 465;

$mailToSend->setFrom("teamqgconfirmation@gmail.com");
$mailToSend->addAddress($email);
$mailToSend->isHTML(true);

$mailToSend->Subject = "Confirmation de l'inscription";
$mailToSend->Body = "<h2>Salut $name,</h2>
<p><br> Ton inscription à <b>'$receivedName'</b> a bien été effectué on a hâte de t'y retrouver!<p>";
$mailToSend->send();

}catch(Exception $e){
    //echo "$mailToSend->ErrorInfo";
    //return;
}

$error = $registration->Register($name, $lastname, $age,$infos,$id,$email,$origin);

include "$racine/view/header.php";
include "$racine/view/confirmationView.php";
include "$racine/view/credits.php";
?>