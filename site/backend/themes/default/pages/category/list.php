<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;margin-bottom: 10px;">
		<div style="font-size: 1.6em;float: left;">
			Liste des catégories
		</div>
		<div style="overflow: hidden;padding-top:10px;padding-left: 20px;">
			<a href="/category/add" style="display: inline-block;padding-right: 5px;padding-left: 5px;">Ajouter une catégorie</a>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	
	<?php for ($cpt=0;$cpt<$categories->count();$cpt++) : ?>
		<a href="/category/show/<?php echo $categories->get($cpt)->get("id"); ?>"><?php echo $categories->get($cpt)->get("name")->get("fr"); ?></a> ( <?php echo $categories->get($cpt)->get("name")->get("en"); ?> )<br /><br />
	<?php endfor; ?>

</div>