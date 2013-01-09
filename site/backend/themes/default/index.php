<?php
 	define("_theme_path_", __themes_dir__ . "default/");
	//include(__library_dir__ . "lang/" . Kernel::get("lang") . ".php");
	function partial($page) {
		include(_theme_path_."partials/".$page.".php");
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
					<a href="/category">Category</a><br />
					<a href="/article">Article</a><br />
					<a href="/comment">Comment</a><br />
					<a href="/node">Node</a><br />
					<a href="/page">Page</a><br />
					<a href="/tag">Tag</a><br />
					<a href="/user">User</a><br />
					<a href="/param">Param</a><br />
				</div>
			</div>
			<div style="overflow: hidden;">
			    	<?php include(_theme_path_."pages/".Kernel::get("controller").'/'.Kernel::get("action").".php"); ?>
			</div>
		</div>
	</body>
</html>