<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;margin-bottom: 20px;">
		<div style="font-size: 1.6em;float: left;">
			<span style="color: grey;">Article :</span> 
			<?php lang($article->get("title")); ?>
		</div>
		<div style="overflow: hidden;padding-top:10px;padding-left: 20px;">
			<a href="/article/show/<?php echo $article->get("id"); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;">Description</a>
			<a href="/article/update/<?php echo $article->get("id"); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;">Update</a>
			<a href="/article/delete/<?php echo $article->get("id"); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;">Delete</a>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
		Supression
	</div>
	<div style="overflow: hidden;padding: 15px;">
		Are you sur guy ?
	</div>
</div>