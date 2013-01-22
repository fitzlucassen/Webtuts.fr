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
	    <?php
		foreach($article->get("comments") as $comment){
	    ?>
	    <div class="one-comment">
		<div class="comment-header"></div>
		<div class="comment-body"><?php echo $comment->get("text"); ?></div>
	    </div>
	    <?php
		}
	    ?>
	</div>
    </div>
</div>