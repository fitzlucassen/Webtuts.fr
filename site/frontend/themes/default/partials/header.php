<header>
	<div id="top-header">
		<div id="oiseau-anime">
			<img src="<?php echo '/'._theme_path_ . 'images/'; ?>oeuil-oiseau.png" alt="<?php echo ALT_BIRD_EYE; ?>" class="bird-eye" id="left-eye"/>
			<img src="<?php echo '/'._theme_path_ . 'images/'; ?>oeuil-oiseau.png" alt="<?php echo ALT_BIRD_EYE; ?>" class="bird-eye" id="right-eye"/>
		</div>
		
		<div id="login-box">
			<a href="/user/subscription">
				<img src="<?php echo '/'._theme_path_ . 'images/'; ?>membership.png" alt="<?php echo ALT_MY_PROFILE; ?>" />
				<?php echo MY_PROFILE; ?>
			</a>
			
			<span>&nbsp;-&nbsp;</span>
			
			<a href="#"><?php echo CONNECTION; ?></a>
			<span>&nbsp;/&nbsp;</span>
			<a href="#"><?php echo INSCRIPTION; ?></a>
		</div>
		
		<div class="right search-flag-container">
			<div id="flag-box">
			    <a href="<?php echo _host_absolute_.Kernel::getUrl("fr/".Kernel::get("url"));?>">
					<img src="<?php echo '/'._theme_path_ . 'images/'; ?>flag_fr.png" alt="<?php echo ALT_TRANSLATE_FR; ?>" />
					<span class="flag-caption">FR</span>
				</a>
			    <a href="<?php echo _host_absolute_.Kernel::getUrl("en/".Kernel::get("url"));?>">
					<img src="<?php echo '/'._theme_path_ . 'images/'; ?>/flag_en.png" alt="<?php echo ALT_TRANSLATE_EN; ?>" />
					<span class="flag-caption">EN</span>
				</a>
			</div>
			
			<div id="search-box">
				<span><?php echo QUICK_SEARCH; ?> :</span>
				<input type="text" value="" class="input-template" placeholder="<?php echo PL_SEARCH; ?>" />
				<input type="submit" value="" class="button-search" />
			</div>
		</div>
		
		<div class="cl"></div>
	</div>
	
	<nav>
		<ul id="left-nav">
			<li><a href="/"><?php echo HOME; ?></a></li>
			<li><a href="/<?php echo Kernel::getUrl("blog/categories"); ?>"><?php echo CATEGORY; ?></a></li>
			<li><a href="/<?php echo Kernel::getUrl("blog/articles"); ?>"><?php echo ARTICLE; ?></a></li>			
		</ul>
		
		<div id="logo">
			<a href="/">
				<img src="<?php echo '/'._theme_path_ . 'images/'; ?>logo.png" alt="<?php echo ALT_LOGO; ?>" />
			</a>
		</div>
		
		<ul id="right-nav">
			<li><a href="/<?php echo Kernel::getUrl("blog/actualites"); ?>"><?php echo NEWS; ?></a></li>
			<li><a href="#"><?php echo SEARCH; ?></a></li>
			<li><a href="#"><?php echo CONTACT; ?></a></li>			
		</ul>
	</nav>
</header>