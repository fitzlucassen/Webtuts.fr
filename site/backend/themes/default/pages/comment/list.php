<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;">
		<div style="font-size: 1.6em;float: left;">
			<?php echo ucfirst(text("comments")); ?>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<?php foreach ($comments as $comment) : ?>
	<div class="comment" style="border-bottom: 1px solid #E5E5E5;padding: 15px;cursor: pointer;">	
		<div class="titleitem" style="float: left;width: 200px;">
			<a href="<?php echo createLink("/user/show/".$comment->get("author")->get("id")); ?>"><?php echo $comment->get("author")->get("pseudo"); ?></a>
			<span style="display: none;font-size: 0.8em;"><?php echo "Le ".printdate($comment->get("date")); ?></span>
		</div>
		<div class="descriptionitem" style="overflow: hidden;padding-top: 1px;padding-left: 10px;position: relative;">
			<span><?php echo lang($comment->get("article")->get("title")); ?></span>
			<span class="textcomment" style="margin-top: 10px;font-size: 0.8em;color: grey;display :none;"><?php echo $comment->get("text"); ?></span>		
			<form method="post" action=<?php echo createLink("/comment/delete"); ?>>
				<input type="hidden" name="id" value="<?php echo $comment->get("id"); ?>"/>
				<input type="submit" value="Supprimer" style="display: none; margin-top: 10px;" />
			</form>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	<?php endforeach; ?>

</div>