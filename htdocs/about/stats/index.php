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
			'title' => '数字で見る久米設計',
			'url' => '/about/stats/'
		),
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
	$_GET['gm_sub_active'] = 'about_stats';


	/** =================================================================
	 * ページナビゲーション
	 * --------------------------------------------------------------- */

	ob_start();

	?>
	<nav class="c-page-nav">
		<ul>
			<li><a class="c-button c-button--round is--darkgray" href="/about/"><span>メッセージ</span></a></li>
			<li><a class="c-button c-button--round is--darkgray" href="/about/csr/"><span>社会課題への取組み</span></a></li>
			<li><a class="c-button c-button--round is--gray is--active" href="/about/stats/"><span>数字で見る久米設計</span></a></li>
		</ul>
	</nav>
	<?php

	$page_nav = ob_get_contents();
	ob_end_clean();

	ob_start();

	?>
	<nav class="c-page-nav">
		<ul>
			<li><a class="c-button c-button--round is--gray" href="/about/"><span>メッセージ</span></a></li>
			<li><a class="c-button c-button--round is--gray" href="/about/csr/"><span>社会課題への取組み</span></a></li>
			<li><a class="c-button c-button--round is--gray is--active" href="/about/stats/"><span>数字で見る久米設計</span></a></li>
		</ul>
	</nav>
	<?php

	$page_nav_bottom = ob_get_contents();
	ob_end_clean();

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/header.mod.php');

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/gh.mod.php');

