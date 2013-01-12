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
					<span style="float: left;font-size: 1.5em;padding: 6px;">Webtuts</span>
					<div style="clear: left;margin-bottom: 20px;">
					</div>
					<a style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;color: #595A59;"><?php echo strtoupper(text("menu_blog")); ?></a>
						<a href="<?php echo createLink("/category"); ?>" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/folder.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 6px;"><?php echo ucfirst(text("menu_categories")); ?></span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="<?php echo createLink("/article"); ?>" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/page_green.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 6px;"><?php echo ucfirst(text("menu_articles")); ?></span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="<?php echo createLink("/comment"); ?>" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/comments.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 6px;"><?php echo ucfirst(text("menu_comments")); ?></span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="<?php echo createLink("/node"); ?>" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/box.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 6px;"><?php echo ucfirst(text("menu_nodes")); ?></span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="<?php echo createLink("/page"); ?>" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/page_white_stack.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 6px;"><?php echo ucfirst(text("menu_pages")); ?></span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="<?php echo createLink("/tag"); ?>" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/tag_green.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 6px;"><?php echo ucfirst(text("menu_tags")); ?></span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="<?php echo createLink("/user"); ?>" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/group.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 6px;"><?php echo ucfirst(text("menu_users")); ?></span>
							<span style="clear: left;display: block;"></span>
						</a>
						<br />
					<a style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;color: #595A59;"><?php echo strtoupper(text("menu_site")); ?></a>
						<a href="<?php echo createLink("/param"); ?>" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/cog.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 6px;"><?php echo ucfirst(text("menu_params")); ?></span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="<?php echo createLink("/statistic"); ?>" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/chart_bar.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 6px;"><?php echo ucfirst(text("menu_statistics")); ?></span>
							<span style="clear: left;display: block;"></span>
						</a>
						<a href="<?php echo createLink("/mail"); ?>" style="display: block;padding: 5px;font-size: 0.8em;font-weight: bold;margin-left: 10px;">
							<img style="float: left;" src="<?php img("icons/email.png") ?>" />
							<span style="display: inline-block;float: left;margin-left: 6px;"><?php echo ucfirst(text("menu_mail")); ?></span>
							<span style="clear: left;display: block;"></span>
						</a>
				</div>
			</div>
			<div style="overflow: hidden;">
		    	<?php include(_theme_path_."pages/".Kernel::get("controller").'/'.Kernel::get("action").".php"); ?>
		    	<div style="margin-top: 20px;border-top: 1px solid #E5E5E5;padding: 20px;font-size: 0.8em;">
					Temps de chargement de la page : <span style="font-weight: bold;"><?php echo round(microtime(TRUE)-time_start, 3); ?></span> sec
				</div>
			</div>
		</div>
	</body>
</html>