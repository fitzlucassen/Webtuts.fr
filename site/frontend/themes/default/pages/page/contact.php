<div id="contact-page">
<!-- contact content -->
    <div class="middle-column">
	<div class="border-big-title">
		<h1 class="left-title big-title">
		    <?php echo CONTACT_US; ?>
		</h1>
	    <div class="cl"></div>
	</div>
	<br /><br />
	Vous avez une question, un problème ? N'hésitez pas à nous le dire grâce à ce formulaire :
	<br /><br /><br />
	
	<form method="post" action="" id="contact-form">
	    <label class="label-contact">Pseudo :</label>
	    <input class="input-contact" type="text" name="pseudo" value="" placeholder="Pseudo" required/>	
	    
	    <div class="cl"></div>

	    <label class="label-contact">Courriel :</label>
	    <input class="input-contact" type="text" name="courriel" value="" placeholder="Courriel" required/>	
	    
	    <div class="cl"></div>

	    <label class="label-contact">Objet de votre message :</label>
	    <input class="input-contact" type="text" name="object" value="" placeholder="Objet du message" required/>	
	    
	    <div class="cl"></div>
	    
	    <label class="label-contact" label>Message :</label>
	    <textarea class="textarea-contact" name="message" cols="10" rows="10" placeholder="Votre message" required></textarea>
	    
	    <div class="cl"></div>
	    
	    <div class="marginAuto-contact">
			<div class="button big-button">
			    <span>
				<input type="submit" value="Envoyer" />
			    </span>
			</div>
	    </div>
	</form>
    </div>
</div>