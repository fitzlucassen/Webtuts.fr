<div id="profil-page">
<!-- profil content -->
    <div class="middle-column">
	<div class="border-title">
		<h1 class="left-title">
		    <?php echo WELCOME . " " . ucfirst($user->get("pseudo")); ?>
		</h1>
	    <div class="cl"></div>
	</div>
	
	<div class="informations-major-container">
	    <h2><?php echo IDENTITY; ?></h2>
	    
	    <img src="<?php echo get_url_image($user); ?>" alt="<?php echo AVATAR . " " . ucfirst($user->get("name")) . " " . ucfirst($user->get("surname"));?>" width="80px" height="80px"/>
	    
	    <div class="pContainer">
		<label class="label"><?php echo RECOGNIZE_HIM . " :";?></label><p> <?php echo ucfirst($user->get("name")) . " " . ucfirst($user->get("surname")); ?></p>
		<label class="label"><?php echo CONTACT_HIM . " :";?></label><p> <?php echo $user->get("mail"); ?></p>
		<label class="label"><?php echo DATE_SIGNIN . " :";?></label><p> <?php echo format_date($user->get("datesignin")); ?></p>
	    </div>
	    
	    <div class="cl"></div>
	</div>
	<div class="informations-minor-container">
	     <h2><?php echo MORE_ABOUT_HIM . " " . ucfirst($user->get("name"));?></h2>
	     
	    <div class="pContainer">
		<label class="label"><?php echo FIND_HIM . " :";?></label><p> <?php echo ucfirst($user->get("city")) . " " . IN . " " . ucfirst($user->get("country")); ?></p>
		<label class="label"><?php echo SEE_WORK . " :";?></label><p><a href="<?php echo $user->get("site"); ?>"><?php echo $user->get("site"); ?></a></p>
		<label class="label"><?php echo WHAT_HE_DO . " :";?></label><p> <?php echo str_replace(",", ", ",$user->get("languages")); ?></p>
	    </div>
	    
	    <div class="cl"></div>
	</div>
	
	<div class="cl"></div>
    </div>
</div>