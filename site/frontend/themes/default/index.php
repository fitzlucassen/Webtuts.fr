<?php

	 define("_theme_path_", __themes_dir__ . "default/");
	 include(__library_dir__ . "lang/" . Kernel::get("lang") . ".php");
 	 include("functions.php");

?>
<html>
	<head>
	    <?php 
	    include("partials/meta.php");
	    //Kernel::get("cache")->inc(_theme_path_."partials/meta.php"); ?>
	    <title><?php echo get_title_from_url(Kernel::get("controller"),Kernel::get("action")); ?></title>
	    <link type="text/css" rel="stylesheet" href="<?php echo _host_absolute_ . _theme_path_ ?>css/<?php echo Kernel::get("action"); ?>.css" />
	</head>
	<body>
		<div id="global">
			<!-- Header -->
			<?php include("partials/header.php"); ?>
			
			<!-- Content -->
			<div id="content">
			    <?php include(_theme_path_."pages/".Kernel::get("controler").'/'.Kernel::get("action").".php"); ?>
			</div>
			
			<!-- Footer -->
			<?php include("partials/footer.php"); ?>
		</div>
	</body>
</html>