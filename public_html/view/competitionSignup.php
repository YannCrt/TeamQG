<?php 
$receivedName = "";
$form_informations = "";

$competitionid = $_GET['competitionid'];
if (isset($_GET['show_form']) && isset($_GET['form_name'])){
   $show_form = $_GET['show_form'];
   $form_name = $_GET['form_name'];
   
   try {
       $form_informations = $_POST['form_informations'];   
        $receivedName = $_POST['sentName'];
   }catch(Exception $e) {
       print($e);
   }  
   
}?>

<div class = 'competition_signuppage'>
<section>
<div class="signin"> 
 <div class="content"> 
  <h2><?php echo"$form_name";?></h2> 
  <div class="form"> 
   <form name ='competition_signupsform'  action = '.?_=confirmation&id=<?php echo"$competitionid";?>' method = 'POST'>
   <input type="hidden" id ='hidden-name' name='registration[receivedName]' value= '<?php echo "$receivedName"; ?>'> 
   
   <div class="inputBox"> 
    <input type="text" id='NomInput' name='registration[lastname]' required placeholder ='Nom'>   
   </div> 
   <div class="inputBox"> 
    <input type="text" id ='PrenomInput' name='registration[name]' required placeholder = 'Prénom'> 
   </div>
   <div class="inputBox"> 
    <input type="text" id ='EmailInput' name='registration[email]' required placeholder = 'Email'> 
   </div>
   <div class="inputBox"> 
    <input type="number" id ='AgeInput' name='registration[age]' required placeholder = 'Âge'> 
   </div>
   <div class = "info_box">
    <h1>Informations à fournir.<h1>
     <div class = 'extra_info'>
        <p><?php echo"$form_informations";?></p>
     </div>    
    </div>
   <div class="inputBox"> 
    <input type="submit" value="S'inscrire"> 
   </div>
   </form>
  </div> 
 </div> 
</div> 
</section>
</div>