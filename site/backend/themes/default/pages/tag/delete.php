<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;margin-bottom: 20px;">
		<div style="font-size: 1.6em;float: left;">
			<span style="color: grey;"><?php echo ucfirst(text("tag")); ?> :</span> 
			<?php echo minifyText(lang($tag->get("name"))); ?>
		</div>
		<div style="overflow: hidden;padding-top:10px;padding-left: 20px;">
			<a href="<?php echo createLink("/tag/show/".$tag->get("id")); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;"><?php echo ucfirst(text("description")); ?></a>
			<a href="<?php echo createLink("/tag/update/".$tag->get("id")); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;"><?php echo ucfirst(text("update")); ?></a>
			<a href="<?php echo createLink("/tag/delete/".$tag->get("id")); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;"><?php echo ucfirst(text("delete")); ?></a>
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
	<div style="clear: left;">
	</div>
</div>