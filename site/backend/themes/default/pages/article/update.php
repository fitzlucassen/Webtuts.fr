<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;margin-bottom: 10px;">
		<div style="font-size: 1.6em;float: left;">
			<span style="color: grey;"><?php echo ucfirst(text("article")); ?> :</span> 
			<?php lang($article->get("title")); ?>
		</div>
		<div style="overflow: hidden;padding-top:10px;padding-left: 20px;">
			<a href="<?php echo createLink("/article/show/".$article->get("id")); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;"><?php echo ucfirst(text("description")); ?></a>
			<a href="<?php echo createLink("/article/update/".$article->get("id")); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;"><?php echo ucfirst(text("update")); ?></a>
			<a href="<?php echo createLink("/article/delete/".$article->get("id")); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;"><?php echo ucfirst(text("delete")); ?></a>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<form action="" method="post">
		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
			<?php echo ucfirst(text("title")); ?>
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<input name="title" type="text" value="<?php lang($article->get("title")); ?>"/>
		</div>
		<div style="clear: left;">
		</div>

		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
			<?php echo ucfirst(text("text")); ?>
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<textarea name="text"><?php lang($article->get("text")); ?></textarea>
		</div>
		<div style="clear: left;">
		</div>

		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<input type="submit" value="<?php echo ucfirst(text("save")); ?>">
		</div>
		<div style="clear: left;">
		</div>
	</form>
</div>