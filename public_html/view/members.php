<div id ='members' class = 'memberstitle'>
  <p>Membres</p>
</div>

<div class = 'allmembers'>
    <?php $objects = $members->getArray();
echo "<div class='space_member'></div>"; 

echo "<div class='members articles'>"; 
foreach ($objects as $key => $object) : ?>
    <article>
        <figure>
            <img src="<?php echo $object->getImagePath(); ?>" alt="<?php echo $object->getName(); ?>">
        </figure>
        <div class="article-body">
            <h2><?php echo $object->getName(); ?></h2>
            <p class="description"><?php echo $object->getDescription(); ?></p>
        </div>
    </article>
<?php endforeach; ?>
<script type='text/javascript' src='../model/readmore.js'></script>
</div>
</DIV>