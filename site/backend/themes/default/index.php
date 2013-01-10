<?php
 	define("_theme_path_", __themes_dir__ . "default/");
	//include(__library_dir__ . "lang/" . Kernel::get("lang") . ".php");
	function partial($page) {
		include(_theme_path_."partials/".$page.".php");
	}
	function img($name) {
		echo '/'._theme_path_ . 'images/'.$name;
	}
?>
<html>
	<head>
		<?php include("partials/meta.php");//Kernel::get("cache")->inc(_theme_path_."partials/meta.php"); ?>
		<title>Page d'accueil Webtuts</title>
		<script></script>
	</head>
	<body style="padding: 0px;margin: 0px;font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;">

		<div id="global">
			<div style="float: left;width: 240px;height: 100%;background: #ECEFF6;border-right: 1px solid #E5E5E5;">
				<div style="padding: 20px;">
					<img src="<?php img("logo.png"); ?>" style="float: left;width: 50px;" alt="logo"/>
					<span style="float: left;font-size: 1.5em;padding: 6px;">Webtuts.fr</span>
					<div style="clear: left;margin-bottom: 20px;">
					</div>
					<a href="/category" style="display: block;padding: 5px;">Category</a>
					<a href="/article" style="display: block;padding: 5px;">Article</a>
					<a href="/comment" style="display: block;padding: 5px;">Comment</a>
					<a href="/node" style="display: block;padding: 5px;">Node</a>
					<a href="/page" style="display: block;padding: 5px;">Page</a>
					<a href="/tag" style="display: block;padding: 5px;">Tag</a>
					<a href="/user" style="display: block;padding: 5px;">User</a>
					<a href="/param" style="display: block;padding: 5px;">Param</a>
				</div>
			</div>
			<div style="overflow: hidden;">
			    	<?php include(_theme_path_."pages/".Kernel::get("controller").'/'.Kernel::get("action").".php"); ?>
			</div>
		</div>
	</body>
</html>