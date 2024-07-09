<p class="membres">Membres</p>
    
    <div class='allmembers'>
        <?php foreach ($members as $member) : ?>
            <div class='space_member'></div>
            <div class='members articles'>
                <article>
                    <figure>
                        <img src="<?php echo $member['imagefile']; ?>" alt="<?php echo $member['nom']; ?>">
                    </figure>
                    <div class="article-body">
                        <h2><?php echo $member['nom']; ?></h2>
                        <p class="description"><?php echo $member['description']; ?></p>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="../model/readmore.js"></script>
</body>