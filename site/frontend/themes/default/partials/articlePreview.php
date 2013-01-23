<div class="one-article">
    <div class="left" style="width: 339px; height: 216px;text-align: center;">
	    <img src="<?php echo $url_image; ?>" alt="<?php echo ARTICLE_IMAGE . " " . $article->get("title"); ?>" />
    </div>

    
    <div class="left article-content">
	<h2><a href="<?php echo Kernel::getUrl("blog/article/" . $article->get("id")); ?>"><?php echo $article->get("title"); ?></a></h2>

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
	<a class="aBlock" href="<?php echo '/' . Kernel::getUrl("blog/category/" . format_for_url($article->get("category")->get("id"))); ?>">
	    <?php echo $article->get("category")->get("name"); ?>
	</a>
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
	<a class="aBlock" href="<?php echo '/'. Kernel::getUrl("blog/article/" . $article->get("id") . "/" . format_for_url($article->get("category")->get("id"))); ?>">
	</a>
	<a href="<?php echo '/'. Kernel::getUrl("blog/article/" . $article->get("id") . "/" . format_for_url($article->get("category")->get("id"))); ?>">
	    <div class="left-hover">
		<p><?php echo LEFT_PRINT_ARTICLE; ?></p>
	    </div>
	    <div class="right-hover">
		<p><?php echo RIGHT_PRINT_ARTICLE; ?></p>
	    </div>
	</a>
    </div>
</div>