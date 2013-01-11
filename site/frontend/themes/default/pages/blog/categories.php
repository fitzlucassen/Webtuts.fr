<!-- Categories page -->


<div id="categories-page">
    <!-- Categories content -->
    <div class="middle-column">
	<div class="border-title">
	    <h1 class="middle-title">
		<?php echo CATEGORIES_TITLE; ?>
	    </h1>
	</div>
	
	<div id="explanation-text-page">
	    <p><?php echo CATEGORIES_TEXT; ?></p>
	</div>
	
	<div class="content-container">
	    <?php
		foreach($cats as $cat){
		    $url_image = get_url_image($cat);
	    ?>
		    <div class="one-article no-float">
			<div class="left" style="width: 339px; height: 216px;text-align: center;">
			    <img src="<?php echo $url_image; ?>" alt="<?php echo CATEGORY_IMAGE . " " . $cat->get("name"); ?>" />
			</div>

			<div class="left article-content">
			    <h2><?php echo $cat->get("name"); ?></h2>
			    <p class="content-introduction">
				<?php
				    echo short_description($cat->get("description"));
				?>
			    </p>
			    <div class="more-container">
				<p class="show-more">[...] <a href="#"><?php echo SEE_TUTO; ?></a>
				</p>
			    </div>
			</div>
			<div class="cl"></div>

			<div class="article-category left">
			    <img src="<?php echo '/'._theme_path_ . 'images/'; ?>angle.png" alt="<?php echo ALT_HEADBAND; ?>" />
			    <a href="#">
				<?php echo $cat->get("articles")->count(); ?> <?php echo TUTOS; ?>
			    </a>
			</div>
			<div class="cl"></div>
			
		    </div>
	    <?php
		}
	    ?>
	    <div class="cl"></div>
	</div>
	
	<aside>
	    <!-- News -->
	    <div class="border-title">
		<h1 class="right-title"><?php echo NEWS_WORD; ?></h1>
	    </div>
	    <div id="news-box" class="aside-box">
		<?php
		    foreach($news as $new) {
		?>
			<div class="one-news">
			    <div class="border-title">
				<h4 class="left-title">
				    <?php echo $new->get("title"); ?> - 
				    <span class="date"><?php echo THE . " " . format_date($new->get("date")); ?></span>
				</h4>
			    </div>

			    <p>
				<?php echo short_description($new->get("text"), 140); ?>
			    </p>
			    <div class="news-footer">
				<p class="show-more">
				    [...] <a href="#"><?php echo SEE_MORE; ?></a>
				</p>
				<p class="comment">
				    <a href="#"><?php echo $new->get("comments")->count() . " " . COMMENTS; ?></a>
				</p>
				<div class="cl"></div>

			    </div>
			</div>
		<?php
		    }
		?>

		<div class="marginAuto">
		    <div class="button big-button">
			<span>
			    <a href="#"><?php echo SEE_NEWS; ?></a>
			</span>
		    </div>
		</div>
	    </div>
	</aside>
	<div class="cl"></div>
	
    </div>
</div>