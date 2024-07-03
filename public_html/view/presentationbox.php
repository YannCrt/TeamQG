<div <?php echo"id = '$Name'";?> class ='presentation_box' >
    <div class = 'fill_box'>
    </div>

    <div class ='member_box'>
        <a class = 'close' onclick='clickOnMember("<?php echo"$Name";?>")'></a>

        <a class = 'close' onclick='clickOnMember("<?php echo"$Name";?>")'></a>

        <img class= 'box_image' src = '<?php echo"../$imagepath";?>' width='50px'></img>

        <h3 class = 'member_name'><?php echo"$Name";?></h3>

        <div class = 'member_description'>
            <p class = 'member_description'><span><?php echo"$Description";?></span></p>
        </div>
    </div>
</div>
