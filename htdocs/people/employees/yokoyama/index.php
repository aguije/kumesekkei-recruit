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
			'title' => '横山 真',
			'url' => '/people/employees/yokoyama/'
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
									<span><span class="is--line">これまでの住宅設計の経験を生かし、</span><span class="is--line">新たな挑戦をしながら得意分野を広げる。</span>
								</p>
							</div>
							<div class="p-people__employee__article__header__body">
								<picture class="c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/yokoyama_mv.jpg', true); ?>" alt="">
								</picture>
								<div>
									<h1>
										<span lang="ja">横山 真</span>
										<span lang="en">YOKOYAMA Makoto</span>
										<span class="c-career-tag" data-category="career">キャリア採用</span>
									</h1>
									<div class="p-people__employee__article__header__profile">
										<p>2019年入社<br>
										意匠設計</p>
										<p class="p-people__employee__article__header__description">大学院卒業後、2社のアトリエ設計事務所にて住宅プロジェクトをメインに幅広い設計のキャリアを積み、久米設計に入社。現在は大規模複合施設やホテル設計にも携わる。</p>
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
									<h2>幅広いプロジェクトに<br class="is--pc">挑戦したくて転職を決めた</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>大学院卒業後は、2社のアトリエ設計事務所を経て、久米設計に入社しました。1社目は個人住宅をメインとしたアトリエ設計事務所。その後に勤めたのは、年月を重ねた集合住宅を、そこに住み続けてきた人の思いを汲み取りながら新たな魅力を備えたものに建て替えるような計画を得意とするアトリエ設計事務所でした。この2社でも、やりがいは感じていましたが、経験を積み重ねる中で、より幅広いプロジェクトにも携わってみたいと思うようになったのが転職の理由です。久米設計は、社内で構造設計や設備設計を含めたチームができこまめにコミュニケーションが取れるので、仕事のしやすさを日々感じています。</p>
								</div>
							</section>

							<!-- Chapter 2 -->
							<section class="p-people__employee__article__chapter">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>住宅設計での経験を広げ、ホテル設計が新たな得意分野を築く</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>久米設計では、これまでの経験を生かして住宅機能を持つ複合施設を担当することが多いのですが、数年前にホテルを併設した複合施設案件に声をかけていただいたことがきっかけで、ホテルも担当するようになりました。住宅もホテルも、利用する人がどのように空間でのひとときを過ごすのか想像を巡らせて、時間を経るごとに、魅力が増していくようなものを目指したいと思いながら設計をしています。引き続き得意分野は生かしつつ、新たなタイプのプロジェクトにも挑戦していきたいです。</p>
								</div>
							</section>
						</div>
					</div>

					<div class="p-people__employee__article__insert l-wrapper">
						<div class="l-container--narrow">
							<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/yokoyama_pic1.jpg'); ?>>
								<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/yokoyama_pic1.jpg', true); ?>" alt="">
							</picture>
						</div>
					</div>

					<!-- Chapter 3 -->
					<section class="p-people__employee__article__chapter">
						<div class="l-wrapper">
							<div class="l-container--narrow">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>チームで同じ方向を目指すべく、<br class="is--pc">前向きに柔らかに旗を振る</span></h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>複合施設やホテル設計は、社内外を含めて関わる人が多いのが特徴的。設計を進める上で、それぞれが考えている内容を把握し、調整し、統合する必要があるため、住宅単位のプロジェクトとは異なる大変さがあります。心がけているのは、何事も柔軟性を持って対応できる余白を持って対応すること。技術的に難しい課題が出てきた際にも、プロジェクト全体にとって最善の方法が見出せるように時間の許す限り検討するようにしています。頭を悩ませることもありますが、そんな調整ごとも得意になってきた気がします。</p>
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

								<div class="p-people__employee__article__schedule" data-cookie-name="kume_people_employees_yokoyama_tab">
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
														<th><span lang="en">9:30</span></th>
														<td>出社</td>
													</tr>
													<tr>
														<th><span lang="en">9:40</span></th>
														<td>メールチェック、現場質疑回答作成</td>
													</tr>
													<tr>
														<th><span lang="en">12:20</span></th>
														<td>休憩</td>
													</tr>
													<tr>
														<th><span lang="en">13:30</span></th>
														<td>遠隔地現場とのweb会議</td>
													</tr>
													<tr>
														<th><span lang="en">16:00</span></th>
														<td>プロジェクトチームでの設計打ち合わせ</td>
													</tr>
													<tr>
														<th><span lang="en">18:00</span></th>
														<td>休憩</td>
													</tr>
													<tr>
														<th><span lang="en">18:30</span></th>
														<td>施工図チェック</td>
													</tr>
												</table>
											</div>

											<div id="tab2" class="swiper-slide">
												<header><h3>オフの1日</h3></header>
												<div class="swiper-slide__container">
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/yokoyama_tab2_pic1.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/yokoyama_tab2_pic1.jpg', true); ?>" alt="">
													</picture>
													<div class="swiper-slide__body">
														<p>リフレッシュと体力作りを兼ねて、近所の川沿いをゆっくりランニング。体を動かすと頭もスッキリします。</p>
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
										<img src="<?php echo KUME_Util::image_path('people/employees/yokoyama_message.svg', true); ?>" alt="挑戦あってこそ得られる喜びがある">
									</p>

									<div class="p-people__employee__article__chapter__body">
										<p>設計は90%が地味な作業ですし、時には困難も伴います。でも、図面やパースが現実の形になって建ち上がり、様々な人に利用され社会的にも注目していただけると、何にも変え難い大きな達成感と喜びに包まれます。そういうチャンスを、ぜひここで積極的に掴んでください。</p>
									</div>
								</div>

								<div>
									<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/yokoyama_pic2.jpg'); ?>>
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/yokoyama_pic2.jpg', true); ?>" alt="">
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
									<a class="p-article__footer__link" href="/people/employees/kawai/">
										<div class="p-article__footer__link__thumb">
											<picture class="c-circle-picture c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/kawai_thumb.jpg', true); ?>" alt="">
											</picture>
											<span class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_l"></span></span>
										</div>
										<div class="p-article__footer__link__title">
											<h4>河合 正理　<br class="is--sp"><span class="c-career-tag" data-category="new">新卒採用</span></h4>
											<p class="is--sub">2003年入社　<br class="is--sp">構造設計</p>
											<p>安全性はもちろん見た目にも美しい、デザインと一体となった構造を目指して。</p>
										</div>
									</a>
								</li>
								<li class="is--next">
									<a class="p-article__footer__link" href="/people/employees/nohara/">
										<div class="p-article__footer__link__thumb">
											<picture class="c-circle-picture c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/nohara_thumb.jpg', true); ?>" alt="">
											</picture>
											<span class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_l"></span></span>
										</div>
										<div class="p-article__footer__link__title">
											<h4>野原 春花　<br class="is--sp"><span class="c-career-tag" data-category="career">キャリア採用</span></h4>
											<p class="is--sub">2017年入社　<br class="is--sp">意匠設計</p>
											<p>こよなく愛する九州という地で、さまざまな人の〝居場所〟をつくりたい。</p>
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
