<div id="contact-page">
<!-- contact content -->
    <div class="middle-column">
	<div class="border-big-title">
		<h1 class="left-title big-title">
		    <?php echo CONTACT_US; ?>
		</h1>
	    <div class="cl"></div>
	</div>
	
	<form method="post" action="" id="contact-form">
	    <label class="label">Objet de votre message :</label>
	    <input type="text" name="object" value="" placeholder="Objet du message" required/>	
	    
	    <div class="cl"></div>
	    
	    <label class="label">Message :</label>
	    <textarea name="message" cols="10" rows="10" placeholder="Votre message" required></textarea>
	    
	    <div class="cl"></div>
	    
	    <div class="marginAuto">
		<div class="button big-button">
		    <span>
			<input type="submit" value="Envoyer" />
		    </span>
		</div>
	    </div>
	</form>
    </div>
</div>