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
			'title' => '人を知る',
			'url' => '/people/'
		),
		array(
			'title' => '社員紹介',
			'url' => '/people/#employees'
		),
		array(
			'title' => '水谷 絢子',
			'url' => '/people/employees/mizutani/'
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

	$_GET['gm_active'] = 'people';
	$_GET['gm_sub_active'] = 'people_employees';


	/** =================================================================
	 * ページナビゲーション
	 * --------------------------------------------------------------- */

	ob_start();

	?>
	<nav class="c-page-nav">
		<ul>
			<li><a class="c-button c-button--round is--gray is--active" href="/people/#employees"><span>社員紹介</span></a></li>
			<li><a class="c-button c-button--round is--gray" href="/people/#crosstalk"><span>クロストーク</span></a></li>
			<li><a class="c-button c-button--round is--gray" href="/people/#interview"><span>インタビュー動画</span></a></li>
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

		<main class="p-people__employee is--single" data-init-event="initPeopleEmployee">
			<header class="c-page-header">
				<div class="l-wrapper">
					<div class="l-container--narrow">
						<div class="c-page-header__main">
							<h2 class="is--title">
								<span lang="en">People</span>
								<span lang="ja">人を知る</span>
							</h2>
						</div>
						<div class="c-page-header__sub">
							<?php

								echo KUME_Util::get_snippet(array(
									'type' => 'line',
									'data' => $bc
								));

							?>
						</div>
					</div>
				</div>
			</header>

			<article class="p-people__employee__article">
				<header class="p-people__employee__article__header">
					<div class="l-wrapper">
						<div class="l-container">
							<div class="p-people__employee__article__header__title">
								<p class="p-people__employee__article__header__index" lang="en">Message</p>
								<p class="p-people__employee__article__header__message">
									<span><span class="is--line">たくさんの人との協働を楽しみながら</span><span class="is--line">社会の役に立つような設計を行いたい。</span>
								</p>
							</div>
							<div class="p-people__employee__article__header__body">
								<picture class="c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/mizutani_mv.jpg', true); ?>" alt="">
								</picture>
								<div>
									<h1>
										<span lang="ja">水谷 絢子</span>
										<span lang="en">MIZUTANI Ayako</span>
										<span class="c-career-tag" data-category="new">新卒採用</span>
									</h1>
									<div class="p-people__employee__article__header__profile">
										<p>2014年入社<br>
										意匠設計</p>
										<p class="p-people__employee__article__header__description">入社以降、博物館など公共施設の設計に携わる。2022年5月より1年間の産休育休を経て復帰。現在、短時間勤務で働きながら、一児の母として奮闘中。</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</header>

				<div class="p-people__employee__article__chapters">

					<div class="l-wrapper">
						<div class="l-container is--2col">
							<!-- Chapter 1 -->
							<section class="p-people__employee__article__chapter">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>学生時代に見たものや経験が<span class="u-inline-block">今も感性を刺激する</span></h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>大学OBの先輩が久米設計で働いていたことをきっかけに興味を持ち、会社を見学しました。その時に、社員みなさんの雰囲気の良さが印象的で、ここで一緒に仕事をしたいと思ったのが志望動機の一つです。</p>
									<p>振り返ると、大学院時代にフランスでの都市型ワークショップに参加したのはよい経験になりましたし、長期休暇を利用した海外旅行で見ることができた様々な建築物には、今でも刺激をもらい参考にすることがあります。特に印象に残っているのは、増築を繰り返しているルイジアナ美術館。また訪れたい場所です。</p>
								</div>
							</section>

							<!-- Chapter 2 -->
							<section class="p-people__employee__article__chapter">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>公共施設の設計を通じて<span class="u-inline-block">人や社会に貢献していきたい</span></h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>現在は、博物館や美術館など、様々な公共施設の意匠設計を担当しています。公共施設の設計に携わる中で、以前よりも社会貢献を強く意識するようになりました。</p>
									<p>このように人々に開かれた施設の設計は、単に建物を作るというだけでなく、そこを利用する人の暮らしに影響を与え、社会にも影響を与えていけるものだと考えています。建物を起点に起こる様々なプラスの可能性を考えながら、柔軟にアイデアを膨らませてご提案ができたらいいなと思っています。</p>
								</div>
							</section>
						</div>
					</div>

					<div class="p-people__employee__article__insert l-wrapper">
						<div class="l-container--narrow">
							<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/mizutani_pic1.jpg'); ?>>
								<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/mizutani_pic1.jpg', true); ?>" alt="">
							</picture>
						</div>
					</div>

					<!-- Chapter 3 -->
					<section class="p-people__employee__article__chapter">
						<div class="l-wrapper">
							<div class="l-container--narrow">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>出産や子育てのリアルな経験を<span class="u-inline-block">今後の発想に生かして</span></h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>2022年5月から1年間の産休育休を取りました。不安はありましたが、現在はやっとペースを掴むことができ、以前と変わらずに案件に携わっています。ただ、時短勤務で以前より作業時間が限られるので、できるだけ前倒しで取り組むように心がけチームメンバーとの協働を楽しみながら、仕事を進めています。</p>
									<p>子どもが生まれたことで実体験から見えてくるものもあるので、日々感じていることを生かして、子育て世代の人が利用する建築物の設計をやってみたいです。ちなみに、産休を取った先輩たちに育児アドバイスをもらえるのも嬉しいです。</p>
								</div>
							</div>
						</div>
					</section>

					<!-- Chapter 4 -->
					<section class="p-people__employee__article__chapter">
						<div class="l-wrapper">
							<div class="l-container--narrow">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>とある１日のスケジュールとオフの１日</h2>
								</header>

								<div class="p-people__employee__article__schedule" data-cookie-name="kume_people_employees_mizutani_tab">
									<nav>
										<ul>
											<li class="is--active">
												<a href="javascript:void(0);" data-index="0">
													<span lang="en">Daily <br class="is--sp">Schedule</span>
													<span lang="ja">とある1日</span>
												</a>
											</li>
											<li>
												<a href="javascript:void(0);" data-index="1">
													<span lang="en">Candid <br class="is--sp">photog&shy;raphy</span>
													<span lang="ja">オフの1日</span>
												</a>
											</li>
										</ul>
									</nav>

									<div class="swiper">
										<div class="swiper-wrapper">
											<div id="tab1" class="swiper-slide">
												<header><h3>とある1日</h3></header>
												<table>
													<tr>
														<th><span lang="en">8:30</span></th>
														<td>保育園送り</td>
													</tr>
													<tr>
														<th><span lang="en">9:00</span></th>
														<td>出社途中にある東京フォーラムで思考リセット</td>
													</tr>
													<tr>
														<th><span lang="en">9:30</span></th>
														<td>出社<br>
														メールチェック、電話、<br>
														協力事務所に送るチェック図まとめ</td>
													</tr>
													<tr>
														<th><span lang="en">12:00</span></th>
														<td>昼休み</td>
													</tr>
													<tr>
														<th><span lang="en">13:00</span></th>
														<td>メーカーさん打合せ、社内エンジニア打合せ<br>
														図面更新作業</td>
													</tr>
													<tr>
														<th><span lang="en">17:00</span></th>
														<td>退社</td>
													</tr>
													<tr>
														<th><span lang="en">18:00</span></th>
														<td>帰宅して夕飯作り</td>
													</tr>
												</table>
											</div>

											<div id="tab2" class="swiper-slide">
												<header><h3>オフの1日</h3></header>
												<div class="swiper-slide__container">
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/mizutani_tab2_pic1.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/mizutani_tab2_pic1.jpg', true); ?>" alt="">
													</picture>
													<div class="swiper-slide__body">
														<p>子どもと一緒におでかけ。利用者目線で感じることは、遊びに行く場でも、アイデアの種になります。</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>

					<!-- Chapter 5 -->
					<section class="p-people__employee__article__chapter">
						<div class="l-wrapper">
							<div class="l-container is--2col">
								<div>
									<header class="p-people__employee__article__chapter__header">
										<p lang="en">CHAPTER <b></b></p>
										<h2 class="is--small">学生へのメッセージ</h2>
									</header>

									<p class="p-people__employee__article__chapter__message">
										<img src="<?php echo KUME_Util::image_path('people/employees/mizutani_message.svg', true); ?>" alt="自分なりに、真剣に考えてみよう">
									</p>

									<div class="p-people__employee__article__chapter__body">
										<p>日頃から、自分だったらどうするか、真剣に考えてみるようにしています。手を動かして、行動から良い方法を見つけようとすることもあります。</p>
										<p>そのためにも海外旅行やイベントに参加してたくさん刺激を受けることは大切だと思います。</p>
										<p>周りのアドバイスも大切ですが、まずは自分の目で見て、向き合って、自分なりに考えてみてください。</p>
									</div>
								</div>

								<div>
									<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/mizutani_pic2.jpg'); ?>>
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/mizutani_pic2.jpg', true); ?>" alt="">
									</picture>
								</div>
							</div>
						</div>
					</section>
				</div>

				<footer class="p-article__footer">
					<div class="l-wrapper">
						<div class="l-container">
							<ul class="p-article__footer__links">
								<li class="is--center">
									<a class="c-button c-button--round is--white" href="/people/#employees"><span>BACK TO INDEX</span></a>
								</li>
								<li class="is--prev">
									<a class="p-article__footer__link" href="/people/employees/miura/">
										<div class="p-article__footer__link__thumb">
											<picture class="c-circle-picture c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/miura_thumb.jpg', true); ?>" alt="">
											</picture>
											<span class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_l"></span></span>
										</div>
										<div class="p-article__footer__link__title">
											<h4>三浦 淑美　<br class="is--sp"><span class="c-career-tag" data-category="new">新卒採用</span></h4>
											<p class="is--sub">2005年入社　<br class="is--sp">意匠設計</p>
											<p>子育てをする中でより強くなった、子どもが主役となる学校をつくりたいという想い。</p>
										</div>
									</a>
								</li>
								<li class="is--next">
									<a class="p-article__footer__link" href="/people/employees/uomoto/">
										<div class="p-article__footer__link__thumb">
											<picture class="c-circle-picture c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/uomoto_thumb.jpg', true); ?>" alt="">
											</picture>
											<span class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_l"></span></span>
										</div>
										<div class="p-article__footer__link__title">
											<h4>魚本 大地　<br class="is--sp"><span class="c-career-tag" data-category="new">新卒採用</span></h4>
											<p class="is--sub">2009年入社　<br class="is--sp">意匠設計</p>
											<p>力を発揮できる環境と働き方を大切に、道なき道を切り開くことすらも楽しむ。</p>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</footer>
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

			<div class="c-page-side"><div><p><span lang="en">Employees Introduction</span><span lang="ja">社員紹介</span></p></div></div>
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
