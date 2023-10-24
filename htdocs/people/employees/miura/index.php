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
			'title' => '三浦 淑美',
			'url' => '/people/employees/miura/'
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
									<span><span class="is--line">子育てをする中でより強くなった、</span><span class="is--line">子どもが主役となる学校をつくりたいという想い。</span>
								</p>
							</div>
							<div class="p-people__employee__article__header__body">
								<picture class="c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/miura_mv.jpg', true); ?>" alt="">
								</picture>
								<div>
									<h1>
										<span lang="ja">三浦 淑美</span>
										<span lang="en">MIURA Yoshimi</span>
										<span class="c-career-tag" data-category="new">新卒採用</span>
									</h1>
									<div class="p-people__employee__article__header__profile">
										<p>2005年入社<br>
										意匠設計</p>
										<p class="p-people__employee__article__header__description">新卒入社後、公共施設や文教施設の設計に携わる。20代後半から3回の産休育休を経験。現在は三人の子育てとキャリアを両立させながら、多くの文教施設を手がける。</p>
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
									<h2>伝え続けた公立学校に携わりたいという熱い想い</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>入社当初から、公共施設や大学、中高一貫校などを担当していましたが、プライベートで出産や育児を経験することによって、公立の小学校や中学校をもっと底上げしたい気持ちが強くなりました。それは、PTAや地域の活動などにも積極的に参加し、多くの大人や子どもたちと接していく中で、安心して自由に過ごすことができる子どもたちの環境が社会全体で少ないことを強く感じたから。昨今は、家庭環境の多様化や自然環境の変化などといった社会的背景により、地域における学校の位置付けも変化しつつあります。現代の公共の小学校や中学校が抱えている課題も多岐に渡りますから、その解決にお役に立てたらと思い、子育てを通じて養ってきた忍耐力や、きめ細かな視点、マルチタルクの能力などを自分の強みとして、発注者に寄り添いながら業務を進めてきました。そのひとつ一つが実績として評価され、今では求められることも多くなりました。</p>
								</div>
							</section>

							<!-- Chapter 2 -->
							<section class="p-people__employee__article__chapter">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>子どもたち一人ひとりが心地よく過ごせる場所をつくるために</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>学校を設計する際、常に念頭においていることは、子どもを中心とした視点を忘れないこと。特に公共の場合は、どうしても大人の視点で物事を決めてしまいがちですが、子どもたちの活き活きとした姿がイメージできない場合は、その計画自体の見直しが必要という合図だと思って、スタート地点に戻って考え直すようにしています。また、新たな場の使われ方や活動が生まれるような、ちょっとした仕掛けを空間に散りばめることも心がけている点です。設計を担当した学校の子どもたちにどんな想いで設計したのかを話す機会をいただくと、彼らなりにちゃんと受け取って、校舎を大事に使ってくれるのが嬉しくて。子どもが主役になる学校を、これからもつくっていきたいですね。</p>
								</div>
							</section>
						</div>
					</div>

					<div class="p-people__employee__article__insert l-wrapper">
						<div class="l-container--narrow">
							<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/miura_pic1.jpg'); ?>>
								<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/miura_pic1.jpg', true); ?>" alt="">
							</picture>
						</div>
					</div>

					<!-- Chapter 3 -->
					<section class="p-people__employee__article__chapter">
						<div class="l-wrapper">
							<div class="l-container--narrow">
								<header class="p-people__employee__article__chapter__header">
									<p lang="en">CHAPTER <b></b></p>
									<h2>子育てを言い訳にしないために<br class="is--pc">働き方を自ら変えた</h2>
								</header>

								<div class="p-people__employee__article__chapter__body">
									<p>入社当時は女性の設計者も少なく、産休育休への対応も整っているとは言えませんでした。時短勤務の時期は、クライアントとの打ち合わせ時間を早めに設定するよう自ら掛け合ったり、社内のチームスタッフとのコミュニケーションに時間を割いたり。会社に対応を求めるのでなく、自分で変えていこうと試行錯誤していました。それは、子育てをできない言い訳にしたくなかったから。子育てをしながらこの仕事をするのは容易ではありません。でも、この大変さを超えたところにやり遂げた大きな喜びがあるから、続けているのだと思います。最近では女性社員数の増加や男性の育休取得率からも分かる通り、性別問わず働きやすい環境が整っていると感じています。最近では育児との両立について、若手スタッフからの相談を受けることも多くなりました。</p>
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

								<div class="p-people__employee__article__schedule" data-cookie-name="kume_people_employees_miura_tab">
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
														<th><span lang="en">7:00</span></th>
														<td>家族揃って朝食</td>
													</tr>
													<tr>
														<th><span lang="en">8:00</span></th>
														<td>子ども達を送り出し</td>
													</tr>
													<tr>
														<th><span lang="en">8:20</span></th>
														<td>出社</td>
													</tr>
													<tr>
														<th><span lang="en">8:30</span></th>
														<td>メールチェック、タスク確認、設計など</td>
													</tr>
													<tr>
														<th><span lang="en">10:00</span></th>
														<td>スタッフとショートミーティングでスケジュール ＋ タスク共有</td>
													</tr>
													<tr>
														<th><span lang="en">12:00</span></th>
														<td>休憩</td>
													</tr>
													<tr>
														<th><span lang="en">13:00</span></th>
														<td>設計（各種検討、調整など）、社内外打合せ、電話メール対応など</td>
													</tr>
													<tr>
														<th><span lang="en">19:00</span></th>
														<td>自宅へ移動 ＋ 家事</td>
													</tr>
													<tr>
														<th><span lang="en">19:30</span></th>
														<td>子ども達と夕食</td>
													</tr>
													<tr>
														<th><span lang="en">21:00</span></th>
														<td>設計（集中作業など）</td>
													</tr>
												</table>
											</div>

											<div id="tab2" class="swiper-slide">
												<header><h3>オフの1日</h3></header>
												<div class="swiper-slide__container">
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/miura_tab2_pic1.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/miura_tab2_pic1.jpg', true); ?>" alt="">
													</picture>
													<div class="swiper-slide__body">
														<p>学校の長期休みには家族5人で旅行に出かけて、家族時間を思う存分楽しんでいます。</p>
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
										<img src="<?php echo KUME_Util::image_path('people/employees/miura_message.svg', true); ?>" alt="学生時代の活動も、将来に繋がっていく">
									</p>

									<div class="p-people__employee__article__chapter__body">
										<p>得意なところやいいところを伸ばしていける受け皿の広さやステップアップできる環境が、久米設計にはあると思います。大学や大学院での研究や活動は、必ず将来に繋がっていくものなので、ぜひ大切に取り組んでください。</p>
									</div>
								</div>

								<div>
									<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/employees/miura_pic2.jpg'); ?>>
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/miura_pic2.jpg', true); ?>" alt="">
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
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/mizutani_thumb.jpg', true); ?>" alt="">
											</picture>
											<span class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_l"></span></span>
										</div>
										<div class="p-article__footer__link__title">
											<h4>水谷 絢子　<br class="is--sp"><span class="c-career-tag" data-category="new">新卒採用</span></h4>
											<p class="is--sub">2014年入社<br class="is--sp">意匠設計</p>
											<p>たくさんの人との協働を楽しみながら社会の役に立つような設計を行いたい。</p>
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
