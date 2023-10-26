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
			'title' => '野原 春花',
			'url' => '/people/employees/nohara/'
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
									<span><span class="is--line">こよなく愛する九州という地で、</span><span class="is--line">さまざまな人の〝居場所〟をつくりたい。</span></span>
								</p>
							</div>
							<div class="p-people__employee__article__header__body">
								<picture class="c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/nohara_mv.jpg', true); ?>" alt="">
								</picture>
								<div>
									<h1>
										<span lang="ja">野原 春花</span>
										<span lang="en">NOHARA Haruka</span>
										<span class="c-career-tag" data-category="career">キャリア採用</span>
									</h1>
									<div class="p-people__employee__article__header__profile">
										<p>2017年入社<br>
										意匠設計</p>
										<p class="p-people__employee__article__header__description">大学院卒業後、組織設計事務所にてキャリアを積んだ後、九州で公共建築に携わりたいという希望から、久米設計九州支社に入社。九州エリアの幅広い案件に携わる。</p>
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
									<h2>九州の地で公共建築に携わりたいという想いで</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>育った九州の地域性がとても好きで、福岡で働きたいという想いがありました。もともと公共建築に携わりたいと思って組織設計事務所を希望していましたが、前社では東京本社でないとその機会がなかなかありませんでした。九州で教育文化施設に携わりたいという想いを強めていた頃、久米設計の九州支社にご縁があり、入社を希望しました。久米設計では、九州支社の所属であっても公共施設の設計に携わる機会をいただけています。やりたかったことを諦めずチャレンジしてよかったと思っています。</p>
								</div>
							</section>

							<!-- Chapter 2 -->
							<section class="p-people__employee__article__chapter">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>プロジェクトに一貫して向き合える環境と同僚からのよい刺激を成長の糧に</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>久米設計に入社して携わった複合施設と公共の教育施設は、どちらもプロポーザルや設計初期段階から監理まで一貫して担当しています。前職ではプロポーザルの専門部署がありましたが、プロジェクト担当者がプロポーザルから携わり、一貫してプロジェクトに取り組む久米設計の方針は、よりやりがいを感じることができます。クライアントの立場に立ちながらプラスαで建築の価値を付加しようとする提案スタイルは、他社を経験しているから気づく久米設計らしさのひとつ。常に作品性の高い建築を生み出そうとする上司やエンジニアを含めた同僚からの刺激を栄養に、奮闘する日々です。</p>
								</div>
							</section>
						</div>
					</div>

					<div class="p-people__employee__article__insert l-wrapper">
						<div class="l-container--narrow">
							<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/nohara_pic1.jpg'); ?>>
								<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/nohara_pic1.jpg', true); ?>" alt="">
							</picture>
						</div>
					</div>

					<!-- Chapter 3 -->
					<section class="p-people__employee__article__chapter">
						<div class="l-wrapper">
							<div class="l-container--narrow">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>想像の翼を広げ、<br class="is--pc">多様な居心地の良さを散りばめる</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>私が大切にしているのは、〝居場所〟づくり。目的がなくても訪れたくなるような居心地の良さを感じられる空間は、家以外のパブリックな建築空間にも必要だと思っています。しかし、どのような場所を居心地良く感じるかは、人によって異なるため、広い場所、囲まれた場所、静かな場所、眺めがいい場所など、多様な性質の空間を建築の至るところに散りばめようと意識しています。居心地のよい居場所ができると、そこに活動が生まれ、人が集まり、賑わいになり......そのような連鎖反応が生まれることは、建築計画のおもしろさのひとつだと思っています。</p>
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

								<div class="p-people__employee__article__schedule" data-cookie-name="kume_people_employees_nohara_tab">
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
													<span lang="en">Friday Study Session</span>
													<span lang="ja">金曜会</span>
												</a>
											</li>
											<li>
												<a href="javascript:void(0);" data-index="2">
													<span lang="en">Candid <br class="is--sp">photog&shy;raphy</span>
													<span lang="ja">オフの1日</span>
												</a>
											</li>
										</ul>
									</nav>

									<div class="swiper">
										<div class="swiper-wrapper">
											<div id="tab1" class="swiper-slide">
												<table>
													<tr>
														<th><span lang="en">9:30</span></th>
														<td>出社、メールチェック、ToDo確認</td>
													</tr>
													<tr>
														<th><span lang="en">11:00</span></th>
														<td>チーム内打合せ＠社内</td>
													</tr>
													<tr>
														<th><span lang="en">12:00</span></th>
														<td>昼食 @社内（ミーティングスペースでみんなで食べる）</td>
													</tr>
													<tr>
														<th><span lang="en">13:00</span></th>
														<td>施主打合せ @社外</td>
													</tr>
													<tr>
														<th><span lang="en">15:00</span></th>
														<td>設計業務、作業など</td>
													</tr>
													<tr>
														<th><span lang="en">19:00</span></th>
														<td>金曜会 @社内 （お酒を飲みながら建築の情報交換を行う）</td>
													</tr>
												</table>
											</div>

											<div id="tab2" class="swiper-slide">
												<div class="swiper-slide__container">
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/nohara_tab2_pic1.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/nohara_tab2_pic1.jpg', true); ?>" alt="">
													</picture>
													<div class="swiper-slide__body">
														<p>金曜会は、九州支社独自で行っている有志の勉強会（情報共有・発信の場）です。</p>
													</div>
												</div>
											</div>

											<div id="tab3" class="swiper-slide">
												<div class="swiper-slide__container">
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/nohara_tab3_pic1.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/nohara_tab3_pic1.jpg', true); ?>" alt="">
													</picture>
													<div class="swiper-slide__body">
														<p>長期休暇を利用して、年に一度は遠方へ建築旅行に行きます。案件のスケジュールを見ながら計画を立て、日々のモチベーションにしています。</p>
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
										<img src="<?php echo KUME_Util::image_path('people/employees/nohara_message.svg', true); ?>" alt="新卒もキャリアも関係ないフラットな職場">
									</p>

									<div class="p-people__employee__article__chapter__body">
										<p>久米設計に入社して安心したのは、新卒と中途採用の社員で、働きやすさや案件のチャンスに差がないということでした。上司・部下も関係なく意見を出しやすいやわらかな雰囲気の社風は、中途入社でも働きやすい環境だと感じています。</p>
									</div>
								</div>

								<div>
									<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/nohara_pic2.jpg'); ?>>
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/nohara_pic2.jpg', true); ?>" alt="">
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
