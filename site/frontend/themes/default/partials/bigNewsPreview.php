<?php
    $urlNews = '/'. Kernel::getUrl("blog/actualite/" . Kernel::sanitize($new->get("title")));
?>

<div class="one-article one-big-news">
    <div class="left" style="width: 339px; height: 216px;text-align: center;">
	    <img src="<?php echo $url_image; ?>" alt="<?php echo NEWS_IMAGE . " " . $new->get("title"); ?>" />
    </div>

    
    <div class="left article-content">
	<h2><a href="<?php echo $urlNews; ?>"><?php echo $new->get("title"); ?></a></h2>

	<p class="article-caption">
	    <span class="date"><?php echo THE . " " . format_date($new->get("date")) . " " . BY; ?></span>
	    <a href="#"><?php echo $new->get("author")->get("pseudo"); ?></a>
	</p>
	<p class="content-introduction">
	    <?php echo short_description($new->get("text")); ?>
	</p>
	<div class="more-container">
	    <p class="show-more">
		[...] <a href="<?php echo $urlNews; ?>"><?php echo SEE_MORE; ?></a>
	    </p>
	    <p class="comment">
		<a href="#">
		    <img src="<?php echo '/'._theme_path_ . 'images/'; ?>bulle.png" alt="<?php echo ALT_SEE_COMMENTS; ?>" />
		    <?php 
			$nb_comment = $new->get("comments")->count();
			$text_comment = ($nb_comment > 1 ? COMMENTS : COMMENT);
			echo $nb_comment . " " . $text_comment;
		    ?>
		</a>
	    </p>
	</div>
    </div>
    <div class="cl"></div>

    
    <div class="article-tags left">
	<?php 
	    foreach($new->get("tags") as $tag) {
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
	<a style="width: 100%;height: 100%; display: block" href="<?php echo $urlNews; ?>">
	</a>
	<a href="<?php echo $urlNews; ?>">
	    <div class="left-hover">
		<p><?php echo LEFT_PRINT_NEWS; ?></p>
	    </div>
	    <div class="right-hover">
		<p><?php echo RIGHT_PRINT_NEWS; ?></p>
	    </div>
	</a>
    </div>
</div>