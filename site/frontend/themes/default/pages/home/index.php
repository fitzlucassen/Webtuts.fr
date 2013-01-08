<!-- Introduction -->
					<div id="explanation-text">
						<div class="border-title">
							<h1 class="middle-title">
							    <?php echo WEBTUTS_TITLE; ?>
							</h1>
						</div>
						
						<p>
						    <?php echo WEBTUTS_INTRODUCTION_TEXT; ?>
						</p>
					</div>
					
					<!-- Categories sum up nav -->
					<div id="categories-box">
						<ul id="categories-nav">
							<li>
								<a href="#">
									<span>Intégration</span>
								</a>
								<a href="#">
									<img src="<?php echo '/'._theme_path_ . 'images/'; ?>puzzle.png" alt="" />
								</a>
							</li>
							<!-- TODO: DELETE -->
							<li>
								<a href="#">
									<span>Développement Fonctionnel</span>
								</a>
								<a href="#">
									<img src="<?php echo '/'._theme_path_ . 'images/'; ?>outils.png" alt="" />
								</a>
							</li>
							<li>
								<a href="#">
									<span>Animation</span>
								</a>
								<a href="#">
									<img src="<?php echo '/'._theme_path_ . 'images/'; ?>etoile.png" alt="" />
								</a>
							</li>
							<li>
								<a href="#">
									<span>Logiciels</span>
								</a>
								<a href="#">
									<img src="<?php echo '/'._theme_path_ . 'images/'; ?>ecusson.png" alt="" />
								</a>
							</li>
							<li>
								<a href="#">
									<span>Référencement</span>
								</a>
								<a href="#">
									<img src="<?php echo '/'._theme_path_ . 'images/'; ?>coupe.png" alt="" />
								</a>
							</li>
							<li>
								<a href="#">
									<span>Autres</span>
								</a>
								<a href="#">
									<img src="<?php echo '/'._theme_path_ . 'images/'; ?>dossier.png" alt="" />
								</a>
							</li>
							<!-- End TODO -->
						</ul>
						<div class="button big-button">
							<a href="#"><?php echo SEE_CATEGORIES; ?></a>
						</div>
					</div>
					
					<!-- Home page content -->
					<div id="middle-column">
						<div class="border-title">
							<h1 class="middle-title border-until"><?php echo LAST_ARTICLE; ?></h1>
						</div>
						
						<div class="one-article">
							<div class="left">
								<img src="<?php echo '/'._theme_path_ . 'images/'; ?>article-image.png" alt="" width="339px" height="216px" />
							</div>
							
							<div class="left article-content">
								<h2>Le HTML5, super ! Mais qu'est-ce que c'est et à quoi ça sert ?</h2>
								<p class="article-caption"><span class="date"><?php echo THE; ?> 16/12/2012 <?php echo BY; ?></span> <a href="#">Jonathan</a></p>
								<p class="content-introduction">
									Lorem ipsum dolor sit amet, consecterus us adipiscing elit.
									Lorem ipsum dolor sit amet, consecterus us adipiscing elit.
									Lorem ipsum dolor sit amet, consecterus us adipiscing elit.
									Lorem ipsum dolor sit amet, consecterus us adipiscing elit.
								</p>
								<p class="show-more">[...] <a href="#"><?php echo SEE_MORE; ?></a>
								</p>
								<p class="comment">
									<a href="#">
										<img src="<?php echo '/'._theme_path_ . 'images/'; ?>bulle.png" alt="<?php echo ALT_SEE_COMMENTS; ?>" />
										13 <?php echo COMMENTS; ?>
									</a>
								</p>
							</div>
							<div class="cl"></div>
							
							<div class="article-category left">
								<img src="<?php echo '/'._theme_path_ . 'images/'; ?>angle.png" alt="<?php echo ALT_HEADBAND; ?>" />
								Animation
							</div>
							<div class="article-tags left">
								<a href="#" class="article-tag">
									tag1
								</a>
								<a href="#" class="article-tag">
									tag2
								</a>
								<a href="#" class="article-tag">
									tag3
								</a>
								<a href="#" class="article-tag">
									tag4
								</a>
							</div>
							
							<div class="cl"></div>
						</div>
						
						<!-- TODO: DELETE -->
						<div class="one-article">
							<div class="left">
								<img src="<?php echo '/'._theme_path_ . 'images/'; ?>article-image.png" alt="" width="339px" height="216px" />
							</div>
							
							<div class="left article-content">
								<h2>Le HTML5, super ! Mais qu'est-ce que c'est et à quoi ça sert ?</h2>
								<p class="article-caption"><span class="date"><?php echo THE; ?> 16/12/2012 <?php echo BY; ?></span> <a href="#">Jonathan</a></p>
								<p class="content-introduction">
									Lorem ipsum dolor sit amet, consecterus us adipiscing elit.
									Lorem ipsum dolor sit amet, consecterus us adipiscing elit.
									Lorem ipsum dolor sit amet, consecterus us adipiscing elit.
									Lorem ipsum dolor sit amet, consecterus us adipiscing elit.
								</p>
								<p class="show-more">[...] <a href="#"><?php echo SEE_MORE; ?></a>
								</p>
								<p class="comment">
									<a href="#">
										<img src="<?php echo '/'._theme_path_ . 'images/'; ?>bulle.png" alt="<?php echo ALT_SEE_COMMENTS; ?>" />
										13 <?php echo COMMENTS; ?>
									</a>
								</p>
							</div>
							<div class="cl"></div>
							
							<div class="article-category left">
								<img src="<?php echo '/'._theme_path_ . 'images/'; ?>angle.png" alt="<?php echo ALT_HEADBAND; ?>" />
								Animation
							</div>
							<div class="article-tags left">
								<a href="#" class="article-tag">
									tag1
								</a>
								<a href="#" class="article-tag">
									tag2
								</a>
								<a href="#" class="article-tag">
									tag3
								</a>
								<a href="#" class="article-tag">
									tag4
								</a>
							</div>
							
							<div class="cl"></div>
						</div>
						<!-- End TODO -->
					</div>
					
					<!-- Sidebar -->
					<aside>
						<!-- News -->
						<div class="border-title">
							<h1 class="right-title"><?php echo NEWS_WORD; ?></h1>
						</div>
						
						<div id="news-box" class="aside-box">
							<div class="one-news">
								<div class="border-title">
									<h4 class="left-title">Titre Actualité n°1 - <span class="date"><?php echo THE; ?> 14/12/2012</span></h4>
								</div>
								
								<p>Ici les 140 premiers caractères de l'actualité n°1 servant à résumer l'actualité avant de pouvoir la consulter. L'internaute voit si elle l'intéresse ou non.
								<div class="news-footer">
									<p class="show-more">[...] <a href="#"><?php echo SEE_MORE; ?></a>
									</p>
									<p class="comment">
										<a href="#">13 <?php echo COMMENTS; ?></a>
									</p>
								</div>
							</div>
							
							<!-- TODO: DELETE -->
							<div class="one-news">
								<div class="border-title">
									<h4 class="left-title">Titre Actualité n°1 - <span class="date"><?php echo THE; ?> 14/12/2012</span></h4>
								</div>
								
								<p>Ici les 140 premiers caractères de l'actualité n°1 servant à résumer l'actualité avant de pouvoir la consulter. L'internaute voit si elle l'intéresse ou non.
								<div class="news-footer">
									<p class="show-more">[...] <a href="#"><?php echo SEE_MORE; ?></a>
									</p>
									<p class="comment">
										<a href="#">13 <?php echo COMMENTS; ?></a>
									</p>
								</div>
							</div>
							<!-- End TODO -->
							<div class="button big-button">
								<a href="#"><?php echo SEE_NEWS; ?></a>
							</div>
						</div>
						
						<!-- Social -->
						<div class="border-title">
							<h1 class="right-title"><?php echo FOLLOW_WEBTUTS; ?></h1>
						</div>
						
						<div id="social-box" class="aside-box">
							<a href="#">
								<img src="<?php echo '/'._theme_path_ . 'images/'; ?>facebook.png" alt="<?php echo ALT_FOLLOW_US_FACEBOOK; ?>" />
								Facebook
							</a>
							<a href="#">
								<img src="<?php echo '/'._theme_path_ . 'images/'; ?>twitter.png" alt="<?php echo ALT_FOLLOW_US_TWITTER; ?>" />
								Twitter
							</a>
							<a href="#">
								<img src="<?php echo '/'._theme_path_ . 'images/'; ?>rss.png" alt="<?php echo ALT_SUBSCRIBE_RSS; ?>" />
								<?php echo RSS; ?>
							</a>
							<a href="#">
								<img src="<?php echo '/'._theme_path_ . 'images/'; ?>newsletter.png" alt="<?php echo ALT_SUBSCRIBE_NEWSLETTER; ?>" />
								<?php echo NEWSLETTERS; ?>
							</a>
							<div class="cl"></div>
						</div>
						
						<!-- Twitter feedback -->
						<div class="border-title">
							<h1 class="right-title"><?php echo HAPPENS_ON_TWITTER; ?></h1>
						</div>
						
						<!-- TODO: put twitter feedback -->
						<div id="twitter-box" class="aside-box">

						</div>
					</aside>
					
					<div class="cl"></div>