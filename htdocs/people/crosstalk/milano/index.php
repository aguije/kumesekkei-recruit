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
			'title' => 'クロストーク',
			'url' => '/people/#crosstalk'
		),
		array(
			'title' => '都市と建築のチャレンジ',
			'url' => '/people/milano/'
		),
	);


	/** =================================================================
	 * meta生成
	 * --------------------------------------------------------------- */

	$meta = KUME_Util::get_meta(array(
		'bc' => array(
			array(
				'title' => '採用トップ',
				'url' => '/'
			),
			array(
				'title' => '人を知る',
				'url' => '/people/'
			),
			array(
				'title' => 'クロストーク',
				'url' => '/people/#crosstalk'
			),
			array(
				'title' => '都市と建築のチャレンジ：新宿TOKYU MILANO再開発プロジェクトチーム',
				'url' => '/people/milano/'
			),
		)
	));


	/** =================================================================
	 * グローベルメニューのアクティブ
	 * --------------------------------------------------------------- */

	$_GET['gm_active'] = 'people';
	$_GET['gm_sub_active'] = 'people_crosstalk';


	/** =================================================================
	 * ページナビゲーション
	 * --------------------------------------------------------------- */

	ob_start();

	?>
	<nav class="c-page-nav">
		<ul>
			<li><a class="c-button c-button--round is--gray" href="/people/#employees"><span>社員紹介</span></a></li>
			<li><a class="c-button c-button--round is--gray is--active" href="/people/#crosstalk"><span>クロストーク</span></a></li>
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

		<main class="p-crosstalk is--single" data-init-event="initPeopleCrosstalk">
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

			<article class="p-crosstalk-article">
				<header class="p-crosstalk-article__header">
					<div class="l-wrapper">
						<div class="l-container">
							<div class="p-crosstalk-article__header__title">
								<p class="p-crosstalk-article__header__index" lang="en">Crosstalk #02</p>
								<h1>
									<span>都市と建築のチャレンジ：</span>
									<span>新宿TOKYU MILANO再開発</span>
									<span>プロジェクトチーム</span>
								</h1>
							</div>
							<div class="p-crosstalk-article__header__body">
								<picture class="c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/mv.jpg', true); ?>" alt="">
								</picture>
								<div>
									<p>新宿・歌舞伎町で、約60年間エンターテインメントをリードしてきた新宿TOKYU MILANOの跡地開発。これを受け継ぎ、どのような施設にするのか企画段階から参画したプロジェクトチームに話を聞きました。</p>
								</div>
							</div>
						</div>
					</div>
				</header>

				<!-- Member -->
				<aside class="p-crosstalk-article__member">
					<div class="l-wrapper">
						<h3 lang="en">Crosstalk Member</h3>
						<ul>
							<li>
								<p>PA（プロジェクト・アーキテクト）</p>
								<div>
									<h4>
										<span lang="ja">井上 宏</span>
										<span lang="en">INOUE Hiroshi</span>
									</h4>
								</div>
								<picture class="c-circle-picture c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/member_inoue.jpg', true); ?>" alt="">
								</picture>
							</li>
							<li>
								<p>建築設計</p>
								<div>
									<h4>
										<span lang="ja">横山 文健</span>
										<span lang="en">YOKOYAMA Fumitake</span>
									</h4>
								</div>
								<picture class="c-circle-picture c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/member_yokoyama.jpg', true); ?>" alt="">
								</picture>
							</li>
							<li>
								<p>都市計画</p>
								<div>
									<h4>
										<span lang="ja">小尾口 敦</span>
										<span lang="en">KOGUCHI Atsushi</span>
									</h4>
								</div>
								<picture class="c-circle-picture c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/member_koguchi.jpg', true); ?>" alt="">
								</picture>
							</li>
							<li>
								<p>建築設計・開発企画</p>
								<div>
									<h4>
										<span lang="ja">小池 達也</span>
										<span lang="en">KOIKE Tatsuya</span>
									</h4>
								</div>
								<picture class="c-circle-picture c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/member_koike.jpg', true); ?>" alt="">
								</picture>
							</li>
							<li>
								<p>建築設計</p>
								<div>
									<h4>
										<span lang="ja">富岡 由貴</span>
										<span lang="en">TOMIOKA Yuki</span>
									</h4>
								</div>
								<picture class="c-circle-picture c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/member_tomioka.jpg', true); ?>" alt="">
								</picture>
							</li>
							<li>
								<p>建築設計</p>
								<div>
									<h4>
										<span lang="ja">片山 英</span>
										<span lang="en">KATAYAMA Ei</span>
									</h4>
								</div>
								<picture class="c-circle-picture c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/member_katayama.jpg', true); ?>" alt="">
								</picture>
							</li>
							<li>
								<p>建築設計</p>
								<div>
									<h4>
										<span lang="ja">星川 慎之介</span>
										<span lang="en">HOSHIKAWA Shinnosuke</span>
									</h4>
								</div>
								<picture class="c-circle-picture c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/member_hoshikawa.jpg', true); ?>" alt="">
								</picture>
							</li>
						</ul>
					</div>
				</aside>

				<div class="p-crosstalk-article__chapters">
					<div class="p-crosstalk-article__chapters__container">
						<!-- Chapter 1 -->
						<section class="p-crosstalk-article__chapter">
							<div class="l-wrapper">
								<div class="p-crosstalk-article__chapter__container l-container--narrow">
									<header>
										<p lang="en">CHAPTER <b></b></p>
										<h2>新しい街の<br>核を創るプロジェクト</h2>
									</header>

									<div class="p-crosstalk-article__chapter__body">
										<div class="p-crosstalk-article__chapter__inserts is--wide is--flex">
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/milano/chapter1_insert1.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/chapter1_insert1.jpg', true); ?>" alt="">
											</picture>
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/milano/chapter1_insert2.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/chapter1_insert2.jpg', true); ?>" alt="">
											</picture>
										</div>

										<div class="p-crosstalk-article__chapter__talk">
											<h3 class="p-crosstalk-article__chapter__q"><span>Q. どのようなプロジェクトなのですか？</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('横山', 'yokoyama', 'milano'); ?></dt>
												<dd>
													<p>このプロジェクトは新宿歌舞伎町でエンターテイメントをリードしてきた「ミラノ座」の跡地に、新しい街の核を創るプロジェクトです。建物の高さは約225mで、ライブホール、劇場、映画館などのさまざまなエンターテインメント機能とホテル機能、商業機能が複合したものになります。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('片山', 'katayama', 'milano'); ?></dt>
												<dd>
													<p>新宿歌舞伎町という非常にポテンシャルの高い立地になります。これまでに歩んできた深い歴史があり、醸成されてきた文化があり、さまざまな資源や発信力もあり、多様性や寛容性もあり、数多くの外国人が訪れる街です。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('小池', 'koike', 'milano'); ?></dt>
												<dd>
													<p>そういう強い魅力のある街のポテンシャルを更に強めるにはどうすればよいか、どう未来に向けられるか、それを考えることがこのチームの大事な役割のひとつでした。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('岩倉', 'iwakura', 'milano'); ?></dt>
												<dd>
													<p>通常の大きな開発プロジェクトは、オフィスや住宅といった用途がベースとして最初に決まっていて、そこに＋αの用途を足していくことが多いのですが、このプロジェクトはそういうプロセスではなく、この街をより魅力的にするために、東京という都市を強くするために何を作ったらよいか、クライアントと一緒に考えるところから始めてきました。</p>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Chapter 2 -->
						<section class="p-crosstalk-article__chapter">
							<div class="l-wrapper">
								<div class="p-crosstalk-article__chapter__container l-container--narrow">
									<header>
										<p lang="en">CHAPTER <b></b></p>
										<h2>クライアントと一緒に<br>プログラム企画を行う醍醐味</h2>
									</header>

									<div class="p-crosstalk-article__chapter__body">
										<div class="p-crosstalk-article__chapter__inserts is--wide is--flex">
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/milano/chapter2_insert1.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/chapter2_insert1.jpg', true); ?>" alt="">
											</picture>
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/milano/chapter2_insert2.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/chapter2_insert2.jpg', true); ?>" alt="">
											</picture>
										</div>

										<div class="p-crosstalk-article__chapter__talk">
											<h3 class="p-crosstalk-article__chapter__q"><span>Q. このチームはどのようにプロジェクトに関わったのですか？</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('井上', 'inoue', 'milano'); ?></dt>
												<dd>
													<p>まず、この建物を「都市観光拠点」と位置づけ、未来のあり方についてクライアントと一緒に考え始めるところからスタートしました。時代も社会もすごいスピードで進化しています。建物に今までのプログラムをそのまま持ってくるのではなく、社会の変化を分析・予測しながら、プログラムを考えました。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('小池', 'koike', 'milano'); ?></dt>
												<dd>
													<p>クライアントと一緒に企画をして、すぐにラフプランや空間スケッチを描き、事業性と合わせて引き出せる効果を検証しました。これを何度も重ねていきます。いままでにないプログラムは、相乗的に出せる周辺機能もイメージしながら、研究とスケッチを続けました。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('冨岡', 'tomioka', 'milano'); ?></dt>
												<dd>
													<p>クライアントから綿密な設計条件をもらってから設計を進めるというプロセスではありませんでした。常に将来をにらみながら輪郭決めと設計を繰り返すという進め方は、非常にやりがいのあるものでした。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('星川', 'hoshikawa', 'milano'); ?></dt>
												<dd>
													<p>クライアントと一緒に、新しい種になりそうな「もの」「こと」を見たり、体験したりしながら、その先の空間のあり方を考えてきました。</p>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Chapter 3 -->
						<section class="p-crosstalk-article__chapter">
							<div class="l-wrapper">
								<div class="p-crosstalk-article__chapter__container l-container--narrow">
									<header>
										<p lang="en">CHAPTER <b></b></p>
										<h2>行政との協働</h2>
									</header>

									<h3 class="p-crosstalk-article__chapter__q"><span>Q. 都市計画も関わるプロジェクトですね？</span></h3>

									<div class="p-crosstalk-article__chapter__body is--flex is--wide">
										<div class="p-crosstalk-article__chapter__talk">
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('岩倉', 'iwakura', 'milano'); ?></dt>
												<dd>
													<p>このプロジェクトでは、都市再生特区という制度を使って容積の割増しを受けています。</p>
													<p>通常の大規模開発はオフィスが多いので、そこに付帯させる用途がどれくらい都市に貢献するか、また同時に整備する周辺道路等の都市基盤整備の貢献度で評価されます。このプロジェクトは少しちがって、建物のプログラム自体が大きく評価されています。そういう評価を引き出すために、強いシナリオを一生懸命考えました。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('小尾口', 'koguchi', 'milano'); ?></dt>
												<dd>
													<p>行政はどうやって強い都市をつくるか、都市間競争にどう勝ち抜いていけるか、ということを真剣に考えています。私たちとクライアントも、都市の魅力をどう高めるかを考えてきました。行政は、決して事業者の提案にジャッジを下すだけの立場ではありません。ともに都市のあるべき姿を考える大切な関係だと感じています。行政とも強いシンパシーを感じながら、ときに一緒に苦労しながら進んできました。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('岩倉', 'iwakura', 'milano'); ?></dt>
												<dd>
													<p>都市再生特区手続きの他にも、さまざまな特例についてもチャレンジをしています。新しいことを成し遂げていくことに大きなやりがいを感じています。基本的なスタンスは「行政と一緒にチャレンジ」で進めてきています。</p>
												</dd>
											</dl>
										</div>

										<div class="p-crosstalk-article__chapter__inserts">
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/milano/chapter3_insert1.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/chapter3_insert1.jpg', true); ?>" alt="">
											</picture>
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/milano/chapter3_insert2.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/chapter3_insert2.jpg', true); ?>" alt="">
											</picture>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Chapter 4 -->
						<section class="p-crosstalk-article__chapter">
							<div class="l-wrapper">
								<div class="p-crosstalk-article__chapter__container l-container--narrow">
									<header>
										<p lang="en">CHAPTER <b></b></p>
										<h2>建築と都市を<br>同時に考えるプロセス</h2>
									</header>

									<div class="p-crosstalk-article__chapter__body">
										<div class="p-crosstalk-article__chapter__talk">
											<h3 class="p-crosstalk-article__chapter__q"><span>Q. 都市と建築は別々ではないのですか？</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('井上', 'inoue', 'milano'); ?></dt>
												<dd>
													<p>久米設計の建築チームと都市チームが一体となって、クリエイティビティを発揮し進めてきました。</p>
													<p>都市の上位計画を分析し、そこに適した都市開発手法を選び、都市計画を決めて、建築をつくる、というそれぞれの専門チームがリレー式に仕事をするのではなく、街のあり方から場・空間、そこで生まれる体験、という都市・建築・コンテンツをチーム一体で考えてきました。分業では成し遂げられない、重層的な思考によって、より確度の高い「未来のシナリオ」を事業者とともに描くことができました。</p>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Chapter 5 -->
						<section class="p-crosstalk-article__chapter">
							<div class="l-wrapper">
								<div class="p-crosstalk-article__chapter__container l-container--narrow">
									<header>
										<p lang="en">CHAPTER <b></b></p>
										<h2>数多くのプレーヤーとの対話</h2>
									</header>

									<div class="p-crosstalk-article__chapter__body">
										<div class="p-crosstalk-article__chapter__talk">
											<h3 class="p-crosstalk-article__chapter__q"><span>Q. 大規模プロジェクトならではの進め方はありますか？</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('小池', 'koike', 'milano'); ?></dt>
												<dd>
													<p>まず大きなプロジェクトになるほど社会との関わりが強くなります。そのため広い視点や分析力、発想力が求められます。さらにこのプロジェクトではこれまでにないことに挑んでいるので、関係するプレーヤーが非常に多くなります。数々の運営関係者、コンテンツの関係者、細部にわたる専門家、デザイナーなど。私たちは全体の統合役としてできるだけプレーヤーと対話をすることを心掛けて進めてきました。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('星川', 'hoshikawa', 'milano'); ?></dt>
												<dd>
													<p>新しいチャレンジを多く含むプロジェクトなので、今までの経験や知見だけで進められるものではありません。プレーヤーが集まって繰り返し議論を重ね、時に悩みながら進めています。</p>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Chapter 6 -->
						<section class="p-crosstalk-article__chapter">
							<div class="l-wrapper">
								<div class="p-crosstalk-article__chapter__container l-container--narrow">
									<header>
										<p lang="en">CHAPTER <b></b></p>
										<h2>領域を広げた仕事のしかた</h2>
									</header>

									<div class="p-crosstalk-article__chapter__body">
										<div class="p-crosstalk-article__chapter__talk">
											<h3 class="p-crosstalk-article__chapter__q"><span>Q. チームとして心掛けていることはありますか？</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('横山', 'yokoyama', 'milano'); ?></dt>
												<dd>
													<p>都市計画、建築設計、エンジニアリングなど、それぞれの専門性を発揮しながらプロジェクトは進んでいきます。プロジェクトの大小に関わらず、それらの専門性はお互いの境界を拡げながら、広い思考で進められるべきだと思います。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('井上', 'inoue', 'milano'); ?></dt>
												<dd>
													<p>街のポテンシャル、都市の課題、それらをしっかりと整理した上で、そのために必要な場・空間・機能、さらには体験のためのコンテンツ、そして将来性およびリアリティのある事業性など、広く統合的に考え、未来の社会を実現していく。そういう基本姿勢を共有しながら、私たちチームは、様々な場面で、領域にとらわれないアイデアを出し合い、それを昇華させてきました。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('ヘラー', 'heller', 'milano'); ?></dt>
												<dd>
													<p>デザインのことだけでなく、モノ・コトなんでも見聞きした新しい情報をメンバー内でシェアし合って雑談し合いながら進めてます。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('片山', 'katayama', 'milano'); ?></dt>
												<dd>
													<p>設計の経験や技術だけではなくて、柔軟な発想が求められます。新しいチャレンジの連続なので、若手にもチャンスが多いです。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('井上', 'inoue', 'milano'); ?></dt>
												<dd>
													<p>これからも社会好き、未来好きのチームとして、クライアントのサポートを続けていきます。</p>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>

					<div class="p-crosstalk-article__more">
						<div class="p-crosstalk-article__more__container">
							<a class="c-button c-button--more" href="javascript:void(0);"><span>つづきを読む</span></a>
						</div>
					</div>
				</div>

				<aside class="c-banner">
					<div class="l-wrapper">
						<div class="c-banner__container">
							<a href="https://www.kumesekkei.co.jp/designstory/shinjuku_tokyu_milano_development.html" target="_blank" rel="noopener">
								<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/milano/story_thumb1.jpg'); ?>>
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/milano/story_thumb1.jpg', true); ?>" alt="">
								</picture>
								<div>
									<p class="c-banner__tag"><div class="c-button c-button--round is--black is--fit"><b>デザインストーリー</b></div></p>
									<h4><span class="c-icon c-icon--external"></span>魅力ある都市の未来像を描く</h4>
									<p class="c-banner__description">新宿TOKYU MILANO再開発</p>
								</div>
							</a>
						</div>
					</div>
				</aside>

				<footer class="p-crosstalk-article__footer">
					<div class="l-wrapper">
						<div class="l-container">
							<ul class="p-crosstalk-article__footer__links">
								<li class="is--center">
									<a class="c-button c-button--round is--white" href="/people/#crosstalk"><span>BACK TO INDEX</span></a>
								</li>
								<li class="is--prev">
									<a href="/people/crosstalk/bim/">
										<div class="is--thumb">
											<picture class="c-circle-picture c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/footer_thumb_bim.jpg', true); ?>" alt="">
											</picture>
											<span class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_l"></span></span>
										</div>
										<div class="is--title">
											<h4>BIM座談会</h4>
											<p>BIM・デジタルデザインを取り入れた“新たな設計ワークフロー”の構築</p>
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
