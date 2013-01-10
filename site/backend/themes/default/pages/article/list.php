<div style="padding :20px;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;">
		<div style="font-size: 1.6em;float: left;">
			Articles
		</div>
		<div style="overflow: hidden;padding-top:10px;padding-left: 20px;">
			<a href="/article/add" style="display: inline-block;padding-right: 5px;padding-left: 5px;">Add an article</a>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<?php for ($cpt=0;$cpt<$articles->count();$cpt++) : ?>
	<div style="border-bottom: 1px solid #E5E5E5;padding: 15px;">	
		<div style="float: left;width: 200px;">
			<a href="/article/show/<?php echo $articles->get($cpt)->get("id"); ?>"><?php lang($articles->get($cpt)->get("title")); ?></a> 
		</div>
		<div style="overflow: hidden;padding-top: 1px;padding-left: 10px;">
			<span style="font-size: 0.8em;color: grey;"><?php lang($articles->get($cpt)->get("text")); ?></span>
		</div>
		<div style="clear: both;">
		</div>
	</div>
	<?php endfor; ?>

</div>