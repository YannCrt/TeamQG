<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "$root/PHPMailer/src/Exception.php";
require "$root/PHPMailer/src/PHPMailer.php";
require "$root/PHPMailer/src/SMTP.php";

require "$root/model/newsletterClass.php";

$nom = $_POST['nom'];
$prenom =$_POST['prenom'];
$email = $_POST['email'];

$newsletternew  = new NewsletterInscription;

$error = $newsletternew->Register($nom,$prenom,$email);

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
$mailToSend->Body = "<h2>Salut $prenom,</h2>
<p><br> Ton inscription à notre newsletter a bien été effectué<p>";
$mailToSend->send();

}catch(Exception $e){
    //echo "$mailToSend->ErrorInfo";
    $error = true;
    return;
}

include "$root/view/header.php";
include "$root/view/confirmationView.php";
include "$root/view/credits.php";
?>