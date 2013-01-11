<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;">
		<div style="font-size: 1.6em;float: left;">
			<?php echo ucfirst(text("categories")); ?>
		</div>
		<div style="overflow: hidden;padding-top:10px;padding-left: 20px;">
			<a href="<?php echo createLink("/category/add"); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;"><?php echo ucfirst(text("add_a_category")); ?></a>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<?php foreach ($categories as $categorie) : ?>
	<div style="border-bottom: 1px solid #E5E5E5;padding: 15px;">	
		<div style="float: left;width: 200px;">
			<a href="<?php echo createLink("/category/show/".$categorie->get("id")); ?>"><?php lang($categorie->get("name")); ?></a> 
		</div>
		<div style="overflow: hidden;padding-top: 1px;padding-left: 10px;">
			<span style="font-size: 0.8em;color: grey;"><?php lang($categorie->get("description")); ?></span>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	<?php endforeach; ?>

</div>