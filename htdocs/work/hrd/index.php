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
			'title' => '働く環境',
			'url' => '/work/'
		),
		array(
			'title' => '人材育成プログラム',
			'url' => '/work/hrd/'
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

	$_GET['gm_active'] = 'work';
	$_GET['gm_sub_active'] = 'work_hrd';


	/** =================================================================
	 * ページナビゲーション
	 * --------------------------------------------------------------- */

	ob_start();

	?>
	<nav class="c-page-nav">
		<ul>
			<li><a class="c-button c-button--round is--gray" href="/work/"><span>ワークプレイス</span></a></li>
			<li><a class="c-button c-button--round is--gray" href="/work/welfare/"><span>福利厚生</span></a></li>
			<li><a class="c-button c-button--round is--gray is--active" href="/work/hrd/"><span>人材育成プログラム</span></a></li>
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

		<main class="p-work is--hrd" data-init-event="initWorkHrd">
			<header class="c-page-header">
				<div class="l-wrapper">
					<div class="l-container--narrow">
						<div class="c-page-header__main">
							<h2 class="is--title">
								<span lang="en">Work @ KUME SEKKEI</span>
								<span lang="ja">働く環境</span>
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

			<article class="p-work__hrd">
				<header class="p-work__hrd__header">
					<div class="l-wrapper">
						<div class="l-container--narrow">

							<div class="c-article-header">
								<h1 class="c-article-header__title">
									<span lang="en">Human Resource Development</span>
									<span lang="ja">人材育成<br class="is--sp">プログラム</span>
								</h1>
								<div class="c-article-header__description">
									<p>当社では、社員の成長を促進する「人材開発」を軸に、当社オリジナルの育成プログラムを立案し、人間力と設計力を両輪とした全社横断的な研修を実施しています。さらには、組織力を高めるための各社員の職種や職位に応じた研修や、専門性を高める研修、語学力を向上させる研修など、きめ細かく幅広い分野のプログラムをつくっています。</p>
									<p>久米設計を支えているのは「人」です。一人ひとりが、社会に貢献し「アトリエ型組織設計事務所」を支えるプロフェッショナルとして日々成長していけるよう、人材育成プログラムは毎年刷新しています。</p>
								</div>
							</div>

						</div>
					</div>
				</header>

				<section id="training" class="p-work__hrd__sec">
					<div class="l-wrapper">
						<div class="l-container is--2col">
							<div class="c-sticky--pc">
								<div class="c-sticky__container">
									<header>
										<h2>新入社員研修</h2>
									</header>

									<div class="p-work__hrd__sec__body">
										<p>入社3ヶ月は社会人としての基本的なビジネススキルや建築設計の基本を学び、入社4か月目から2年目終了までは各自専門領域でOJTでプロジェクトを通した実務を学びます。</p>
										<p>その間は、上司、業務指導員（トレーナー）、育成担当（コーチ）、人事で皆さんをサポートし、3年目に各部署へ正式配属となります。</p>
									</div>
								</div>
							</div>
							<div>
								<figure>
									<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/hrd/training_fig1.png'); ?>>
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/hrd/training_fig1.png', true); ?>" alt="">
									</picture>
								</figure>
							</div>
						</div>
					</div>
				</section>

				<section id="skillup" class="p-work__hrd__sec">
					<div class="l-wrapper">
						<div class="l-container is--2col">
							<div class="c-sticky--pc">
								<div class="c-sticky__container">
									<header>
										<h2>スキルアップ研修</h2>
									</header>

									<div class="p-work__hrd__sec__body">
										<p>プログラム研修の他に、他企業や外部講師を招いたセミナーなど自由参加型の研修を年間80件以上開催しています。</p>
									</div>

									<div id="skillupStats">
										<div>
											<p>年間<strong lang="en">80</strong>回</p>
										</div>
										<ul>
											<li>外装技術研修</li>
											<li>法規研修</li>
											<li>SDGs研修</li>
											<li>デジタルデザイン研修　など</li>
										</ul>
									</div>
								</div>
							</div>
							<div>
								<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/hrd/skillup_pic1.jpg'); ?>>
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/hrd/skillup_pic1.jpg', true); ?>" alt="">
								</picture>

								<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/hrd/skillup_pic2.jpg'); ?>>
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/hrd/skillup_pic2.jpg', true); ?>" alt="">
								</picture>

								<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/hrd/skillup_pic3.jpg'); ?>>
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/hrd/skillup_pic3.jpg', true); ?>" alt="">
								</picture>
							</div>
						</div>
					</div>
				</section>
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

			<div class="c-page-side"><div><p><span lang="en">Work @ KUME SEKKEI</span><span lang="ja">働く環境</span></p></div></div>
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
