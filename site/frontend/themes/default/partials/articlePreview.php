<div class="one-article">
    <div class="left" style="width: 339px; height: 216px;text-align: center;">
	    <img src="<?php echo $url_image; ?>" alt="<?php echo ARTICLE_IMAGE . " " . $article->get("title"); ?>" />
    </div>

    
    <div class="left article-content">
	<h2><?php echo $article->get("title"); ?></h2>

	<p class="article-caption">
	    <span class="date"><?php echo THE . " " . format_date($article->get("date")) . " " . BY; ?></span>
	    <a href="#"><?php echo $article->get("author")->get("pseudo"); ?></a>
	</p>
	<p class="content-introduction">
	    <?php echo short_description($article->get("text")); ?>
	</p>
	<div class="more-container">
	    <p class="show-more">
		[...] <a href="<?php echo '/'. Kernel::getUrl("blog/article/" . $article->get("id")); ?>"><?php echo SEE_MORE; ?></a>
	    </p>
	    <p class="comment">
		<a href="#">
		    <img src="<?php echo '/'._theme_path_ . 'images/'; ?>bulle.png" alt="<?php echo ALT_SEE_COMMENTS; ?>" />
		    <?php echo $article->get("comments")->count() . " " . COMMENTS; ?>
		</a>
	    </p>
	</div>
    </div>
    <div class="cl"></div>

    
    <div class="article-category left">
	<img src="<?php echo '/'._theme_path_ . 'images/'; ?>angle.png" alt="<?php echo ALT_HEADBAND; ?>" />
	<?php echo $article->get("category")->get("name"); ?>
    </div>

    
    <div class="article-tags left">
	<?php 
	    foreach($article->get("tags") as $tag) {
	?>
		<a href="#" class="article-tag">
		    <?php echo $tag->get("name"); ?>
		</a>
	<?php
	    }
	?>
    </div>
    <div class="cl"></div>

    <div class="hover-article">
	<a href="<?php echo '/'. Kernel::getUrl("blog/article/" . $article->get("id")); ?>">
	    <div class="left-hover">
		Voir l'
	    </div>
	    <div class="right-hover">
		article
	    </div>
	</a>
    </div>
</div>