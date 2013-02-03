<div id="profil-page">
<!-- profil content -->
    <div class="middle-column">
	<div class="border-title">
		<h1 class="left-title">
		    <?php echo WELCOME . " " . ucfirst($user->get("name")); ?>
		</h1>
	    <div class="cl"></div>
	</div>
	
	<?php
	    if(Kernel::get("session")->containsKey("first_connection") && Kernel::get("session")->get("first_connection")){
		echo '<div id="oiseau-congrats"></div>';
	    }
	?>
    </div>
</div>