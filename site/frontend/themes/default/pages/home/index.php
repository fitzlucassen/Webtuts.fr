<!-- Home page -->


<div id="home-page">
    <!-- Introduction -->
    <div id="explanation-text">
	<div class="border-title">
	    <h1 class="middle-title">
		<?php echo WEBTUTS_TITLE; ?>
	    </h1>
	</div>

	<p>
	    <?php echo WEBTUTS_INTRODUCTION_TEXT; ?>
	</p>
    </div>

    <!-- Categories sum up nav -->
    <div id="categories-box">
	<ul id="categories-nav">
	    <?php 
		foreach($cats as $cat) { 
		    $url_image = get_url_image($cat);
	    ?>
		    <li>
			<a href="#">
			    <span><?php echo $cat->get("name"); ?></span>
			    <img src="<?php echo $url_image; ?>" alt="<?php echo CATEGORY_IMAGE . " " . $cat->get("name"); ?>" width="<?php echo $cat->get("image")->get("width"); ?>" />
			</a>
		    </li>
	    <?php
		}
	    ?>
	</ul>
	<div class="cl"></div>
	
    </div>

    <!-- Home page content -->
    <div id="middle-column">
	<div class="border-title" id="main-title-article">
	    <h1 class="middle-title border-until"><?php echo LAST_ARTICLE; ?></h1>
	</div>
	<?php 
	    foreach($articles as $article) { 
		$url_image = get_url_image($article);
		
		include(_theme_path_ . "partials/articlePreview.php");
	    }
	?>
    </div>

    <!-- Sidebar -->
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

	<!-- Social -->
	<div class="border-title">
	    <h1 class="right-title"><?php echo FOLLOW_WEBTUTS; ?></h1>
	</div>

	<div id="social-box" class="aside-box">
	    <a href="https://www.facebook.com/webtuts.fr" id="facebook-social">
		Facebook
	    </a>
	    <a href="https://twitter.com/webtuts_fr" id="twitter-social">
		Twitter
	    </a>
	    <a href="#" id="rss-social">
		<?php echo RSS; ?>
	    </a>
	    <a href="#" id="newsletter-social">
		<?php echo NEWSLETTERS; ?>
	    </a>
	    <div class="cl"></div>
	    
	</div>

	<!-- Twitter feedback -->
	<div class="border-title">
	    <h1 class="right-title"><?php echo HAPPENS_ON_TWITTER; ?></h1>
	</div>

	<div id="twitter-box" class="aside-box">
	    <a class="twitter-timeline" href="https://twitter.com/webtuts_fr" data-widget-id="288663232435077120">Tweets de @webtuts_fr</a>
	    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</div>
    </aside>
    <div class="cl"></div>
    
</div>