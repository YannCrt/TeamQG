<div id='<?php echo $Name; ?>' class='presentation_box'>
    <div class='fill_box'></div>

    <div class='member_box'>
        <a class='close' onclick='clickOnMember("<?php echo $Name; ?>")'></a>

        <img class='box_image' src='<?php echo $racine . "/" . $imagepath; ?>' width='50px' alt='<?php echo $Name; ?>' />

        <h3 class='member_name'><?php echo $Name; ?></h3>

        <div class='member_description'>
            <p class='member_description'><span><?php echo $Description; ?></span></p>
        </div>
    </div>
</div>
