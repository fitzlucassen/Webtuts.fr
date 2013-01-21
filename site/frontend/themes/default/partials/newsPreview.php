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