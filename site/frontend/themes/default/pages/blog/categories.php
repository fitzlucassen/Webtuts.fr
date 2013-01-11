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
	    <?php foreach($cats as $cat){
		    if($cat->get("image")){
			$url_image = __upload_dir__ . $cat->get("image")->get("name") . "." . $cat->get("image")->get("type");
		    }
		    else {
			$url_image = '/'._theme_path_ . 'images/' . 'article-image.png';
		    }
	    ?>
		
		<div class="one-article no-float">
		    <div class="left">
			    <img src="<?php echo $url_image; ?>" alt="<?php echo CATEGORY_IMAGE . " " . $cat->get("name"); ?>" width="339px" height="216px" />
		    </div>

		    <div class="left article-content">
			    <h2><?php echo $cat->get("name"); ?></h2>
			    <p class="content-introduction">
				    <?php echo $cat->get("description"); ?>
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
	    <?php } ?>
	    <div class="cl"></div>
	</div>
	
	<aside>
	    <!-- News -->
	    <div class="border-title">
		    <h1 class="right-title"><?php echo NEWS_WORD; ?></h1>
	    </div>
	</aside>
	
	<div class="cl"></div>
    </div>
</div>