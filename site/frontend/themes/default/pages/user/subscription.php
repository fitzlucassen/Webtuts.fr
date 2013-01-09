<div id="subscription-page">
<!-- Subscription content -->
    <div class="middle-column">
	<div class="border-title">
		<h1 class="middle-title">
		    <?php echo SUBSCRIPTION_TITLE; ?>
		</h1>
	</div>
	
	<div id="explanation-text">
	    <p><?php echo SUBSCRIPTION_TEXT; ?></p>
	</div>
	
	<form action="#" method="post" id="register-form">
	    <div class="left-column">
		<div class="border-title">
		    <h2 class="left-title">
			<?php echo MANDATORY_INFORMATIONS; ?>
		    </h2>
		</div>
		
		<label class="label"><?php echo LBL_CIVILITE; ?></label>
		<input type="radio" name="civilite" id="man-civilite" /><label for="man-civilite"><?php echo LBL_MAN; ?></label>
		<input type="radio" name="civilite" id="woman-civilite" /><label for="woman-civilite"><?php echo LBL_WOMAN; ?></label>

		<label class="label"><?php echo LBL_NAME; ?></label>
		<input type="text" name="firstname" value="" placeholder="<?php echo PL_NAME; ?>" />

		<label class="label"><?php echo LBL_FIRSTNAME; ?></label>
		<input type="text" name="name" value="" placeholder="<?php echo PL_FIRSTNAME; ?>" />

		<label class="label"><?php echo LBL_PSEUDO; ?></label>
		<input type="text" name="pseudo" value="" placeholder="<?php echo PL_PSEUDO; ?>" />

		<label class="label"><?php echo LBL_EMAIL; ?></label>
		<input type="text" name="email" value="" placeholder="<?php echo PL_EMAIL; ?>" />
	    </div>

	    <div class="right-column">
		<div class="border-title">
		    <h2 class="left-title">
			<?php echo OPTIONAL_INFORMATIONS; ?>
		    </h2>
		</div>

		<label class="label"><?php echo LBL_PAYS; ?></label>
		<select name="pays">
		    <option>France</option>
		</select>
		
		<label class="label"><?php echo LBL_VILLE; ?></label>
		<input type="text" name="firstname" value="" placeholder="<?php echo PL_VILLE; ?>" />
		
		<label class="label"><?php echo LBL_LANGAGE; ?></label>
		<input type="checkbox" name="language" value="" id="langage-php" /><label for="langage-php">&nbsp; PHP</label>
	    </div>
	    
	    <div class="cl"></div>
	</form>
	
    </div>
</div>