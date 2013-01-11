<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;">
		<div style="font-size: 1.6em;float: left;">
			<?php echo ucfirst(text("comments")); ?>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<?php foreach ($comments as $comment) : ?>
	<a href="<?php echo createLink("/comment/show/".$comment->get("id")); ?>">
	<div style="border-bottom: 1px solid #E5E5E5;padding: 15px;">	
		<div style="float: left;width: 200px;">
			<?php echo lang($comment->get("autor")->get("pseudo")); ?>
		</div>
		<div style="overflow: hidden;padding-top: 1px;padding-left: 10px;">
			<span style="font-size: 0.8em;color: grey;"><?php echo lang($comment->get("text")); ?></span>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	</a>
	<?php endforeach; ?>

</div>