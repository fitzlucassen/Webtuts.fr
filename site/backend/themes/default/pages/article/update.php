<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;margin-bottom: 10px;">
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

	<form action="" method="post">
		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
			Title
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<input name="title" type="text" value="<?php lang($article->get("title")); ?>"/>
		</div>

		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
			Text
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<textarea name="text"><?php lang($article->get("text")); ?></textarea>
		</div>

		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<input type="submit" value="Enregistrer">
		</div>
	</form>
</div>