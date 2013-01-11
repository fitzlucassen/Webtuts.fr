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

	<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
		<?php echo ucfirst(text("title")); ?>
	</div>
	<div style="overflow: hidden;padding: 15px;">
		<?php lang($article->get("title")); ?>
	</div>
	<div style="clear: left;">
	</div>

	<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
		<?php echo ucfirst(text("text")); ?>
	</div>
	<div style="overflow: hidden;padding: 15px;">
		<?php lang($article->get("text")); ?>
	</div>
	<div style="clear: left;">
	</div>

	<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
		<?php echo ucfirst(text("tags")); ?>
	</div>
	<div style="overflow: hidden;padding: 11px 15px;">
		<?php for($cpt=0;$cpt<$article->get("tag")->count();$cpt++) : ?>
		<div style="display: inline-block;padding: 4px 10px;font-size: 0.8em;background-color: rgb(227,223,223);margin-right: 5px;border-radius: 2px;-webkit-border-radius: 2px;-moz-border-radius: 2px;-o-border-radius: 2px;-ms-border-radius: 2px;">	
			<?php echo $article->get("tag")->get($cpt)->get("name"); ?><br />
		</div>
		<?php endfor; ?>
	</div>
	<div style="clear: left;">
	</div>
</div>