?>

	<div class="p-page-box">

		<main class="p-about__stats" data-init-event="initAboutStats">
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

			<article class="p-about__stats__article">
				<header class="p-about__stats__article__header">
					<div class="l-wrapper">
						<div class="l-container">

							<div class="c-article-header">
								<h1 class="c-article-header__title">
									<span lang="en">Statistics &amp; Facts</span>
									<span lang="ja">数字で見る久米設計</span>
								</h1>
							</div>

						</div>
					</div>
				</header>

				<?php

					include($_SERVER['DOCUMENT_ROOT'] . '/modules/figs.mod.php');

				?>

				<div class="p-about__stats__article__description">
					<div class="l-wrapper">
						<div class="l-container--narrow">
							<p>久米設計では全ての社員に長く安心して働いてほしいと考えています。ライフステージに合わせた働き方を選択し、それぞれの個性や才能を発揮して欲しい。ここではそんな久米設計を、さまざまな数字から紐解いていきます。</p>
						</div>
					</div>
				</div>

				<div class="p-about__stats__article__wrapper">
					<div id="general" class="p-about__stats__article__sections">
						<nav>
							<div class="l-wrapper">
								<div class="l-container--narrow">
									<ul>
										<li><a class="is--active" href="#general" lang="en"><span class="c-animate-underline">General Information</span></a></li>
										<li><a href="#lifestage" lang="en"><span class="c-animate-underline">Life Stage</span></a></li>
										<li><a href="#workstyle" lang="en"><span class="c-animate-underline">Workstyle</span></a></li>
									</ul>
								</div>
							</div>
						</nav>

						<section id="sales" class="p-about__stats__article__sec">
							<div class="l-wrapper">
								<div class="l-container is--2col">
									<div>
										<header>
											<h2><span>売上高と建物用途構成比</span><small>（2023年度実績）</small></h2>
										</header>
										<figure>
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/sales_fig.svg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/sales_fig.svg', true); ?>" alt="">
											</picture>
											<figcaption>
												<p>売上高</p>
												<p><b lang="en">119.4</b><span>億円</span></p>
											</figcaption>
										</figure>
									</div>
									<div>
										<p>多様な施設をバランスよく設計しているのが久米設計の特色です。</p>
										<table>
											<caption>（ プロジェクト件数 ）</caption>
											<tbody>
												<tr><th><span lang="en">A</span>事務所</th><td></td><td><b lang="en">26.5</b> %</td></tr>
												<tr><th><span lang="en">B</span>医療</th><td></td><td><b lang="en">12.0</b> %</td></tr>
												<tr><th><span lang="en">C</span>教育</th><td></td><td><b lang="en">11.5</b> %</td></tr>
												<tr><th><span lang="en">D</span>宿泊</th><td></td><td><b lang="en">9.9</b> %</td></tr>
												<tr><th><span lang="en">E</span>庁舎</th><td></td><td><b lang="en">9.9</b> %</td></tr>
												<tr><th><span lang="en">F</span>商業</th><td></td><td><b lang="en">8.3</b> %</td></tr>
												<tr><th><span lang="en">G</span>文化</th><td></td><td><b lang="en">6.9</b> %</td></tr>
												<tr><th><span lang="en">H</span>住宅</th><td></td><td><b lang="en">6.5</b> %</td></tr>
												<tr><th><span lang="en">I</span>物流</th><td></td><td><b lang="en">3.0</b> %</td></tr>
												<tr><th><span lang="en">J</span>生産</th><td></td><td><b lang="en">2.1</b> %</td></tr>
												<tr><th><span lang="en">K</span>体育</th><td></td><td><b lang="en">1.8</b> %</td></tr>
												<tr><th><span lang="en">L</span>福祉</th><td></td><td><b lang="en">1.6</b> %</td></tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</section>

						<section id="awards" class="p-about__stats__article__sec">
							<div class="l-wrapper">
								<div class="l-container--narrow">
									<header class="is--flex">
										<h2><span>受賞数</span><small>（ 2018年から2022年の5年間 ）</small></h2>
										<p class="is--larger"><b lang="en">203</b><span>件の建築関連の賞を獲得しています。</span></p>
									</header>

									<figure>
										<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/awards_fig.svg'); ?>>
											<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/awards_fig.svg', true); ?>" alt="">
										</picture>
									</figure>
								</div>
							</div>
						</section>

						<div class="l-wrapper">
							<div class="l-container is--2col">
								<div>
									<section id="employees" class="p-about__stats__article__sec">
										<header>
											<h2><span>社員数と有資格者数</span><small>（ 2023/06/08現在 ）</small></h2>
										</header>

										<div class="is--fig">
											<div>
												<div>
													<h3>社員数</h3>
													<p><b lang="en">650</b><span>employees</span></p>
												</div>
											</div>
											<div>
												<div>
													<p><b lang="en">438</b><span>people</span></p>
													<h3>プロフェッショナル<br>有資格者数</h3>
												</div>
											</div>
										</div>
									</section>
								</div>
								<div>
									<section id="female-male" class="p-about__stats__article__sec">
										<header>
											<h2><span>女男比</span><small>（ 新卒 〜 3年目 ）</small></h2>
										</header>

										<div class="is--fig">
											<div>
												<p lang="en"><sup>females</sup> <b>37.0</b>%</p>
											</div>
											<div>
												<p lang="en"><sup>males</sup> <b>63.0</b>%</p>
											</div>
										</div>
									</section>

									<section id="turnover" class="p-about__stats__article__sec">
										<header>
											<h2><span>離職率</span><small>（ 新卒 〜 5年目 ）</small></h2>
										</header>

										<div class="is--fig">
											<p>4.4%</p>
											<div></div>
											<div></div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>

					<div id="lifestage" class="p-about__stats__article__sections">
						<nav>
							<div class="l-wrapper">
								<div class="l-container--narrow">
									<ul>
										<li><a href="#general" lang="en"><span class="c-animate-underline">General Information</span></a></li>
										<li><a class="is--active" href="#lifestage" lang="en"><span class="c-animate-underline">Life Stage</span></a></li>
										<li><a href="#workstyle" lang="en"><span class="c-animate-underline">Workstyle</span></a></li>
									</ul>
								</div>
							</div>
						</nav>

						<div class="l-wrapper">
							<div class="l-container is--2col">
								<div>
									<section id="female_childcare" class="p-about__stats__article__sec">
										<div>
											<header>
												<h2><span>女性の育休取得率</span></h2>
											</header>

											<figure class="p-about__stats__circle">
												<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/female_childcare_fig.png'); ?>>
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/mini/female_childcare_fig.png', true); ?>" alt="">
												</picture>
												<figcaption><b lang="en">100</b>%</figcaption>
											</figure>

											<div class="p-about__stats__article__sec__illust">
												<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/illustA.png'); ?>>
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/illustA.png', true); ?>" alt="">
												</picture>
											</div>
										</div>
									</section>
								</div>
								<div>
									<section id="male_childcare" class="p-about__stats__article__sec">
										<div>
											<header class="is--line">
												<h2><span>男性の育休取得率</span><small>（ パパになった人で取得した割合 ）</small></h2>
											</header>

											<figure class="p-about__stats__circle">
												<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/male_childcare_fig.png'); ?>>
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/mini/male_childcare_fig.png', true); ?>" alt="">
												</picture>
												<figcaption><b lang="en">43.8</b>%</figcaption>
											</figure>

											<div class="p-about__stats__article__sec__illust">
												<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/illustB.png'); ?>>
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/illustB.png', true); ?>" alt="">
												</picture>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>

						<div class="l-wrapper">
							<div class="l-container is--2col">
								<div>
									<section id="female_reinstatement" class="p-about__stats__article__sec">
										<div>
											<header>
												<h2><span>女性の育休復職率</span></h2>
											</header>

											<figure class="p-about__stats__circle">
												<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/female_reinstatement_fig.png'); ?>>
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/mini/female_reinstatement_fig.png', true); ?>" alt="">
												</picture>
												<figcaption><b lang="en">100</b>%</figcaption>
											</figure>

											<div class="p-about__stats__article__sec__illust">
												<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/illustC.png'); ?>>
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/illustC.png', true); ?>" alt="">
												</picture>
											</div>
										</div>
									</section>
								</div>
								<div>
									<section id="mama" class="p-about__stats__article__sec">
										<div>
											<header class="is--line">
												<h2><span>働くママ比率</span><small>（ 女性社員全体のうちの<br>子育てしながら働く社員の割合 ）</small></h2>
											</header>

											<figure class="p-about__stats__circle">
												<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/mama_fig.png'); ?>>
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/mini/mama_fig.png', true); ?>" alt="">
												</picture>
												<figcaption><b lang="en">27.7</b>%</figcaption>
											</figure>

											<div class="p-about__stats__article__sec__illust">
												<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/illustD.png'); ?>>
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/illustD.png', true); ?>" alt="">
												</picture>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>

					<div id="workstyle" class="p-about__stats__article__sections">
						<nav>
							<div class="l-wrapper">
								<div class="l-container--narrow">
									<ul>
										<li><a href="#general" lang="en"><span class="c-animate-underline">General Information</span></a></li>
										<li><a href="#lifestage" lang="en"><span class="c-animate-underline">Life Stage</span></a></li>
										<li><a class="is--active" href="#workstyle" lang="en"><span class="c-animate-underline">Workstyle</span></a></li>
									</ul>
								</div>
							</div>
						</nav>

						<div class="l-wrapper">
							<div class="l-container is--2col">
								<div>
									<section id="overtime" class="p-about__stats__article__sec">
										<header class="is--flex is--line">
											<h2><span>平均残業時間</span><small>（ 新卒1年目実績 ）</small></h2>
											<p><b lang="en">29.6</b> <span lang="en">hours per month</span></p>
										</header>

										<figure>
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/overtime_fig.svg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/overtime_fig.svg', true); ?>" alt="">
											</picture>
										</figure>
									</section>
								</div>
								<div>
									<section id="leave" class="p-about__stats__article__sec">
										<header class="is--flex">
											<h2><span>有給休暇平均取得日数</span></h2>
											<p><b lang="en">10.34</b> <span lang="en">days</span></p>
										</header>

										<figure>
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/leave_fig.svg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/leave_fig.svg', true); ?>" alt="">
											</picture>
										</figure>
									</section>
								</div>
							</div>
						</div>

						<section id="knowledge">
							<div class="l-wrapper">
								<div class="l-container">
									<header>
										<h2><span>ナレッジ共有数データ</span></h2>
									</header>
								</div>
								<div class="l-container is--2col">
									<div>
										<section id="sns" class="p-about__stats__article__sec">
											<div>
												<header class="is--smaller is--line is--flex">
													<h3><span>社内SNS<br>年間投稿数</span><small>（2022年9月～2023年8月）</small></h3>
													<p><b lang="en">2,127</b> <span lang="en">posts</span></p>
												</header>

												<div class="p-about__stats__article__sec__caption">
													<p>月平均投稿数<br>
													<b lang="en">177</b> <span lang="en">posts</span></p>
												</div>

												<div class="p-about__stats__article__sec__illust">
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/illustE.png'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/illustE.png', true); ?>" alt="">
													</picture>
												</div>
											</div>
										</section>
									</div>
									<div>
										<section id="db" class="p-about__stats__article__sec">
											<div>
												<header class="is--smaller is--line is--flex">
													<h3><span>プロジェクトデータベース<br>年間アクセス数</span><small>（2022年9月～2023年8月）</small></h3>
													<p><b lang="en">38,116</b> <span lang="en">accesses</span></p>
												</header>

												<div class="p-about__stats__article__sec__caption">
													<p>月平均アクセス数<br>
													<b lang="en">3,176</b> <span lang="en">accesses</span></p>
												</div>

												<div class="p-about__stats__article__sec__illust">
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/illustF.png'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/illustF.png', true); ?>" alt="">
													</picture>
												</div>
											</div>
										</section>
									</div>
								</div>
							</div>
						</section>

						<div class="l-wrapper">
							<div class="l-container is--2col">
								<div>
									<section id="club" class="p-about__stats__article__sec">
										<header class="is--line is--flex">
											<h2><span>クラブ活動</span><small>（ 活動補助あり ）</small></h2>
											<p><b lang="en">18</b> <span lang="en">club activities</span></p>
										</header>

										<figure>
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/club_fig.png'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/club_fig.png', true); ?>" alt="">
											</picture>
										</figure>
									</section>
								</div>
								<div>
									<section id="club_participants" class="p-about__stats__article__sec">
										<div>
											<header class="is--line is--flex">
												<h2><span>クラブ活動参加者</span><small>（ 延べ人数 ）</small></h2>
												<p><b lang="en">308</b> <span lang="en">people</span></p>
											</header>

											<div class="p-about__stats__article__sec__illust">
												<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/stats/illustG.png'); ?>>
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/stats/illustG.png', true); ?>" alt="">
												</picture>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
					</div>
				</div>
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

								echo $page_nav_bottom;

							?>
						</div>
					</div>
				</div>
			</footer>
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
