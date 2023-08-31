<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/library/vendor/autoload.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/class.php');

	$KUME = new KUME();

?>
<?php

	$root_url = 'https://' . $_SERVER['HTTP_HOST'] . '/';

	$meta = array(
		'title' => '',
		'description' => '',
		'image' => KUME_Util::image_path('ogp.png', true),
		'site' => '',
		'url' => $root_url,
	);

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/header.mod.php');

?>

	<div class="p-superwrapper">
		<?php

			include($_SERVER['DOCUMENT_ROOT'] . '/modules/gh.mod.php');

		?>

		<main class="p-top">
			<div class="p-top__hero">
				<figure>
					<img src="https://picsum.photos/300/300" alt="">
				</figure>

				<div>
					<h2><span>「豊かさ」</span>を拓く</h2>
					<p><span>私たちは「豊かさ」とは何かを真剣に考える多様な個性の集合体です。</span><br>
					<span>地域・人を大切に、未来を見据えた新たな価値を創造していきます。</span></p>
				</div>

				<div><span>↓</span></div>
			</div>

			<section class="p-top__news">
				<div class="l-wrapper">
					<div class="p-top__news__main">
						<header>
							<h3>
								<span lang="ja">新着情報</span><br>
								<span lang="en">Recruit News</span>
							</h3>
							<p><a href="#" target="_blank" rel="noopener"><span>一覧へ</span></a></p>
						</header>

						<div class="p-top__news__list">
							<ul>
								<li>
									<article class="p-top__news__item">
										<time datetime="2023-11-08">2023.11.08</time>
										<h4>
											<a href="#" target="_blank" rel="noopener"><span>ＷＥＢセミナー「久米設計社員との交流座談会」を開催します。</span></a>
											<span class="c-tag">学生対象プログラム</span>
										</h4>
										<div class="p-top__news__item__category" data-category="new">新卒採用</div>
									</article>
								</li>
								<li>
									<article class="p-top__news__item">
										<time datetime="2023-11-01">2023.11.01</time>
										<h4>
											<a href="#" target="_blank" rel="noopener"><span>第3回 ＷＥＢプロジェクト公演「マリンメッセ福岡 B館」を配信します。</span></a>
											<span class="c-tag">学生対象プログラム</span>
										</h4>
										<div class="p-top__news__item__category" data-category="new">新卒採用</div>
									</article>
								</li>
								<li>
									<article class="p-top__news__item">
										<time datetime="2023-10-22">2023.10.22</time>
										<h4>
											<a href="#" target="_blank" rel="noopener"><span>「意匠設計」部門の再募集を開始しました。</span></a>
										</h4>
										<div class="p-top__news__item__category" data-category="career">キャリア採用</div>
									</article>
								</li>
								<li>
									<article class="p-top__news__item">
										<time datetime="2023-10-22">2023.10.22</time>
										<h4>
											<a href="#" target="_blank" rel="noopener"><span>支社訪問会を開催します。マイページよりお申し込みください。</span></a>
										</h4>
										<div class="p-top__news__item__category" data-category="new">新卒採用</div>
									</article>
								</li>
								<li>
									<article class="p-top__news__item">
										<time datetime="2023-10-22">2023.10.22</time>
										<h4>
											<a href="#" target="_blank" rel="noopener"><span>株式会社久米設計　オープンカンパニー2023年のエントリーを開始しました。マイページよりお申し込みください。</span></a>
										</h4>
										<div class="p-top__news__item__category" data-category="new">新卒採用</div>
									</article>
								</li>
							</ul>
						</div>
					</div>

					<footer>
						<ul>
							<li><a href="#" target="_blank" rel="noopener"><span>マイページログイン</span></a></li>
							<li><a href="#" target="_blank" rel="noopener"><span>（初めての方はこちら）</span></a></li>
						</ul>
					</footer>
				</div>
			</section>

			<section class="p-top__about">
				<div class="l-wrapper">
					<header class="c-header-set">
						<div class="c-header-set__title">
							<h2>
								<span lang="ja">会社を知る</span><br>
								<span lang="en">About Kume Sekkei</span>
							</h2>
						</div>

						<nav>
							<ul>
								<li><a href="#">トップメッセージ</a></li>
								<li><a href="#">CSR活動</a></li>
								<li><a href="#">数字で見る久米設計</a></li>
							</ul>
						</nav>
					</header>

					<ul>
						<li class="p-top__about__item p-top__about__message">
							<div class="p-top__about__item__main">
								<h3>
									<a href="#">
										<span>
											<span lang="ja">トップメッセージ</span><br>
											<span lang="en">Top Message</span>
										</span>
									</a>
								</h3>
							</div>
							<div class="p-top__about__item__sub">
								<figure>
									<img src="https://picsum.photos/300/300" alt="">
								</figure>
							</div>
						</li>

						<li class="p-top__about__item p-top__about__csr">
							<div class="p-top__about__item__main">
								<h3>
									<a href="#">
										<span>
											<span lang="ja">社会課題への取り組み</span><br>
											<span lang="en">Corporate Social Resposibility</span>
										</span>
									</a>
								</h3>
								<ul>
									<li>#こども未来</li>
									<li>#安全・安心</li>
									<li>#カーボンニュートラル</li>
									<li>#ダイバシティ＆インクルージョン</li>
									<li>#エリアUP</li>
									<li>#ワークスタイル</li>
									<li>#ストック活用</li>
									<li>#これからの学校</li>
								</ul>
							</div>
							<div class="p-top__about__item__sub">
								<div class="swiper">
									<div class="swiper-wrapper">
										<div class="swiper-slide">Slide 1</div>
									</div>
									<div class="swiper-pagination"></div>
								</div>
							</div>
						</li>

						<li class="p-top__about__item p-top__about__statistics">
							<div class="p-top__about__item__main">
								<h3>
									<a href="#">
										<span>
											<span lang="ja">数字で見る久米設計</span><br>
											<span lang="en">Statistics &amp; Facts</span>
										</span>
									</a>
								</h3>
							</div>

							<ul class="p-top__about__statistics__figs">
								<li>
									<figure>
										<img src="https://picsum.photos/300/300" alt="">
										<figcaption>女男比率</figcaption>
									</figure>
									<div>
										<p>
											<small>女性</small><span>37.0<small>%</small></span>
											<small>男性</small><span>63.0<small>%</small></span>
										</p>
										<p><small>（新卒〜3年目）</small></p>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</section>

			<section class="p-top__work">
				<div class="l-wrapper">
					<div class="p-top__work__main">
						<header class="c-header-set">
							<div class="c-header-set__title">
								<h2>
									<span lang="ja">働く環境</span><br>
									<span lang="en">Work @ Kume Sekkei</span>
								</h2>
								<p class="c-header-set__link"><a href="#"><span>働く環境について</span></a></p>
							</div>

							<nav>
								<ul>
									<li><a href="#">職場環境</a></li>
									<li><a href="#">福利厚生</a></li>
									<li><a href="#">人材育成プログラム</a></li>
								</ul>
							</nav>
							<p>久米設計本社ビルは、久米設計社員により設計された自社ビルです。本社ビルは運河沿いに立地しており、東京でありながら風や緑が感じられる環境で業務に取組んでいます。社内には様々な設備や環境が整っています。</p>
						</header>

						<ul>
							<li>
								<a href="#">
									<span>
										<span lang="ja">福利厚生</span><br>
										<span lang="en">Welfare</span>
									</span>
								</a>
								<figure><img src="https://picsum.photos/300/300" alt=""></figure>
							</li>
							<li>
								<a href="#">
									<span>
										<span lang="ja">人材育成プログラム</span><br>
										<span lang="en">Human Resource Development</span>
									</span>
								</a>
								<figure><img src="https://picsum.photos/300/300" alt=""></figure>
							</li>
						</ul>
					</div>

					<figure class="p-top__work__illustration">
						<img src="https://picsum.photos/300/300" alt="">
					</figure>
				</div>
			</section>

			<section class="p-top__people">
				<div class="l-wrapper">
					<header class="c-header-set">
						<div class="c-header-set__title">
							<h2>
								<span lang="ja">人を知る</span><br>
								<span lang="en">People</span>
							</h2>
							<p class="c-header-set__link"><a href="#"><span>人を知る</span></a></p>
						</div>

						<nav>
							<ul>
								<li><a href="#">社員インタビュー</a></li>
								<li><a href="#">クロストーク</a></li>
								<li><a href="#">動画</a></li>
							</ul>
						</nav>
					</header>

					<div class="p-top__people__main">
						<section class="p-top__people__employee">
							<header>
								<h3>
									<span lang="ja">社員紹介</span><br>
									<span lang="en">Employees Introduction</span>
								</h3>
							</header>

							<div class="p-top__people__employee__main">
								<article>
									<a href="#" rel="bookmark">
										<figure>
											<img src="https://picsum.photos/300/300" alt="">
										</figure>
										<header>
											<h4>中島 和子</h4>
											<p>意匠設計</p>
										</header>
										<p>互いの意思を尊重し、最適な答えを探していくことのできる職場です。</p>
										<footer>
											<p>キャリア採用</p>
										</footer>
									</a>
								</article>

								<article>
									<a href="#" rel="bookmark">
										<figure>
											<img src="https://picsum.photos/300/300" alt="">
										</figure>
										<header>
											<h4>野原 春花</h4>
											<p>意匠設計</p>
										</header>
										<p>同世代設計者から刺激を受ける機会が多いことは魅力のひとつです。</p>
										<footer>
											<p>新卒採用</p>
										</footer>
									</a>
								</article>
							</div>
						</section>

						<section class="p-top__people__crosstalk">
							<header>
								<h3>
									<span lang="ja">クロストーク</span><br>
									<span lang="en">Crosstalk</span>
								</h3>
							</header>
							<div class="p-top__people__crosstalk__main">
								<div class="p-top__people__crosstalk__title">
									<h4>BIM座談会</h4>
									<p>BIMを取り入れた設計ワークフローの構築とは？</p>
								</div>
								<div class="swiper">
									<div class="swiper-wrapper">
										<div class="swiper-slide">Slide 1</div>
									</div>
									<div class="swiper-pagination"></div>
								</div>
							</div>
						</section>

						<section class="p-top__people__interview">
							<header>
								<h3>
									<span lang="ja">インタビュー動画</span><br>
									<span lang="en">Interview Movie</span>
								</h3>
							</header>

							<div class="p-top__people__interview__main">
								<article>
									<header>
										<h4>電気設備について聞いてみた</h4>
									</header>
									<div>
										<a href="#" rel="bookmark">
											<figure>
												<img src="https://picsum.photos/300/300" alt="">
											</figure>
											<div>
												<div><span class="c-icon c-icon--play"></span></div>
												<p>10:32</p>
											</div>
										</a>
									</div>
									<p>技術的な電気設備の設計を、デザイン性高く建築に融合させる、若手電気設備設計者の健闘を公開しています。</p>
								</article>

								<article>
									<header>
										<h4>監理とはどんな仕事ですか？</h4>
									</header>
									<div>
										<a href="#" rel="bookmark">
											<figure>
												<img src="https://picsum.photos/300/300" alt="">
											</figure>
											<div>
												<div><span class="c-icon c-icon--play"></span></div>
												<p>7:41</p>
											</div>
										</a>
									</div>
									<p>久米設計で働く若手社員のインタビュー動画。建築の最終防衛線として第一線で働く社員のリアルな声を公開しています。</p>
								</article>

								<article>
									<header>
										<h4>先輩社員にリレーインタビュー</h4>
									</header>
									<div>
										<a href="#" rel="bookmark">
											<figure>
												<img src="https://picsum.photos/300/300" alt="">
											</figure>
											<div>
												<div><span class="c-icon c-icon--play"></span></div>
												<p>13:16</p>
											</div>
										</a>
									</div>
									<p>話しかけやすい先輩にアポを取って、久米設計がどんなところか、聞いてみました。回答者が次の人を呼んでくるのがルールです。</p>
								</article>
							</div>
						</section>
					</div>
				</div>
			</section>

			<section class="p-top__story">
				<div class="l-wrapper">
					<header class="c-header-set">
						<div class="c-header-set__title">
							<h2>
								<span lang="ja">デザインストーリー</span><br>
								<span lang="en">Design Story</span>
							</h2>
						</div>

						<nav>
							<ul>
								<li><a href="#" target="_blank" rel="noopener"><span>一覧へ</span></a></li>
							</ul>
						</nav>

						<p>それぞれのプロジェクトには、関わった方々の強い想いとデザインで紡いだストーリーがあります。</p>
					</header>

					<div class="p-top__story__main">
						<article>
							<a href="#" target="_blank" rel="bookamrk noopener">
								<h3>始まりの場所</h3>
								<p>アイヌの歴史や文化を伝え、つなぐ、<br class="is-pc">ここから始まり進化する博物館</p>
								<figure>
									<img src="https://picsum.photos/300/300" alt="">
									<figcaption>国立アイヌ民族博物館</figcaption>
								</figure>
							</a>
						</article>

						<article>
							<a href="#" target="_blank" rel="bookamrk noopener">
								<h3>風との共生</h3>
								<p>“環境” を <br class="is-pc">“カタチ” にした<br class="is-pc">環境共生スタジアム</p>
								<figure>
									<img src="https://picsum.photos/300/300" alt="">
									<figcaption>栃木県総合<br class="is-pc">運動公園陸上競技場</figcaption>
								</figure>
							</a>
						</article>

						<article>
							<a href="#" target="_blank" rel="bookamrk noopener">
								<h3>地域との連携</h3>
								<p>原風景を辿り、<br class="is-pc">建築として<br class="is-pc">かたちにする</p>
								<figure>
									<img src="https://picsum.photos/300/300" alt="">
									<figcaption>瀬戸市立にじの丘学園</figcaption>
								</figure>
							</a>
						</article>

						<article>
							<a href="#" target="_blank" rel="bookamrk noopener">
								<h3>大規模木造</h3>
								<p>新しく懐かしい<br class="is-pc">木造校舎が<br class="is-pc">出来上がった</p>
								<figure>
									<img src="https://picsum.photos/300/300" alt="">
									<figcaption>牛久市立<br class="is-pc">ひたち野うしく中学校</figcaption>
								</figure>
							</a>
						</article>

						<article>
							<a href="#" target="_blank" rel="bookamrk noopener">
								<h3>構造への挑戦</h3>
								<p>不安から熱狂へ、<br class="is-pc">そして信頼と協働で<br class="is-pc">作る鉄骨</p>
								<figure>
									<img src="https://picsum.photos/300/300" alt="">
									<figcaption>山梨県立図書館</figcaption>
								</figure>
							</a>
						</article>
					</div>
				</div>
			</section>
		</main>

		<?php

			include($_SERVER['DOCUMENT_ROOT'] . '/modules/gf.mod.php');

		?>
	</div>

<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/footer.mod.php');

?>
