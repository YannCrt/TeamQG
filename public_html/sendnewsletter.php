<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$valid_passwords = array ("krris" => "kaghy");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}

// If arrives here, is a valid user.
echo "<p>Welcome $user.</p>";
echo "<p>Congratulation, you are into the system.</p>";


$root = dirname(__FILE__);
require "$root/PHPMailer/src/Exception.php";
require "$root/PHPMailer/src/PHPMailer.php";
require "$root/PHPMailer/src/SMTP.php";

function DBconnection() {
    $login = "id21651260_teamqg";
    $mdp = "tGeMaq!96";
    $bd = "id21651260_teamqg";
    $serveur = "localhost";

    $currenturl = $_SERVER['REQUEST_URI'];
    //echo "$currenturl";
    $result = str_contains($currenturl,"/public_html/");

    try {
        $conn = new PDO("mysql:host=$serveur;dbname=$bd", $login, $mdp, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

$emails;

function getEmails(){
    try {
           $cnx = DBconnection();
           $req = $cnx->prepare("select * from newsletter");
           $req->execute();

           $line = $req->fetch(PDO::FETCH_ASSOC);
           $arrays = array();

           while ($line) {
            $arrays[] = array(
                "id" =>$line["id"],
                "nom" =>$line["nom"],
                "prenom" =>$line["prenom"],
                "email" =>$line["email"],
            );
            $line = $req->fetch(PDO::FETCH_ASSOC);
           }

           return $arrays;
       } catch (PDOException $e) {
           print "Erreur !: " . $e->getMessage();
           die();
       }    
}
function getPosts(){
    try {
           $cnx = DBconnection();
           $req = $cnx->prepare("select * from socialpost");
           $req->execute();

           $line = $req->fetch(PDO::FETCH_ASSOC);
           $arrays = array();

           while ($line) {
            $arrays[$line["id"]] = array(
                "id" =>$line["id"],
                "type" =>$line["origin"]
            );
            $line = $req->fetch(PDO::FETCH_ASSOC);
           }

           return $arrays;
       } catch (PDOException $e) {
           print "Erreur !: " . $e->getMessage();
           die();
       }    
}

function addPost($id,$type){
    try {
        $cnx = DBconnection();
        $req = $cnx->prepare("insert into socialpost values($id,'$type')");
        $req->execute();
        echo "<p>Added $id</p> <br>";
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    } 
}

$emails = getEmails();
$posts = getPosts();
$postsLimit = 5;

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "https://v1.nocodeapi.com/kaghy/instagram/csQjCltOHZVvtvbK?limit=$postsLimit",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_POSTFIELDS =>'{}',
    CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
    ),
));

$instagramresponse = curl_exec($curl);

curl_close($curl);
//echo $instagramresponse;
//print_r($emails);

$jsoninstaresult = json_decode($instagramresponse, true);
$mailcontent = "";

function addPostToMail($mailcontent,$link,$img) {
    $mailcontent .= "
    <div>
        <a href ='$link' target = '_blank'><img src ='$img' width = 20%/></a> 
        <a href ='$link' target = '_blank'><p>LIEN DE LA PUBLICATION</p></a> 
    </div>

    <br>
    <br>  
    ";

    return $mailcontent;
}

foreach ($jsoninstaresult['data'] as $key => $value) {
    $postid = $value['id'];
    $img = $value['media_url'];
    $link = $value['permalink'];
 
    if (!isset($posts[$postid])){
        addPost($postid,"instagram");
          $mailcontent = addPostToMail($mailcontent,$link,$img);
    }
    else{
        if ($posts[$postid]["type"] != "instagram"){
            addPost($postid,"instagram");
            $mailcontent = addPostToMail($mailcontent,$link,$img);
        }
    }
}

if ($mailcontent != "" ){
    $mailcontent.= "
    <div>
        <a href = 'https://www.instagram.com/team__qg/' target = '_blank'><p> Notre Instagram</p></a>
        <a href = 'https://www.youtube.com/@TeamQG-uf7es/featured' target = '_blank'><p> Notre Youtube</p></a>
    </div>
    ";
 }
echo $mailcontent;

foreach ($emails as $key => $newsinfo) {
    if ($mailcontent == "" ){
        echo("no new posts");
        break;
    }

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
        $mailToSend->addAddress($newsinfo["email"]);
        $mailToSend->isHTML(true);
        
        $prenom = $newsinfo["prenom"];
        $mailToSend->Subject = "Newsletter";
        $mailToSend->Body = "
        <h2>Salut $prenom,</h2>
        <br> 
        <h3>Voici les posts récents de l'association</h3>
        $mailcontent
        ";
      
        $mailToSend->send();
        
        }catch(Exception $e){
            //echo "$mailToSend->ErrorInfo";
         return;
    }
}
?>