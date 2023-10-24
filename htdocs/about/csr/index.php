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
								<li><a href="#kodomo"><span class="c-animate-underline">#こども未来</span></a></li>
								<li><a href="#carbon"><span class="c-animate-underline">#カーボンニュートラル</span></a></li>
								<li><a href="#diversity"><span class="c-animate-underline">#ダイバーシティ＆インクルージョン</span></a></li>
								<li><a href="#community"><span class="c-animate-underline">#地域づくり</span></a></li>
								<li><a href="#study"><span class="c-animate-underline">#これからの学び</span></a></li>
								<li><a href="#workstyle"><span class="c-animate-underline">#ワークスタイル</span></a></li>
								<li><a href="#safety"><span class="c-animate-underline">#安全・安心</span></a></li>
								<li><a href="#stock"><span class="c-animate-underline">#ストック活用</span></a></li>
							</ul>
						</div>
					</div>
				</nav>

				<section id="kodomo" class="p-about__csr__sec">
					<div class="l-wrapper">
						<div class="l-container">
							<header>
								<h3>#こども未来</h3>
							</header>
							<div class="p-about__csr__items">
								<ul>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/ai_workshop.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/kodomo_pic1.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">子どもAIデザイン・ワークショップ</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/news/2022_73.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/kodomo_pic2.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">地域子どもイベントを開催しました。</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/work_experience.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/kodomo_pic3.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">職場体験を通して学んだこと「思い」を「形」に</span></p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<section id="carbon" class="p-about__csr__sec">
					<div class="l-wrapper">
						<div class="l-container">
							<header>
								<h3>#カーボンニュートラル</h3>
							</header>
							<div class="p-about__csr__items">
								<ul>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/kama_city_hall_me.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/carbon_pic1.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">自然と共生し自然を活かす環境建築</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/eco_friendly02.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/carbon_pic2.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">ZEBの実現と災害から人々を守るLCBの融合</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/eco_friendly01.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/carbon_pic3.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">空間性と省エネルギーを両立する設計の考え方</span></p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<section id="diversity" class="p-about__csr__sec">
					<div class="l-wrapper">
						<div class="l-container">
							<header>
								<h3>#ダイバーシティ＆インクルージョン</h3>
							</header>
							<div class="p-about__csr__items">
								<ul>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/company/athlete/2023/06/2023-02-athlete.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/diversity_pic1.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">鹿児島県立開陽高等学校にて講演を行いました</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/barrier_free.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/diversity_pic2.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">バリアフリーデザインの実践</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/company/athlete/2022/07/2022-01-athlete.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/diversity_pic3.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">パラアスリートの川嶋悠太選手・坂元智香選手が入社しました！​</span></p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<section id="community" class="p-about__csr__sec">
					<div class="l-wrapper">
						<div class="l-container">
							<header>
								<h3>#地域づくり</h3>
							</header>
							<div class="p-about__csr__items">
								<ul>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/corporate_and_community.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/community_pic1.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">実践<br>― 企業とまちの新しい関係について ―</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/yebisu_garden_place.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/community_pic2.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">都市の豊かさ<br>（恵比寿ガーデンプレイス）</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/akasaka_sacas.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/community_pic3.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">土地と街の記憶を継承し再構築する<br>（赤坂サカス）</span></p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<section id="study" class="p-about__csr__sec">
					<div class="l-wrapper">
						<div class="l-container">
							<header>
								<h3>#これからの学び</h3>
							</header>
							<div class="p-about__csr__items">
								<ul>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/nijinooka_gakuen.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/study_pic1.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">原風景をたどり、<br>建築としてかたちにする</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/omiya_ward_office.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/study_pic2.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">街をつなぎ、人をつなぐ<br class="is--pc">「みんなのリビング」</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/nagoya_gakuin_university.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/study_pic3.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">学びの風景をデザインする</span></p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<section id="workstyle" class="p-about__csr__sec">
					<div class="l-wrapper">
						<div class="l-container">
							<header>
								<h3>#ワークスタイル</h3>
							</header>
							<div class="p-about__csr__items">
								<ul>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/k-lounge.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/workstyle_pic1.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">働く場のこれからを考える</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/k-atrium.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/workstyle_pic2.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">アトリウムで広がる<br>ワークスタイルの可能性</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/news/2023_09.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/workstyle_pic3.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">あなたの理想のオフィスは？<br class="is--pc">社内アイデアソンを行いました</span></p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<section id="safety" class="p-about__csr__sec">
					<div class="l-wrapper">
						<div class="l-container">
							<header>
								<h3>#安全・安心</h3>
							</header>
							<div class="p-about__csr__items">
								<ul>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/intro_quake-resist.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/safety_pic1.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">久米式耐震木構造から継続する安全安心への思い</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/rapid_rescue.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/safety_pic2.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">建築設計の発想から生まれたプロダクトデザイン</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/chutoen_general_medical_center.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/safety_pic3.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">東海地震に対応したLCBホスピタル</span></p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

				<section id="stock" class="p-about__csr__sec">
					<div class="l-wrapper">
						<div class="l-container">
							<header>
								<h3>#ストック活用</h3>
							</header>
							<div class="p-about__csr__items">
								<ul>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/chiba_univ_sumida.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/stock_pic1.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">ストックを活かし地域をつなげる</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/zushi_honda_house.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/stock_pic2.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">旧本多邸改修計画<br>地域にひらかれた文化財をめざして</span></p>
										</a>
									</li>
									<li>
										<a class="p-about__csr__link" href="https://www.kumesekkei.co.jp/designstory/sancha_apartment.html" target="_blank">
											<div class="p-about__csr__link__thumb">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/csr/stock_pic3.jpg', true); ?>" alt="">
												</picture>
											</div>
											<p><span class="c-icon c-icon--external"></span><span class="is--text">三軒茶屋アパートメント計画<br>地に足をつけて、はみ出していく</span></p>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</section>

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
