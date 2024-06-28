<div class = 'parent_competition'>
    <div class = 'competition_section'>
        <div class = 'competition_name_date'>
            <?php echo"<p class = 'competition_name'>$comp[name]</p> 
            <p class='competition_date'>$comp[date]</p>"; ?>
        </div>

        <div class = 'competition_description_location'>
        <?php echo"<p class ='competition_location'>$comp[location]</p>"; ?>
        </div>
    </div>
</div>

<div id ='<?php echo"$comp[name]";?>'class = 'competition_description'>
    <div class = 'description_blackbackground'>
    </div>

    <div class = 'competition_box'>
        <div class = 'competition_close_button'> 
        <a class = 'close' onclick='clickOnMember("<?php echo"$comp[name]";?>")'></a>
        </div>

        <div class = 'competition_description_div'>
        <p class ='competition_description_text'><?php echo"$comp[description]";?></p>
        </div>
        
        <div class = 'competition_signups'>
        <a href='./?_=signin_competitions&competitionid=<?php echo"$comp[id]";?>&show_form=true&form_name=<?php echo"$comp[name]";?>&form_informations=<?php echo"$comp[informations]";?>'><input class = 'competition_button_signup' type ='button' name = 'confirm' width = '20' value ="S'inscrire" onclick = ''/></a>
        </div>
    </div>
</div>
