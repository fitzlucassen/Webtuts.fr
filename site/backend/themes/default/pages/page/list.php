<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;">
		<div style="font-size: 1.6em;float: left;">
			<?php echo ucfirst(text("pages")); ?>
		</div>
		<div style="overflow: hidden;padding-top:10px;padding-left: 20px;">
			<a href="<?php echo createLink("/page/add"); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;"><?php echo ucfirst(text("add_a_page")); ?></a>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<?php foreach ($pages as $page) : ?>
	<div style="border-bottom: 1px solid #E5E5E5;padding: 15px;">	
		<div style="float: left;width: 200px;">
			<a href="<?php echo createLink("/page/show/".$page->get("id")); ?>"><?php echo lang($page->get("title")); ?></a>
		</div>
		<div style="overflow: hidden;padding-top: 1px;padding-left: 10px;">
			<span style="font-size: 0.8em;color: grey;"><?php echo minifyText(lang($page->get("content")), 400); ?></span>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	<?php endforeach; ?>

</div>