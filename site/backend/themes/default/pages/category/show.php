<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;margin-bottom: 10px;">
		<div style="font-size: 1.6em;float: left;">
			<span style="color: grey;">Category :</span> 
			<?php print_r($category->get("name")->get("fr")); ?>
		</div>
		<div style="overflow: hidden;padding-top:10px;padding-left: 20px;">
			<a href="/category/show/<?php echo $category->get("id"); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;">Description</a>
			<a href="/category/update/<?php echo $category->get("id"); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;">Update</a>
			<a href="/category/delete/<?php echo $category->get("id"); ?>" style="display: inline-block;padding-right: 5px;padding-left: 5px;">Delete</a>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
		Name
	</div>
	<div style="overflow: hidden;padding: 15px;">
		<?php print_r($category->get("name")->get("fr")); ?>
	</div>

	<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
		Description
	</div>
	<div style="overflow: hidden;padding: 15px;">
		<?php print_r($category->get("description")->get("fr")); ?>
	</div>
</div>