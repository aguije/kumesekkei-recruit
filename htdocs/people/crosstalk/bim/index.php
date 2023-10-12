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
			'title' => 'BIM座談会',
			'url' => '/people/bim/'
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
				'title' => 'BIM・デジタルデザインを取り入れた“新たな設計ワークフロー”の構築',
				'url' => '/people/bim/'
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

		<main class="p-people__crosstalk is--single" data-init-event="initPeopleCrosstalk">
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

			<article class="p-people__crosstalk__article">
				<header class="p-people__crosstalk__article__header">
					<div class="l-wrapper">
						<div class="l-container">
							<div class="p-people__crosstalk__article__header__title">
								<p class="p-people__crosstalk__article__header__index" lang="en">Crosstalk #01</p>
								<h1>
									<span>BIM・デジタルデザインを取り入れた</span>
									<span>“新たな設計ワークフロー”</span>
									<span>の構築都市と建築のチャレンジ：</span>
								</h1>
							</div>
							<div class="p-people__crosstalk__article__header__body">
								<picture class="c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/bim/mv.jpg', true); ?>" alt="">
								</picture>
								<div>
									<p>BIMは建築業界で重要な役割を果たしており、久米設計では設計者自らがBIMを活用して設計に取り組んでいます。ワークフローの実際と、未来のデジタルデザインについて話を聞きました。</p>
									<p class="p-people__crosstalk__article__header__annotation">2020年4月インタビュー実施</p>
								</div>
							</div>
						</div>
					</div>
				</header>

				<!-- Member -->
				<aside class="p-people__crosstalk__article__member">
					<div class="l-wrapper">
						<h3 lang="en">Crosstalk Member</h3>
						<ul>
							<li>
								<p>建築設計</p>
								<div>
									<h4>
										<span lang="ja">古川 智之</span>
										<span lang="en">FURUKAWA Tomoyuki</span>
									</h4>
								</div>
								<picture class="c-circle-picture c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/bim/member_furukawa.jpg', true); ?>" alt="">
								</picture>
							</li>
							<li>
								<p>構造設計</p>
								<div>
									<h4>
										<span lang="ja">伊東 和宏</span>
										<span lang="en">ITO Kazuhiro</span>
									</h4>
								</div>
								<picture class="c-circle-picture c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/bim/member_ito.jpg', true); ?>" alt="">
								</picture>
							</li>
							<li>
								<p>機械設備設計</p>
								<div>
									<h4>
										<span lang="ja">原田 和幸</span>
										<span lang="en">HARADA Kazuyuki</span>
									</h4>
								</div>
								<picture class="c-circle-picture c-lazy-trigger">
									<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/bim/member_harada.jpg', true); ?>" alt="">
								</picture>
							</li>
						</ul>
					</div>
				</aside>

				<div class="p-people__crosstalk__article__chapters">
					<div class="p-people__crosstalk__article__chapters__container">
						<!-- Chapter 1 -->
						<section class="p-people__crosstalk__article__chapter">
							<div class="l-wrapper">
								<div class="p-people__crosstalk__article__chapter__container l-container--narrow">
									<header>
										<p lang="en">CHAPTER <b></b></p>
										<h2>BIMについて</h2>
									</header>

									<div class="p-people__crosstalk__article__chapter__body">
										<div class="p-people__crosstalk__article__chapter__talk">
											<h3 class="p-people__crosstalk__article__chapter__q"><span>Q. 今の建築業界のBIMの状況をどう捉えていますか?</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('古川', 'furukawa', 'bim'); ?></dt>
												<dd>
													<p>2009年のBIM元年から今年で10年が経過し、国交省によるBIM/CIM推進委員会が発足するなど、 建築業界を取り巻くBIMの状況は大きな転換期を迎えています。今後の組織設計事務所の設計者にはBIMに対する深い理解と、それらを有効に用いて設計を行う新たなスキルが求められています。</p>
												</dd>
											</dl>
										</div>

										<div class="p-people__crosstalk__article__chapter__talk">
											<h3 class="p-people__crosstalk__article__chapter__q"><span>Q. 久米設計のBIMの状況はどうなっていますか?</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('原田', 'harada', 'bim'); ?></dt>
												<dd>
													<p>その中で久米設計は “設計者自らさわるBIM” をスローガンに掲げて取り組んでいます。他人任せではなく、設計者自らが実務の中で様々な実践を行っており、特に若手設計者が主体となって取り組んでいます。BIM-WGメンバーを中心に積極的な挑戦を行っており、最新の機器やソフトウェアの導入、アドオン開発など、設計者の意見をダイレクトに反映させることができる環境が整っています。</p>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Chapter 2 -->
						<section class="p-people__crosstalk__article__chapter">
							<div class="l-wrapper">
								<div class="p-people__crosstalk__article__chapter__container l-container--narrow">
									<header>
										<p lang="en">CHAPTER <b></b></p>
										<h2>設計概要とBIMワークフロー</h2>
									</header>

									<div class="p-people__crosstalk__article__chapter__body">
										<div class="p-people__crosstalk__article__chapter__talk">
											<h3 class="p-people__crosstalk__article__chapter__q"><span>Q. BIMを実際に設計業務にどう取り入れていますか?</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('古川', 'furukawa', 'bim'); ?></dt>
												<dd>
													<p>例えばS病院の事例では、基本設計から実施設計、確認申請、そして現場監理まで、Revitを中心にBIMによるワークフローを構築し、一気通貫してBIMによる設計を行いました。</p>
												</dd>
											</dl>
										</div>

										<div class="p-people__crosstalk__article__chapter__talk">
											<h3 class="p-people__crosstalk__article__chapter__q"><span>Q. 実践したプロジェクトの概要は?</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('原田', 'harada', 'bim'); ?></dt>
												<dd>
													<p>400床の地方中核病院であり、約7万m²の広大な敷地に計画されます。従来の病院に多く見られる、病棟が低層部に乗った「基壇型」ではなく、病棟を低層部の真横に並列させた「分棟型」の病院であることが特徴です。また、構造・環境面での課題解決とデザインを融合させるため、BIMによる検証やシミュレーションを多数取り入れております。</p>
												</dd>
											</dl>
										</div>

										<div class="p-people__crosstalk__article__chapter__inserts is--wide is--flex">
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/bim/chapter2_insert1.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/bim/chapter2_insert1.jpg', true); ?>" alt="">
											</picture>
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/bim/chapter2_insert2.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/bim/chapter2_insert2.jpg', true); ?>" alt="">
											</picture>
										</div>

										<div class="p-people__crosstalk__article__chapter__talk">
											<h3 class="p-people__crosstalk__article__chapter__q"><span>Q. デジタルデザインについて、<br>具体的にどのような取り組みをしましたか?</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('伊東', 'ito', 'bim'); ?></dt>
												<dd>
													<p>2棟の内、6階建のRC造である「病棟」は病室への日射負荷を低減するためのルーバーと構造フレームを兼ねた「アウトフレームルーバー」を提案し、ここでRhinoceros+GrasshopperをRevitと組み合わせることで、パラメトリックデザインを行いました。</p>
												</dd>
											</dl>
										</div>

										<div class="p-people__crosstalk__article__chapter__inserts is--wide is--flex">
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/bim/chapter2_insert3.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/bim/chapter2_insert3.jpg', true); ?>" alt="">
											</picture>
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/bim/chapter2_insert4.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/bim/chapter2_insert4.jpg', true); ?>" alt="">
											</picture>
										</div>

										<div class="p-people__crosstalk__article__chapter__talk">
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('原田', 'harada', 'bim'); ?></dt>
												<dd>
													<p>病室内への年間日射負荷が最小となる形状をアルゴリズムにより割り出し、かつそれらが同時に構造的にも有効となるよう一体的に算出しております。従来は繰り返しの手作業が多く必要でしたが、最適化手法を用いることで環境負荷低減シミュレーションと構造計画、加えて意匠的なファサードデザインを一体的に検討することが出来たと感じております。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('古川', 'furukawa', 'bim'); ?></dt>
												<dd>
													<p>実はこのようなスキルを持つ人材がまだまだ不足しているのは事実ですが、裏を返せばこうした新しい技術を糧に、若手の活躍の場が広がっているとも言えます。実際にこのシミュレーションとデザインも若手メンバーが中心となって発案し、ファサードデザインに取り入れられております。</p>
												</dd>
											</dl>
										</div>

										<div class="p-people__crosstalk__article__chapter__talk">
											<h3 class="p-people__crosstalk__article__chapter__q"><span>Q. シミュレーションの他には設計にBIMをどう取り入れましたか?</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('伊東', 'ito', 'bim'); ?></dt>
												<dd>
													<p>2階建の「低層棟」はS+SRC造であり、中心部と周辺部でそれらを切り替えています。SRC造部分は耐震コアとしているのに対し、周囲のS造部は透明感のあるピロティ形式の外観意匠に合わせて約 300Φのピン柱で構成しております。ここでは基本設計段階より自社開発の一貫構造計算プログラム「STEP」から自動変換した構造BIMモデルと、意匠BIMモデルを重ね合わせてスピーディな検証を行いました。従来は数時間かかる整合性の検証をわずか十数分で終えることができ、不整合の削減に繋がります。</p>
												</dd>
											</dl>
										</div>

										<div class="p-people__crosstalk__article__chapter__inserts">
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('people/crosstalk/bim/chapter2_insert5.jpg'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/bim/chapter2_insert5.jpg', true); ?>" alt="">
											</picture>
										</div>

										<div class="p-people__crosstalk__article__chapter__talk">
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('原田', 'harada', 'bim'); ?></dt>
												<dd>
													<p>設備設計においては「Revitが持つ部屋情報」と「Excelの設備諸元表」とを自社開発のRevit-Excelアドオン「諸元表連携システム(仮)」を用いて相互にダイレクト連携させました。計画の変更や面積変動を設備設計情報へ自動的に反映させることが可能となり、設計変更への柔軟な対応と設備設計者の負担軽減を実現しました。今後は積算や省エネ計算、維持管理(FM)などへの活用も視野に入れております。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('古川', 'furukawa', 'bim'); ?></dt>
												<dd>
													<p>構造設計者と設備設計者がプロジェクトチームに参画し、単に意匠の計画ありきではなく、エンジニアリングとデザインを融合させながら設計を進めることには非常に大きな魅力があります。久米設計にはそのような挑戦ができる環境や雰囲気があると思います。</p>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Chapter 3 -->
						<section class="p-people__crosstalk__article__chapter">
							<div class="l-wrapper">
								<div class="p-people__crosstalk__article__chapter__container l-container--narrow">
									<header>
										<p lang="en">CHAPTER <b></b></p>
										<h2>BIMによるプレゼンテーションと業務効率化</h2>
									</header>

									<div class="p-people__crosstalk__article__chapter__body">
										<div class="p-people__crosstalk__article__chapter__talk">
											<h3 class="p-people__crosstalk__article__chapter__q"><span>Q. BIMと言えば3Dプレゼンなどのイメージがありますが、<br>どのような取り組みをしましたか？</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('古川', 'furukawa', 'bim'); ?></dt>
												<dd>
													<p>ビジュアライゼーションソフトウェアの「Lumion」をRevitと連動させたプレゼンテーションにも力を入れました。クオリティの高いパースや動画を設計モデルから幾一出力することができるため、施主とのイメージの共有や関係者間の早期合意形成に有効活用しました。</p>
													<p>また、VRにも早期から取り組み、VIVE, Oculus, Fuzor, Twinmotionといった最新鋭の機器等を用いたプレゼンテーションを行っています。実際に会議の場に器材を持ち込んで、関係者にVR内で設計した建物を体感してもらいました。また、VRでは実物同様のスケールで体感ができ、自分とは異なる立場～例えば車椅子使用者やベッドに寝た患者目線など～を実体験することができるため設計の検証にも活用できます。弊社では常設の「VRルーム」を設けており、誰でもBIMソフトと連動させたVR検証が行える環境を構築しております。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('伊東', 'ito', 'bim'); ?></dt>
												<dd>
													<p>また、現場での設計監理においてもBIMワークフローを実践しております。設計者が主体となってゼネコン・専門工事会社を巻き込みながら「BIMモデル検証会」を行うことで、早期の課題解決と手戻りの防止、設計品質の向上に努めています。</p>
												</dd>
											</dl>
										</div>

										<div class="p-people__crosstalk__article__chapter__talk">
											<h3 class="p-people__crosstalk__article__chapter__q"><span>Q. どのように最新の情報をキャッチしていますか？</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('原田', 'harada', 'bim'); ?></dt>
												<dd>
													<p>RUG (Revit User Group)など外部の団体にも多数所属しており、業界の第一人者との最新情報共有や、共同での研究等を行っています。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('古川', 'furukawa', 'bim'); ?></dt>
												<dd>
													<p>また、社内の情報共有として「BIM ナレッジデータベース」を構築しています。「この操作の方法は？」といった質疑や事例等をWEB上でスピーディに共有できるようになっており、誰でも常に最新の情報に触れることが出来ます。</p>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</section>

						<!-- Chapter 4 -->
						<section class="p-people__crosstalk__article__chapter">
							<div class="l-wrapper">
								<div class="p-people__crosstalk__article__chapter__container l-container--narrow">
									<header>
										<p lang="en">CHAPTER <b></b></p>
										<h2>今後の展望</h2>
									</header>

									<div class="p-people__crosstalk__article__chapter__body">
										<div class="p-people__crosstalk__article__chapter__talk">
											<h3 class="p-people__crosstalk__article__chapter__q"><span>Q. 今後の久米設計のBIM・デジタルデザインについて<br>どのように考えていますか？</span></h3>
											<dl>
												<dt><?php echo KUME_Util::get_crosstalk_face('原田', 'harada', 'bim'); ?></dt>
												<dd>
													<p>日本のBIMはまだまだ発展途上であり、課題も多い状況です。その中で設計者が自らBIMやデジタルデザインに取り組むことには非常に大きな意味があります。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('伊東', 'ito', 'bim'); ?></dt>
												<dd>
													<p>久米設計のBIMもまだまだ挑戦を続けていかなければならない段階であり、そのような技術やチャレンジ精神を持ったメンバーを求めています。</p>
												</dd>

												<dt><?php echo KUME_Util::get_crosstalk_face('古川', 'furukawa', 'bim'); ?></dt>
												<dd>
													<p>今後はジェネラティブデザイン、AIやビッグデータ活用、FMとの連動など、多様な技術を設計に取り入れていく柔軟な姿勢が求められており、それこそ従来通りのやり方のままでは淘汰されてしまいます。“設計”そのものの考えが変わっていくと言っても過言ではありません。久米設計にはそこに向かってチャレンジできる土台が整っています。未来を見据えた新しい視点を持ったチームが、より良いこれからの建築を作っていくのではないでしょうか。</p>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
						</section>
					</div>

					<div class="p-people__crosstalk__article__more">
						<div class="p-people__crosstalk__article__more__container">
							<a class="c-button c-button--more" href="javascript:void(0);"><span>つづきを読む</span></a>
						</div>
					</div>
				</div>

				<footer class="p-article__footer">
					<div class="l-wrapper">
						<div class="l-container">
							<ul class="p-article__footer__links">
								<li class="is--center">
									<a class="c-button c-button--round is--white" href="/people/#crosstalk"><span>BACK TO INDEX</span></a>
								</li>
								<li class="is--prev">
									<a class="p-article__footer__link" href="/people/crosstalk/milano/">
										<div class="p-article__footer__link__thumb">
											<picture class="c-circle-picture c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk/footer_thumb_milano.jpg', true); ?>" alt="">
											</picture>
											<span class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_l"></span></span>
										</div>
										<div class="p-article__footer__link__title">
											<h4>新宿TOKYU MILANO<br>再開発プロジェクトチーム</h4>
											<p>都市と建築のチャレンジ</p>
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
