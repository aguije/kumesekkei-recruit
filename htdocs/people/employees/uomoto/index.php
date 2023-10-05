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
			'title' => '魚本 大地',
			'url' => '/people/employees/uomoto/'
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
									<span>力を発揮できる環境と働き方を大切に、</span>
									<span>道なき道を切り開くことすらも楽しむ。</span>
								</p>
							</div>
							<div class="p-people__employee__article__header__body">
								<picture class="c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/uomoto_mv.jpg', true); ?>" alt="">
								</picture>
								<div>
									<h1>
										<span lang="ja">魚本 大地</span>
										<span lang="en">UOMOTO Daichi</span>
										<span class="c-career-tag" data-category="new">新卒採用</span>
									</h1>
									<div class="p-people__employee__article__header__profile">
										<p>2009年入社<br>
										意匠設計</p>
										<p class="p-people__employee__article__header__description">入社以降、国内外の支社や海外の現場への常駐など、様々な場所での仕事を経験。家族の転勤を機に山形県鶴岡市と東京での2拠点生活をはじめる。4児の父。</p>
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
									<h2>気づきを得る経験と<br>働くための環境を考えて</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>久米設計の本社は、陽の光が差し込むアトリウムがあったり、すぐ近くに川が流れていたりします。都会にいながら自然を感じることができるこの環境が気に入ったのと、公共施設を数多く手がけているところに興味を持って志望しました。</p>
									<p>学生時代は、文化の異なる国に1、2ヶ月の短期留学をするというのを繰り返していました。それは、考えもつかないようなことに積極的に触れるため。今は当時のように海外に滞在することは難しいので、知らない場所を訪れたり、あえて誰かと一緒に過ごしたりすることで、気づきを得ています。</p>
								</div>
							</section>

							<!-- Chapter 2 -->
							<section class="p-people__employee__article__chapter">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>多くの人と関わり<br>
									信頼し合いながら作り上げる喜び</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>建築物は、最初は発注者と設計者、施工者など少人数が中心となって進んでいきますが、プロジェクトが進むにつれて関わる人が増えていって、最終的には何万人という人が関わってひとつのものが完成します。</p>
									<p>その出来上がりを、これまで一緒にやってきた人たちとグルーヴ感を持って喜ぶことができるのが、最も楽しい瞬間です。多くの人が関わる分、心をひとつにするのは簡単なことではありませんが、一緒に取り組む人たちをいかに信頼できるか、そして自分を信頼してもらうことができるかが鍵だと思っています。</p>
								</div>
							</section>
						</div>
					</div>

					<div class="l-wrapper">
						<div class="l-container--narrow">
							<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/uomoto_pic1.jpg'); ?>>
								<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/uomoto_pic1.jpg', true); ?>" alt="">
							</picture>
						</div>
					</div>

					<!-- Chapter 3 -->
					<section class="p-people__employee__article__chapter">
						<div class="l-wrapper">
							<div class="l-container--narrow">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>心地よい毎日の暮らしと<br>
									地方で得た新たな視点を強みに</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>妻の転職をきっかけに、2018年より山形県鶴岡市に移住しました。現在は、プロジェクトの状況によって東京に滞在するタイミングを決め、山形の自宅でも作業を進めるような2拠点の働き方をしています。</p>
									<p>海も山も近くにあり、食べ物も美味しい山形での暮らしは、生活の質をあげてくれただけでなく、仕事にもよい影響を及ぼしています。地方都市が抱える問題意識にもリアルに共感できるようになったことで、クライアントにも意見を求められることもしばしば。生活と仕事が地続きにあるような今の働き方は、私には向いているようです。</p>
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

								<div class="p-people__employee__article__schedule" data-cookie-name="kume_people_employees_uomoto_tab">
									<nav>
										<ul>
											<li class="is--active">
												<a href="javascript:void(0);" data-index="0">
													<span lang="en">Daily Sched. @Capital</span>
													<span lang="ja">東京のとある1日</span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-index="1">
													<span lang="en">Daily Sched. @Local</span>
													<span lang="ja">庄内でのとある1日</span>
												</a>
											</li>
											<li>
												<a href="javascript:void(0);" data-index="2">
													<span lang="en">Weekly Schedule</span>
													<span lang="ja">とある1週間</span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-index="3">
													<span lang="en">Candid photography</span>
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
														<th><span lang="en">8:00</span></th>
														<td>出社</td>
													</tr>
													<tr>
														<th><span lang="en">9:00</span></th>
														<td>メールなど事務作業</td>
													</tr>
													<tr>
														<th><span lang="en">10:00</span></th>
														<td>社内チームMTG、材料サンプル確認</td>
													</tr>
													<tr>
														<th><span lang="en">12:00</span></th>
														<td>食堂で昼食</td>
													</tr>
													<tr>
														<th><span lang="en">13:00</span></th>
														<td>発注者とwebMTG</td>
													</tr>
													<tr>
														<th><span lang="en">15:00</span></th>
														<td>社内チームMTG</td>
													</tr>
													<tr>
														<th><span lang="en">17:00</span></th>
														<td>社内WG活動のMTG</td>
													</tr>
													<tr>
														<th><span lang="en">18:00</span></th>
														<td>メールや図面チェックなど個人作業</td>
													</tr>
												</table>
											</div>

											<div id="tab2" class="swiper-slide">
												<table>
													<tr>
														<th><span lang="en">8:00</span></th>
														<td>こどもと妻を送り仕事開始</td>
													</tr>
													<tr>
														<th><span lang="en">8:30</span></th>
														<td>メールなど事務作業</td>
													</tr>
													<tr>
														<th><span lang="en">9:00</span></th>
														<td>検討スケッチ、図面チェック</td>
													</tr>
													<tr>
														<th><span lang="en">12:00</span></th>
														<td>昼食（と夕食の仕込み）</td>
													</tr>
													<tr>
														<th><span lang="en">13:00</span></th>
														<td>発注者とwebMTG</td>
													</tr>
													<tr>
														<th><span lang="en">15:00</span></th>
														<td>社内チームwebMTG</td>
													</tr>
													<tr>
														<th><span lang="en">17:00</span></th>
														<td>夕食準備（またはこどもたちお迎え）</td>
													</tr>
													<tr>
														<th><span lang="en">18:00</span></th>
														<td>夕食・入浴・寝かしつけ</td>
													</tr>
													<tr>
														<th><span lang="en">21:00</span></th>
														<td>メールや図面チェックなど個人作業</td>
													</tr>
												</table>
											</div>

											<div id="tab3" class="swiper-slide">
												<table>
													<tr>
														<th>月</th>
														<td>早朝に東北の家から出発。<br>
														試作品確認のために北関東の工場へ<br>
														移動の合間にメールと図面チェック</td>
													</tr>
													<tr>
														<th>火</th>
														<td>竣工検査のために北海道へ<br>
														移動の合間にwebMTG、メールと図面チェック</td>
													</tr>
													<tr>
														<th>水</th>
														<td>発注者・施工者と打ち合わせ<br>
														現場見学者の対応など</td>
													</tr>
													<tr>
														<th>木</th>
														<td>本社でAMは社内打合せを数件、<br>
														PMは発注者とwebMTG、合間に個人作業</td>
													</tr>
													<tr>
														<th>金</th>
														<td>現場で北関東へ<br>
														発注者・施工者と打ち合わせなど、<br>
														夜に東北の家へ戻る</td>
													</tr>
												</table>
											</div>

											<div id="tab4" class="swiper-slide">
												<div class="swiper-slide__container">
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/uomoto_tab4_pic1.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/uomoto_tab4_pic1.jpg', true); ?>" alt="">
													</picture>
													<div class="swiper-slide__body">
														<p>毎年、稲穂が金色に輝く時期に、庄内平野で家族写真を撮ります。心地よい毎日がよい発想を生みます。</p>
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
										<img src="<?php echo KUME_Util::image_path('people/employees/uomoto_message.svg', true); ?>" alt="作り込まずに、素直にありのままで">
									</p>

									<div class="p-people__employee__article__chapter__body">
										<p>久米設計では、就職活動でも仕事をする時も、自分を作り込まずにありのままであることや素直に自分を表現することが、とても大切だと思います。</p>
										<p>それによって、相応しい働き方や仕事の方向性が導かれるということはありますから。</p>
									</div>
								</div>

								<div>
									<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/uomoto_pic2.jpg'); ?>>
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/uomoto_pic2.jpg', true); ?>" alt="">
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
								</li>
								<li class="is--next">
									<a class="p-article__footer__link" href="/people/employees/mizutani/">
										<div class="p-article__footer__link__thumb">
											<picture class="c-circle-picture c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/footer_thumb_mizutani.jpg', true); ?>" alt="">
											</picture>
											<span class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_l"></span></span>
										</div>
										<div class="p-article__footer__link__title">
											<h4>水谷 絢子　<span class="c-career-tag" data-category="new">新卒採用</span></h4>
											<p class="is--sub">2014年入社　意匠設計</p>
											<p>同世代設計者から受ける機会が多いことは魅力のひとつです。</p>
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
