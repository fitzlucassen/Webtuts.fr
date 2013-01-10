<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;">
		<div style="font-size: 1.6em;float: left;">
			Categories
		</div>
		<div style="overflow: hidden;padding-top:10px;padding-left: 20px;">
			<a href="/category/add" style="display: inline-block;padding-right: 5px;padding-left: 5px;">Add a category</a>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<?php for ($cpt=0;$cpt<$categories->count();$cpt++) : ?>
	<div style="border-bottom: 1px solid #E5E5E5;padding: 15px;">	
		<div style="float: left;width: 200px;">
			<a href="/category/show/<?php echo $categories->get($cpt)->get("id"); ?>"><?php lang($categories->get($cpt)->get("name")); ?></a> 
		</div>
		<div style="overflow: hidden;padding-top: 1px;padding-left: 10px;">
			<span style="font-size: 0.8em;color: grey;"><?php lang($categories->get($cpt)->get("description")); ?></span>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	<?php endfor; ?>

</div>