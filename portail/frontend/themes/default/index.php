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
	<script language="javascript">
	   document.getElementById('mail').focus();
	</script>
	<title>Webtuts</title>
    </head>

    <body>
	<div id="box">

	    <div class="header-bar">
	    </div>
	    <div class="header-bar darken">
	    </div>
	    

	    <h1>Webtuts.fr</h1>

	    <div id="barre-middle">
	    	<div id="barre-middle-content">
	    		<div id="corner-right">
	    			<div class="bar-corner">
	    			</div>
	    			<div class="bar-corner-dark">
	    			</div>
	    		</div>
	    		<div id="corner-left">
	    			<div class="bar-corner">
	    			</div>
	    			<div class="bar-corner-dark">
	    			</div>
	    		</div>
	    		<div style="clear: both;">
	    		</div>
	    	</div>
	    </div>


	    <h3><?php echo IN_CONSTRUCTION; ?></h3><br/>
	    <p><?php echo DESCRIPTION_AND_SUBSCRIBE; ?></p>

	    <div id="newsletter">
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

		<form id="saveme" action="<?php echo _host_absolute_ . $lang; ?>/home" method="POST" enctype="multipart/form-data">
		    <div id="content">
			<div id="sender" onClick="getElementById('saveme').submit();">
			    >
			</div>
			<input placeholder="Adresse email" type="text" id="mail" name="mail"/>
		    </div>
		</form>
		<?php
		    endif;
		?>
	    </div>
	    
	    <div id="footer">
		&copy; Webtuts.fr - 
		<a href="<?php echo _host_absolute_; ?>fr/" class="image">
		    <img src="<?php echo _host_absolute_ . _theme_path_; ?>images/flag_fr.png" alt="Traduire en français"/>
		</a>
		&nbsp;
		<a href="<?php echo _host_absolute_; ?>en/" class="image">
		    <img src="<?php echo _host_absolute_ . _theme_path_; ?>images/flag_en.png" alt="Translate in English"/>
		</a> -
		<a href="mailto:contact@webtuts.fr">Contact</a> - 
		<iframe src="http://www.facebook.com/plugins/like.php?href=http://facebook.com/webtuts.fr&layout=button_count&show_faces=false&width=100&action=like&colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="margin-bottom: -10px;margin-left: 5px;border:none; overflow:hidden; width: 100px; height:25px"></iframe>
	    </div>

	</div><!-- END #container -->
    </body>
</html>
