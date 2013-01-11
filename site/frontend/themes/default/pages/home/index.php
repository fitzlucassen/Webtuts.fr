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
		<?php foreach($cats as $cat) { 
			if($cat->get("image")){
			    $url_image = __upload_dir__ . $cat->get("image")->get("name") . "." . $cat->get("image")->get("type");
			}
			else {
			    $url_image = '/'._theme_path_ . 'images/' . 'article-image.png';
			}
		?>
		    <li>
			    <a href="#">
				    <span><?php echo $cat->get("name"); ?></span>
				    <img src="<?php echo $url_image; ?>" alt="<?php echo CATEGORY_IMAGE . " " . $cat->get("name"); ?>" width="<?php echo $cat->get("image")->get("width"); ?>" />
			    </a>
		    </li>
		<?php } ?>
	    </ul>
	<div class="cl"></div>
    </div>

    <!-- Home page content -->
    <div id="middle-column">
	    <div class="border-title" id="main-title-article">
		    <h1 class="middle-title border-until"><?php echo LAST_ARTICLE; ?></h1>
	    </div>
	    <?php foreach($articles as $article) { 
		    	if($article->get("image")){
			    $url_image = __upload_dir__ . $article->get("image")->get("name") . "." . $article->get("image")->get("type");
			}
			else {
			    $url_image = '/'._theme_path_ . 'images/' . 'article-image.png';
			}
	    ?>
		<div class="one-article">
			<div class="left" style="width: 339px; height: 216px;text-align: center;">
				<img src="<?php echo $url_image; ?>" alt="<?php echo ARTICLE_IMAGE . " " . $article->get("title"); ?>" />
			</div>

			<div class="left article-content">
				<h2><?php echo $article->get("title"); ?></h2>
				<p class="article-caption"><span class="date"><?php echo THE . " " . format_date($article->get("date")) . " " . BY; ?></span> <a href="#"><?php echo $article->get("author")->get("pseudo"); ?></a></p>
				<p class="content-introduction">
					<?php echo $article->get("text"); ?>
				</p>
				<div class="more-container">
				    <p class="show-more">[...] <a href="#"><?php echo SEE_MORE; ?></a>
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
			    <?php foreach($article->get("tags") as $tag) { ?>
				<a href="#" class="article-tag">
				    <?php echo $tag->get("name"); ?>
				</a>
			    <?php } ?>
			</div>

			<div class="cl"></div>
		</div>
	    <?php } ?>
    </div>

    <!-- Sidebar -->
    <aside>
	    <!-- News -->
	    <div class="border-title">
		    <h1 class="right-title"><?php echo NEWS_WORD; ?></h1>
	    </div>

	    <div id="news-box" class="aside-box">
		    <div class="one-news">
			    <div class="border-title">
				    <h4 class="left-title">Titre Actualité n°1 - <span class="date"><?php echo THE; ?> 14/12/2012</span></h4>
			    </div>

			    <p>Ici les 140 premiers caractères de l'actualité n°1 servant à résumer l'actualité avant de pouvoir la consulter. L'internaute voit si elle l'intéresse ou non.
			    <div class="news-footer">
				    <p class="show-more">[...] <a href="#"><?php echo SEE_MORE; ?></a>
				    </p>
				    <p class="comment">
					    <a href="#">13 <?php echo COMMENTS; ?></a>
				    </p>
				    <div class="cl"></div>
			    </div>
		    </div>

		    <!-- TODO: DELETE -->
		    <div class="one-news">
			    <div class="border-title">
				    <h4 class="left-title">Titre Actualité n°1 - <span class="date"><?php echo THE; ?> 14/12/2012</span></h4>
			    </div>

			    <p>Ici les 140 premiers caractères de l'actualité n°1 servant à résumer l'actualité avant de pouvoir la consulter. L'internaute voit si elle l'intéresse ou non.
			    <div class="news-footer">
				    <p class="show-more">[...] <a href="#"><?php echo SEE_MORE; ?></a>
				    </p>
				    <p class="comment">
					    <a href="#">13 <?php echo COMMENTS; ?></a>
				    </p>
				    <div class="cl"></div>
			    </div>
		    </div>
		    <!-- End TODO -->
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
		    <a href="#" id="facebook-social">
			    Facebook
		    </a>
		    <a href="#" id="twitter-social">
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

	    <!-- TODO: put twitter feedback -->
	    <div id="twitter-box" class="aside-box">
		<a class="twitter-timeline" href="https://twitter.com/webtuts_fr" data-widget-id="288663232435077120">Tweets de @webtuts_fr</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	    </div>
    </aside>

    <div class="cl"></div>
</div>