<!-- Article page -->


<div id="article-page">
    <div class="middle-column">
	<div class="border-title">
	    <h1 class="left-title">
		<?php echo $article->get("title"); ?>
	    </h1>
	    <div class="cl"></div>
	</div>
	
	<div class="article-content">
	    <h4>
		<span class="date"><?php echo PUBLISHED . " " . format_date($article->get("date")); ?></span>
		<span class="date"><?php echo BY; ?></span>
		<span class="author"><a href="#"><?php echo $article->get("author")->get("pseudo"); ?></a></span>
	    </h4>
	    <p>
		<?php echo nl2br($article->get("text")); ?>
	    </p>
	</div>
	
	<div class="article-comments">
	    <h2><?php echo COMMENTS_LIST; ?></h2>
	    <?php
		foreach($article->get("comments") as $comment){
		    $url_image = get_url_image($comment->get("author"));
		    $alt_image = "avatar de " . $comment->get("author")->get("pseudo");
	    ?>
	    <div class="one-comment">
		<div class="comment-user-image">
		    <img src="<?php echo $url_image; ?>" alt="<?php echo $alt_image;?>" width="100px" />
		</div>
		<div class="comment-body">
		    <div class="comment-header">
			<span class="author"><a href="#"><?php echo $comment->get("author")->get("pseudo"); ?></a></span>
			<span class="date"><?php echo PUBLISH . " " . format_date($comment->get("date")); ?></span>
		    </div>
		    <p><?php echo $comment->get("text"); ?></p>
		</div>
		
		<div class="cl"></div>
	    </div>
	    <?php
		}
	    ?>
	</div>
    </div>
</div>