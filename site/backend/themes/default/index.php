<?php define("_theme_path_", __themes_dir__ . "default/"); include("functions.php"); ?>
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
					<a href="/category" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;color: #595A59;">CATEGORY</a>
						<a href="/category/list" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/chart_organisation.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 4px;">List</span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="/category/add" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/chart_organisation_add.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 4px;">Add</span>
							<span style="clear: left;display: block;"></span>
						</a>
					<a href="/article" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;color: #595A59;">ARTICLE</a>
						<a href="/article/list" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/chart_organisation.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 4px;">List</span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="/article/add" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/chart_organisation_add.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 4px;">Add</span>
							<span style="clear: left;display: block;"></span>
						</a>
					<a href="/comment" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;color: #595A59;">COMMENT</a>
					<a href="/node" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;color: #595A59;">NODE</a>
					<a href="/page" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;color: #595A59;">PAGE</a>
						<a href="/page/list" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/page_green.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 4px;">List</span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="/page/add" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/page_add.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 4px;">Add</span>
							<span style="clear: left;display: block;"></span>
						</a>
					<a href="/tag" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;color: #595A59;">TAG</a>
					<a href="/user" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;color: #595A59;">USER</a>
					<a href="/param" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;color: #595A59;">PARAM</a>
				</div>
			</div>
			<div style="overflow: hidden;">
			    	<?php include(_theme_path_."pages/".Kernel::get("controller").'/'.Kernel::get("action").".php"); ?>
			</div>
		</div>
	</body>
</html>