<?php 
    define("_theme_path_", _path_themes_ . "default/");

    $send = false;
    if(!empty($_POST["mail"])) {
        $send = true;
        if(mysql_result(mysql_query("SELECT COUNT(*) FROM newsletter WHERE mail='".mysql_real_escape_string($_POST["mail"])."'"), 0)==0) {
            if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL))
                mysql_query("INSERT INTO newsletter (mail) VALUES ('".mysql_real_escape_string($_POST["mail"])."')");
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

	    <p>Le site est en construction. Abonnez vous à notre newsletter :</p>

	    <div id="contact">
		<?php if($send && empty($error)) : ?>
		<p id="send-message">Envoyé !</p>
		<?php elseif($send && !empty($error)) : ?>
		    <?php if( $error == "allreadySigned") : ?>
		    <p id="error-message">Mail déjà enregistré !</p>
		    <?php else : ?>
		    <p id="error-message">Mail invalide !</p>
		    <?php endif; ?>
		<?php else: ?>
		<div id="sender" onClick="getElementById('saveme').submit();">
		    >
		</div>
		<div id="input">
		    <div id="container">
			<form id="saveme" action="" method="POST" enctype="multipart/form-data">
			    <input type="text" placeholder="Votre adresse mail" id="mail" name="mail"/>
			</form>
		    </div>
		</div>
		<?php endif; ?>
	    </div>
	    
	    <div id="footer">
		&copy; Webtuts.fr - <a href="mailto:contact@webtuts.fr">Contact</a>
	    </div>

	</div><!-- END #container -->
    </body>
</html>
