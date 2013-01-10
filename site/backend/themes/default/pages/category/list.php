<?php partial("pageHeader"); ?>
<?php for ($cpt=0;$cpt<1;$cpt++) : ?>
	<?php echo $categories->get($cpt)->get("name")->get("fr"); ?> ( <?php echo $categories->get($cpt)->get("name")->get("en"); ?> )<br /><br />
<?php endfor; ?>