<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;">
		<div style="font-size: 1.6em;float: left;">
			<?php echo ucfirst(text("articles")); ?>
		</div>
		<div style="overflow: hidden;padding-top:10px;padding-left: 20px;">
			<a href="<?php echo createLink("/article/add"); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;"><?php echo ucfirst(text("add_an_article")); ?></a>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<?php for ($cpt=0;$cpt<$articles->count();$cpt++) : ?>
	<a class="itemlist" href="<?php echo createLink("/article/show/".$articles->get($cpt)->get("id")); ?>">
		<div class="titleitem" style="float: left;width: 400px;">
			<?php echo lang($articles->get($cpt)->get("title")); ?>
		</div>
		<div class="descriptionitem" style="position: relative;overflow: hidden;padding-top: 1px;padding-left: 10px;">
			<span style="font-size: 0.8em;color: grey;"><?php echo lang($articles->get($cpt)->get("text")); ?></span>
			<div class="borderitem" style="display: none;position: absolute;bottom: 0px;left: 0px;width: 100%;height: 2px;background: #E5E5E5;opacity: 0.7;">
			</div>
		</div>
		<div style="clear: both;">
		</div>
	</a>
	<?php endfor; ?>

</div>