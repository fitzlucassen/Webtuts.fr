<div class="one-comment">
    <div class="comment-user-image">
	<img src="<?php echo $url_image; ?>" alt="<?php echo $alt_image;?>" width="100px" />
    </div>
    <div class="comment-body">
	<div class="comment-header">
	    <span class="author"><a href="<?php echo Kernel::getUrl("user/profil/" . $comment->get("author")->get("pseudo")); ?>"><?php echo $comment->get("author")->get("pseudo"); ?></a></span>
	    <span class="date"><?php echo PUBLISH . " " . format_date($comment->get("date")); ?></span>
	</div>
	<p><?php echo $comment->get("text"); ?></p>
    </div>

    <div class="cl"></div>
</div>