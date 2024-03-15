<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/library/vendor/autoload.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/class.php');

	$KUME = new KUME();

?>
<?php

	/** =================================================================
	 * パンくず定数
	 * --------------------------------------------------------------- */

	global $bc;

	$bc = array(
		array(
			'title' => '採用トップ',
			'url' => '/'
		),
		array(
			'title' => '会社を知る',
			'url' => '/about/'
		),
		array(
			'title' => '社会課題への取り組み',
			'url' => '/about/csr/'
		)
	);


	/** =================================================================
	 * meta生成
	 * --------------------------------------------------------------- */

	$meta = KUME_Util::get_meta(array(
		'bc' => $bc
	));


	/** =================================================================
	 * グローベルメニューのアクティブ
	 * --------------------------------------------------------------- */

	$_GET['gm_active'] = 'about';
	$_GET['gm_sub_active'] = 'about_csr';


	/** =================================================================
	 * ページナビゲーション
	 * --------------------------------------------------------------- */

	ob_start();

	?>
	<nav class="c-page-nav">
		<ul>
			<li><a class="c-button c-button--round is--gray" href="/about/"><span>メッセージ</span></a></li>
			<li><a class="c-button c-button--round is--gray is--active" href="/about/csr/"><span>社会課題への取組み</span></a></li>
			<li><a class="c-button c-button--round is--gray" href="/about/stats/"><span>数字で見る久米設計</span></a></li>
		</ul>
	</nav>
	<?php

	$page_nav = ob_get_contents();
	ob_end_clean();

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/header.mod.php');

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/gh.mod.php');

?>

	<div class="p-page-box">

		<main class="p-about is--csr" data-init-event="initAboutCsr">
			<header class="c-page-header">
				<div class="l-wrapper">
					<div class="l-container--narrow">
						<div class="c-page-header__main">
							<h2 class="is--title">
								<span lang="en">About KUME SEKKEI</span>
								<span lang="ja">会社を知る</span>
							</h2>
						</div>
						<div class="c-page-header__sub">
							<?php

								echo KUME_Util::get_snippet(array(
									'type' => 'line',
									'data' => $bc
								));

							?>
							<?php

								echo $page_nav;

							?>
						</div>
					</div>
				</div>
			</header>

			<?php

				$tags = KUME_Util::get_json('https://www.kumesekkei.co.jp/designstory/for_recruit_tags.json');
				$tags = $tags['tags'];

				$csrs = KUME_Util::get_json('https://www.kumesekkei.co.jp/designstory/for_recruit_social.json');
				$csrs = $csrs['articles'];

			?>
			<article class="p-about__csr">
				<header class="p-about__csr__header">
					<div class="l-wrapper">
						<div class="l-container--narrow">

							<div class="c-article-header">
								<h1 class="c-article-header__title">
									<span lang="en">Corporate Social Responsibility</span>
									<span lang="ja">社会課題への<br class="is--sp">取り組み</span>
								</h1>
								<div class="c-article-header__description">
									<p>久米設計では、持続的な地域社会と建築を通して社会課題解決の実現に向けた取り組みを推進しています。ここでは久米設計が取り組んできた事例をテーマごとにご覧いただけます。</p>
								</div>
							</div>

						</div>
					</div>
				</header>

				<nav class="p-about__csr__nav">
					<div class="l-wrapper">
						<div class="l-container">
							<ul>
								<?php

									if (count($tags) > 0) {
										foreach ($tags as $tag) {
											?>
											<li><a href="#<?php echo $tag['id']; ?>"><span class="c-animate-underline">#<?php echo htmlspecialchars($tag['name']); ?></span></a></li>
											<?php
										}
									}

								?>
							</ul>
						</div>
					</div>
				</nav>

				<?php

					if (count($tags) > 0 && count($csrs) > 0) {
						foreach ($tags as $tag) {
							?>
							<section id="<?php echo $tag['id']; ?>" class="p-about__csr__sec">
								<div class="l-wrapper">
									<div class="l-container">
										<header>
											<h3>#<?php echo htmlspecialchars($tag['name']); ?></h3>
										</header>
										<div class="p-about__csr__items">
											<?php

												$articles = $csrs[$tag['id']];
												$articles = array_slice($articles, 0, 3);

												if (count($articles) > 0) {
													?>
													<ul>
														<?php

															foreach ($articles as $article) {
																?>
																<li>
																	<a class="p-about__csr__link" href="<?php echo $article['url']; ?>" target="_blank">
																		<div class="p-about__csr__link__thumb">
																			<picture class="c-lazy-trigger">
																				<img class="c-lazy is--cover" data-src="<?php echo $article['image']; ?>" alt="">
																			</picture>
																		</div>
																		<p><span class="c-icon c-icon--external"></span><span class="is--text"><?php echo $article['title']; ?></span></p>
																	</a>
																</li>
																<?php
															}

														?>
													</ul>
													<?php
												}

												unset($articles);

											?>
										</div>
									</div>
								</div>
							</section>
							<?php
						}
					}

				?>

				<?php /*
				<aside class="c-banner">
					<div class="l-wrapper">
						<div class="c-banner__container">
							<a href="#" target="_blank" rel="noopener">
								<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/csr/banner_pic1.jpg'); ?>>
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/banner_pic1.jpg', true); ?>" alt="">
								</picture>
								<div>
									<p class="c-banner__tag"><div class="c-button c-button--round is--white is--fit"><b lang="en">Corporate Social Responsibility</b></div></p>
									<h4><span class="c-icon c-icon--external"></span>社会課題への取組み</h4>
									<p class="c-banner__description">すべての記事をご覧いただけます</p>
								</div>
							</a>
						</div>
					</div>
				</aside>
				*/ ?>
			</article>

			<footer class="c-page-footer">
				<div class="l-wrapper">
					<div class="c-page-footer__container">
						<div class="c-page-footer__sub">
							<?php

								echo KUME_Util::get_snippet(array(
									'type' => 'line',
									'data' => $bc
								));

							?>
							<?php

								echo $page_nav;

							?>
						</div>
					</div>
				</div>
			</footer>

			<div class="c-page-side"><div><p><span lang="en">Corporate Social Responsibility</span><span lang="ja">社会課題への取り組み</span></p></div></div>
		</main>

		<?php

			include($_SERVER['DOCUMENT_ROOT'] . '/modules/ui.mod.php');

		?>

	</div>

<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/gf.mod.php');

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/footer.mod.php');

?>
