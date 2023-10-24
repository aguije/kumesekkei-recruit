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
			'title' => '河合 正理',
			'url' => '/people/employees/kawai/'
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
									<span><span class="is--line">安全性はもちろん見た目にも美しい、</span><span class="is--line">デザインと一体となった構造を目指して。</span>
								</p>
							</div>
							<div class="p-people__employee__article__header__body">
								<picture class="c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/kawai_mv.jpg', true); ?>" alt="">
								</picture>
								<div>
									<h1>
										<span lang="ja">河合 正理</span>
										<span lang="en">KAWAI Masari</span>
										<span class="c-career-tag" data-category="career">キャリア採用</span>
									</h1>
									<div class="p-people__employee__article__header__profile">
										<p>2003年入社<br>
										構造設計</p>
										<p class="p-people__employee__article__header__description">入社以降、体育館からオフィスまで、幅広いジャンルの建築で構造設計に携わる。安全性と見た目の美しさを兼ね備えた構造を目指す。第33回JSCA賞にて作品賞を受賞。</p>
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
									<h2>大空間構造への意欲は<br class="is--pc">伝え続けて経験にする</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>大学院では、体育館など非常に大きな空間に関する研究をしていたので、卒業後もそのような案件に携わることができる設計事務所を希望していました。当時は就職氷河期で構造設計での募集は少なかったのですが、久米設計の会社案内に掲載されている事例に、様々な建築物に携わることができそうな期待感が膨らみ、ここで働きたいという気持ちが強くなりました。当時は大空間のプロジェクトは少なかったのですが、やりたい意思を伝え続けることで声をかけてもらえるようになり、今では経験者として相談していただくことが多くなりました。</p>
								</div>
							</section>

							<!-- Chapter 2 -->
							<section class="p-people__employee__article__chapter">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>安全性を守りつつ、そこに宿る<br class="is--pc">建築美にもこだわりたい</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>構造設計としては、もちろん安全性が第一。しかし、居心地のよさや使い勝手の良さ、また建築としての美しさを成立させることも大切だと、私は考えます。意匠設計チームから上がる様々なリクエストの中には、耐震性を考えるとそのまま反映することは難しい場合もあり、意見を戦わせることもしばしばですが、私は極力「できない」とは言わないようにしています。簡単に諦めずにとことん話し合い、意図を汲んで本質を読み取ると、別の方法を提案できることがあります。その調整が大変なところですが、大きなやりがいでもあります。</p>
								</div>
							</section>
						</div>
					</div>

					<div class="p-people__employee__article__insert l-wrapper">
						<div class="l-container--narrow">
							<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/kawai_pic1.jpg'); ?>>
								<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/kawai_pic1.jpg', true); ?>" alt="">
							</picture>
						</div>
					</div>

					<!-- Chapter 3 -->
					<section class="p-people__employee__article__chapter">
						<div class="l-wrapper">
							<div class="l-container--narrow">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>最新技術も木造も学びチャレンジし続ける</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>耐震技術や建築材料は日々進化し続けています。学会に参加するなどして最新の情報を収集したり、フィットするプロジェクトがあれば積極的に最新技術を取り入れたり、常にアンテナを張って新しいことにチャレンジしていくことも大切です。新しいものへの関心と同様に、カーボンニュートラルの観点からも注目されている木造建築への取り組みも、これからさらに学びを深め経験を積み重ねていきたいところです。社内でも定期的に「都市木造ワーキング」という勉強会に参加しています。現状に満足せずに知見を広げて、新しい挑戦を続けて行けたらと思います。</p>
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

								<div class="p-people__employee__article__schedule" data-cookie-name="kume_people_employees_kawai_tab">
									<nav>
										<ul>
											<li class="is--active">
												<a href="javascript:void(0);" data-index="0">
													<span lang="en">Daily Sched<span class="is--pc">ule</span><span class="is--sp">.</span></span>
													<span lang="ja">とある1日</span>
												</a>
											</li>
											<li>
												<a href="javascript:void(0);" data-index="1">
													<span lang="en">Candid photog&shy;raphy</span>
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
														<th><span lang="en">9:00</span></th>
														<td>出社</td>
													</tr>
													<tr>
														<th><span lang="en">9:30</span></th>
														<td>前日の勤務報告、メールチェック、返信</td>
													</tr>
													<tr>
														<th><span lang="en">10:00</span></th>
														<td>打合せ準備</td>
													</tr>
													<tr>
														<th><span lang="en">12:00</span></th>
														<td>意匠・構造・設備とのセッション</td>
													</tr>
													<tr>
														<th><span lang="en">13:00</span></th>
														<td>昼休み</td>
													</tr>
													<tr>
														<th><span lang="en">14:00</span></th>
														<td>構造チームディスカッション</td>
													</tr>
													<tr>
														<th><span lang="en">16:00</span></th>
														<td>技術検討</td>
													</tr>
													<tr>
														<th><span lang="en">17:30</span></th>
														<td>現場とWEB打合せ</td>
													</tr>
													<tr>
														<th><span lang="en">20:00</span></th>
														<td>構造解析によるスタディ</td>
													</tr>
												</table>
											</div>

											<div id="tab2" class="swiper-slide">
												<header><h3>オフの1日</h3></header>
												<div class="swiper-slide__container">
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/kawai_tab2_pic1.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/kawai_tab2_pic1.jpg', true); ?>" alt="">
													</picture>
													<div class="swiper-slide__body">
														<p>子どもを連れて構造を担当したレストランへ。建築に興味を持ってくれたらいいなと願いながら。</p>
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
										<img src="<?php echo KUME_Util::image_path('people/employees/kawai_message.svg', true); ?>" alt="勉強以外の経験も、生きた学びになる">
									</p>

									<div class="p-people__employee__article__chapter__body">
										<p>大学時代に飲食店のアルバイトでいろいろな人とコミュニケーションをとっていたことが、今の仕事にも非常に生かされています。勉強だけでなく、いろいろな人と出会い、いろいろな経験をすることは、とても大切だとあらためて感じています。</p>
									</div>
								</div>

								<div>
									<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/kawai_pic2.jpg'); ?>>
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/kawai_pic2.jpg', true); ?>" alt="">
									</picture>
								</div>
							</div>
						</div>
					</section>
				</div>

				<footer class="p-article__footer">
					<div class="l-wrapper">
						<div class="l-container">
							<ul class="p-article__footer__links is--reverse--pc">
								<li class="is--center">
									<a class="c-button c-button--round is--white" href="/people/#employees"><span>BACK TO INDEX</span></a>
								</li>
								<li class="is--prev">
									<a class="p-article__footer__link" href="/people/employees/yokoyama/">
										<div class="p-article__footer__link__thumb">
											<picture class="c-circle-picture c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/yokoyama_thumb.jpg', true); ?>" alt="">
											</picture>
											<span class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_l"></span></span>
										</div>
										<div class="p-article__footer__link__title">
											<h4>横山 真　<br class="is--sp"><span class="c-career-tag" data-category="career">キャリア採用</span></h4>
											<p class="is--sub">2019年入社　<br class="is--sp">意匠設計</p>
											<p>これまでの住宅設計の経験を生かし、新たな挑戦をしながら得意分野を広げる。</p>
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
