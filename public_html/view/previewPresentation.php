<article>
    <figure>
        <img src="<?php echo htmlspecialchars($imagepath); ?>" alt="<?php echo htmlspecialchars($Name); ?>">
    </figure>
    <div class="article-body">
        <h2><?php echo htmlspecialchars($Name); ?></h2>
        <p><?php echo htmlspecialchars($Description); ?></p>
        <a href="#" id="read-more-<?php echo htmlspecialchars($Name); ?>" onclick='clickOnMember("<?php echo htmlspecialchars($Name); ?>"); return false;'>
            Read more <span class="icon">→</span>
        </a>
    </div>
</article>