<?php 
    define("_theme_path_", _path_themes_ . "default/");

    $send = false;
    if(!empty($_POST["mail"])) {
        $send = true;
        if(mysql_result(mysql_query("SELECT COUNT(*) FROM newsletter WHERE mail='".mysql_real_escape_string($_POST["mail"])."'"), 0)==0) {
            if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)){
                mysql_query("INSERT INTO newsletter (mail) VALUES ('".mysql_real_escape_string($_POST["mail"])."')");
		
		$Mail = new Mail(htmlspecialchars($_POST["mail"]), "Webtuts", "contact@webtuts.fr", BODY_MAIL_NEWSLETTER );
		$Mail->setSubject(HEADER_MAIL_NEWSLETTER);
		$Mail->sendMail();
	    }
            else 
                $error = "mailError";
        }
        else 
            $error = "allreadySigned";
    }
         
?>
<!DOCTYPE HTML>
<html>
    <head>
	<?php include("partials/meta.php"); ?>
	<title>Webtuts</title>
    </head>

    <body>
	<div id="box">

	    <div style="position: absolute;z-index: -1;top: 60px;left: 0px;width: 100%;height: 25px;background: #851126;">
	    </div>

	    <h1>Webtuts.fr</h1>

	    <h3><?php echo IN_CONSTRUCTION; ?></h3><br/>
	    <p><?php echo DESCRIPTION_AND_SUBSCRIBE; ?></p>

	    <div id="contact">
		<?php 
		    if($send && empty($error)) :
		?>
		<p id="send-message"><?php echo SENT; ?></p>
		<?php
		    elseif($send && !empty($error)) :
		?>
		    <?php
			if( $error == "allreadySigned") :
		    ?>
		<p id="error-message"><?php echo ALREADY_RECORD; ?></p>
		    <?php 
			else : 
		    ?>
		<p id="error-message"><?php echo INVALID_EMAIL; ?></p>
		    <?php
			endif;
		    ?>
		<?php
		    else:
		?>
		<div id="sender" onClick="getElementById('saveme').submit();">
		    >
		</div>
		<div id="input">
		    <form id="saveme" action="<?php echo _host_absolute_ . $Session->read('langue'); ?>/home" method="POST" enctype="multipart/form-data">
			<input type="text" placeholder="<?php echo YOUR_EMAIL; ?>" id="mail" name="mail"/>
		    </form>
		</div>
		<?php
		    endif;
		?>
	    </div>
	    
	    <div id="footer">
		&copy; Webtuts.fr - 
		<a href="<?php echo _host_absolute_; ?>set_language.php?lang=fr" class="image">
		    <img src="<?php echo _host_absolute_ . _theme_path_; ?>images/flag_fr.png" alt="Traduire en français"/>
		</a>
		&nbsp;
		<a href="<?php echo _host_absolute_; ?>set_language.php?lang=en" class="image">
		    <img src="<?php echo _host_absolute_ . _theme_path_; ?>images/flag_en.png" alt="Translate in English"/>
		</a> - 
		<a href="mailto:contact@webtuts.fr">Contact</a>
	    </div>

	</div><!-- END #container -->
    </body>
</html>
