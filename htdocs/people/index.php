<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/library/vendor/autoload.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/class.php');

	$KUME = new KUME();

?>
<?php

	global $bc;

	$bc = array(
		array(
			'title' => '採用トップ',
			'url' => '/'
		),
		array(
			'title' => '人を知る',
			'url' => '/people'
		)
	);

	$meta = KUME_Util::get_meta(array(
		'bc' => $bc
	));

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/header.mod.php');

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/gh.mod.php');

?>

	<div class="p-page-box" data-barba="wrapper">

		<main
			class="p-people"
			data-barba="container"
			data-barba-namespace="people"
		>
			<header class="c-page-header">
				<div class="l-wrapper">
					<div class="c-page-header__container">
						<div class="c-page-header__main">
							<h1>
								<span lang="en">People</span>
								<span lang="ja">人を知る</span>
							</h1>
							<?php

								echo KUME_Util::get_snippet(array(
									'type' => 'line',
									'data' => $bc
								));

							?>
						</div>
						<div class="c-page-header__sub">
							<nav class="c-page-nav">
								<ul>
									<li>
										<a href="#employees"><span class="c-button c-button--round">社員紹介</span></a>
										<a href="#talk"><span class="c-button c-button--round">クロストーク</span></a>
										<a href="#interview"><span class="c-button c-button--round">インタビュー動画</span></a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>

			<section id="employees" class="p-employees">
				<div class="l-wrapper">
					<div class="l-container">
						<header class="c-section-header is--vertical">
							<h2 class="c-section-header__title">
								<span lang="ja">社員紹介</span>
								<span lang="en">Employees Introduction</span>
							</h2>
							<div class="c-section-header__description">
								<p>久米設計では心地よい関係性を築きながら個性豊かな社員が活躍しています。<br>
								多様な働き方を選択している社員をご紹介いたします。</p>
							</div>
						</header>

						<div class="p-employees__body">
							<article>
								<a href="/people/employees/uomoto">
									<header>
										<h3>魚本 大地</h3>
										<p><span class="c-career-tag" data-category="new">新卒採用</span></p>
									</header>
									<picture>
										<div class="c-lazy-trigger">
											<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees_thumb_uomoto.jpg', true); ?>" alt="">
										</div>
									</picture>
									<p>2009年入社　意匠設計</p>
									<p>互いの意思を尊重し、最適な答えを探していくことのできる職場です。</p>
								</a>
							</article>

							<article>
								<a href="/people/employees/mizutani">
									<header>
										<h3>水谷 絢子</h3>
										<p><span class="c-career-tag" data-category="new">新卒採用</span></p>
									</header>
									<picture>
										<div class="c-lazy-trigger">
											<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees_thumb_mizutani.jpg', true); ?>" alt="">
										</div>
									</picture>
									<p>2014年入社　意匠設計</p>
									<p>同世代設計者から受ける機会が多いことは魅力のひとつです。</p>
								</a>
							</article>

							<article>
								<a href="/people/employees/miura">
									<header>
										<h3>三浦 淑美</h3>
										<p><span class="c-career-tag" data-category="new">新卒採用</span></p>
									</header>
									<picture>
										<div class="c-lazy-trigger">
											<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees_thumb_miura.jpg', true); ?>" alt="">
										</div>
									</picture>
									<p>2005年入社　意匠設計</p>
									<p>互いの意思を尊重しことのできる職場です。</p>
								</a>
							</article>

							<article>
								<a href="/people/employees/nohara">
									<header>
										<h3>野原 春花</h3>
										<p><span class="c-career-tag" data-category="career">キャリア採用</span></p>
									</header>
									<picture>
										<div class="c-lazy-trigger">
											<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees_thumb_nohara.jpg', true); ?>" alt="">
										</div>
									</picture>
									<p>2017年入社　意匠設計</p>
									<p>同世代設計者から刺激を受ける機会が多いことは魅力の刺激を刺激を刺激をひとつです。</p>
								</a>
							</article>

							<article>
								<a href="/people/employees/yokoyama">
									<header>
										<h3>横山 真</h3>
										<p><span class="c-career-tag" data-category="career">キャリア採用</span></p>
									</header>
									<picture>
										<div class="c-lazy-trigger">
											<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees_thumb_yokoyama.jpg', true); ?>" alt="">
										</div>
									</picture>
									<p>2019年入社　意匠設計</p>
									<p>互いの意思を尊重し、最適な答えを探していくことのできる職場です。</p>
								</a>
							</article>

							<article>
								<a href="/people/employees/kawai">
									<header>
										<h3>河合 正理</h3>
										<p><span class="c-career-tag" data-category="new">新卒採用</span></p>
									</header>
									<picture>
										<div class="c-lazy-trigger">
											<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees_thumb_miura.jpg', true); ?>" alt="">
										</div>
									</picture>
									<p>2003年入社　構造設計</p>
									<p>同世代設計者から刺激を受ける機会が多いことは魅力のひとつです。</p>
								</a>
							</article>
						</div>
					</div>
				</div>
			</section>

			<section id="talk" class="p-talk">
				<div class="l-wrapper">
					<div class="l-container">
						<header class="c-section-header">
							<h2 class="c-section-header__title">
								<span lang="ja">クロストーク</span>
								<span lang="en">Crosstalk</span>
							</h2>
						</header>

						<div class="p-talk__body">
							<article class="p-talk__article">
								<a href="/people/talk/milano/">
									<p class="p-talk__article_index">Crosstalk <b>02</b></p>
									<picture class="c-lazy-trigger">
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/talk_thumb_milano.jpg', true); ?>" alt="">
									</picture>
									<div class="p-talk__article__body">
										<div>
											<header>
												<h3>新宿TOKYU MILANO再開発プロジェクトチーム</h3>
											</header>
											<p>都市と建築のチャレンジ</p>
										</div>
									</div>
								</a>
							</article>

							<article class="p-talk__article">
								<a href="/people/talk/bim/">
									<p class="p-talk__article_index">Crosstalk <b>01</b></p>
									<picture class="c-lazy-trigger">
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/talk_thumb_bim.jpg.jpg', true); ?>" alt="">
									</picture>
									<div class="p-talk__article__body">
										<div>
											<header>
												<h3>BIM座談会</h3>
											</header>
											<p>BIMを取り入れた設計ワークフローの構築とは？</p>
										</div>
										<div>
											<p><span><span class="c-icon c-icon--play"></span></span>動画あり</p>
										</div>
									</div>
								</a>
							</article>
						</div>
					</div>
				</div>
			</section>

			<section id="interview" class="p-interview">
				<div class="l-wrapper">
					<div class="l-container">
						<header class="c-section-header is--vertical">
							<h2 class="c-section-header__title">
								<span lang="ja">インタビュー動画</span>
								<span lang="en">Interview Movie</span>
							</h2>
						</header>

						<div class="p-interview__body">
							<article class="p-people__interview__article">
								<a href="javascript:void(0);" rel="bookmark" data-video-id="psmwLZXixNA" data-video-start="78">
									<picture class="c-lazy-trigger">
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/interview_thumb3.jpg', true); ?>" alt="">
									</picture>
									<div>
										<div class="p-people__interview__article__button"><span class="c-icon c-icon--play"></span></div>
										<p lang="en">13:16</p>
									</div>
								</a>
								<header>
									<h4>先輩社員にリレーインタビュー</h4>
								</header>
								<p>話しかけやすい先輩にアポをとって、久米設計がどんなところか、聞いてみました。回答者が次の人を呼んでくるのがルールです。</p>
							</article>

							<article class="p-people__interview__article">
								<a href="javascript:void(0);" rel="bookmark" data-video-id="NPLFk1un62c" data-video-start="340">
									<picture class="c-lazy-trigger">
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/interview_thumb2.jpg', true); ?>" alt="">
									</picture>
									<div>
										<div class="p-people__interview__article__button"><span class="c-icon c-icon--play"></span></div>
										<p lang="en">7:41</p>
									</div>
								</a>
								<header>
									<h4>監理とはどんな仕事ですか？</h4>
								</header>
								<p>久米設計で働く若手社員のインタビュー動画。建築の最終防衛線として第一線で働く社員のリアルな声を公開しています。</p>
							</article>

							<article class="p-people__interview__article">
								<a href="javascript:void(0);" rel="bookmark" data-video-id="xV3KkfYQomI" data-video-start="472">
									<picture class="c-lazy-trigger">
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/interview_thumb1.jpg', true); ?>" alt="">
									</picture>
									<div>
										<div class="p-people__interview__article__button"><span class="c-icon c-icon--play"></span></div>
										<p lang="en">10:32</p>
									</div>
								</a>
								<header>
									<h4>電気設備について聞いてみた</h4>
								</header>
								<p>技術的な電気設備の設計を、デザイン性高く建築に融合させる、若手電気設備設計者の健闘を公開しています。</p>
							</article>
						</div>
					</div>
				</div>
			</section>
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
