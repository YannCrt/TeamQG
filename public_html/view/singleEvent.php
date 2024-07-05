<div class = 'parent_competition'>
    <div class = 'competition_section'>
        <div class = 'competition_name_date'>
            <?php echo"<p class = 'competition_name'>$event[name]</p> 
            <p class='competition_date'>$event[date]</p>"; ?>
        </div>

        <div class = 'competition_description_location'>
            <?php echo"<p class ='competition_location'>$event[location]</p>"; ?>
        </div>

        <div class = 'competition_details' onclick='clickOnMember("<?php echo"$event[name]";?>")'>
            <p>Plus de détails</p>
        </div>
    </div>
</div>

<div id ='<?php echo"$event[name]";?>'class = 'competition_description'>
    <div class = 'description_blackbackground'>
    </div>

    <div class = 'event_box'>
        <div class = 'competition_close_button'> 
            <a class = 'close' onclick='clickOnMember("<?php echo"$event[name]";?>")'></a>
        </div>

        <div class = 'event_image_divsion'>
            <img class ='event_image'<?php echo"src = $origin/$event[imagepath]";?>>
        </div>

       <div class = "description-container">
        <div class = 'event_description_div'>
                <p class ='competition_description_text'><?php echo"$event[description]";?></p>
            </div>
       </div>

       <div class = 'competition_signups'>
            <form action='./?_=signin_competitions&competitionid=<?php echo"$event[idEvent]";?>&show_form=true&form_name=<?php echo"$event[name]";?> method="post"'>
                <input type="hidden" name="form_informations" value = "<?php echo"$event[informations]";?>">
                <input type="hidden" name="sentName" value = "<?php echo"$event[name]";?>">
                <input type="hidden" name="origin" value = "event">
                <input class = 'competition_button_signup' type ='submit' name = 'confirm' width = '20' value ="S'inscrire" onclick = ''></a>
            </form>
        </div>
    </div>
</div>
