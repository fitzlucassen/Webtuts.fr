<!-- Category page -->


<div id="category-page">
    <div class="middle-column">
	<div class="border-title">
	    <h1 class="left-title">
		<?php echo $cat->get("name"); ?>
	    </h1>
	    <div class="cl"></div>
	</div>
	
	<div class="category-image">
	    <img src="<?php echo get_url_image($cat); ?>" alt="<?php echo CATEGORY_IMAGE . $cat->get("name");?>" />
	</div>
	
	<div class="category-content">
	    <p><?php echo $cat->get("description"); ?></p>
	    <h4><?php echo TUTOS_BY_CATEGORY . " " . count($cat->get("articles")) . " " . TUTOS;?></h4>
	    <div class="button big-button">
		<span>
		    <a href="#"><?php echo SEE_TUTOS_FROM_CATEGORY; ?></a>
		</span>
	    </div>
	</div>
	<div class="cl"></div>
    </div>
</div>