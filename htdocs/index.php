<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/library/vendor/autoload.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/assets/php/class.php');

	$KUME = new KUME();

?>
<?php

	global $bc;

	$bc = array(
		array(
			'title' => '採用サイト | 株式会社 久米設計',
			'url' => '/',
			'type' => 'website'
		)
	);

	$meta = KUME_Util::get_meta(array(
		'bc' => $bc
	));

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/header.mod.php');

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/gh.mod.php');

?>

	<div class="p-page-box">

		<main class="p-top" data-init-event="initTop">
			<div class="p-hero">
				<div class="swiper-parent">
					<div class="swiper is--lazy-all">
						<div class="swiper-wrapper">
							<div class="swiper-slide"><picture><img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/hero_visual1.jpg', true); ?>" alt=""></picture></div>
							<div class="swiper-slide"><picture><img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/hero_visual2.jpg', true); ?>" alt=""></picture></div>
							<div class="swiper-slide"><picture><img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/hero_visual3.jpg', true); ?>" alt=""></picture></div>
							<div class="swiper-slide"><picture><img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/hero_visual4.jpg', true); ?>" alt=""></picture></div>
						</div>
					</div>
					<div class="swiper-pagination"></div>
				</div>

				<div class="p-hero__body">
					<h2 class="c-inset-mask">
						<img src="<?php echo KUME_Util::image_path('top/hero_maincopy_ja.svg', true); ?>" alt="「豊かさ」を拓く">
					</h2>
					<p>
						<span class="c-inset-mask"><img src="<?php echo KUME_Util::image_path('top/hero_subcopy1_ja.svg', true); ?>" alt="私たちは「豊かさ」とは何かを真剣に考える多様な個性の集合体です。"></span>
						<span class="c-inset-mask"><img src="<?php echo KUME_Util::image_path('top/hero_subcopy2_ja.svg', true); ?>" alt="地域・人を大切に、未来を見据えた新たな価値を創造していきます。"></span>
					</p>
				</div>

				<div class="p-hero__lead">
					<div class="p-hero__arrow c-circle-arrow c-circle-arrow--page">
						<span class="c-icon c-icon--arrow_d"></span>
					</div>
					<p lang="en"><b>RECRUIT NEWS</b></p>
				</div>
			</div>
			<?php

				function get_news_data ($_url) {
					$results = KUME_Util::get_json($_url);

					if (count($results) > 0) {
						$recruit_news = array();
						foreach ($results as $result) {
							if (array_key_exists('categoryID', $result) && array_key_exists(2, $result['categoryID']) && $result['categoryID'][2] === 3) {
								array_push($recruit_news, $result);

								if (count($recruit_news) === 5) {
									break;
								}
							}
						}

						/*
						$mypage_news = array();
						foreach ($results as $result) {
							if (array_key_exists('categoryID', $result) && array_key_exists(3, $result['categoryID']) && $result['categoryID'][3] === 4) {
								array_push($mypage_news, $result);

								if (count($mypage_news) === 2) {
									break;
								}
							}
						}
						*/
					}

					return array(
						'recruit' => $recruit_news,
						'mypage' => null
					);
				}

				function get_news_source ($_news) {
					$name = $_news['name'];
					$news_tag = '';

					preg_match('/((\s|　|ー)*(学生対象プログラム)(\s|　|ー)*)/', $name, $match);
					if ($match) {
						$name = str_replace($match[1], '', $name);
						$news_tag = $match[3];
					}

					//

					$url = "https://www.kumesekkei.co.jp{$_news['url']}";
					if (!empty($_news['topicsurl']) && !empty($_news['topicsurl'][0])) {
						$url = $_news['topicsurl'][0];
					}

					//

					$category_type = '';
					if (!empty($_news['rType']) && !empty($_news['rType'][0]) && $_news['rType'][0] === 1) {
						$category_type = 'new';
						$category_name = '新卒採用';
						$category_url = 'https://www.kumesekkei.co.jp/news/?category=recruit&rtype=new';
					}
					else if (!empty($_news['rType']) && !empty($_news['rType'][1]) && $_news['rType'][1] === 2) {
						$category_type = 'career';
						$category_name = 'キャリア採用';
						$category_url = 'https://www.kumesekkei.co.jp/news/?category=recruit&rtype=career';
					}

					ob_start();

					?>
					<li>
						<article class="p-news__item">
							<time datetime="<?php echo str_replace('.', '-', $_news['year']); ?>" lang="en"><span><?php echo $_news['year']; ?></span></time>
							<h4>
								<a href="<?php echo $url; ?>" target="_blank" rel="noopener"><span class="c-icon c-icon--external"></span><?php echo $name; ?></a>
								<?php if ($news_tag !== '') { echo "<span class=\"c-news-tag\">{$news_tag}</span>"; }?>
							</h4>
							<?php

								if ($category_type !== '') {
									?>
									<div class="p-news__item__category"><a href="<?php echo $category_url; ?>" target="_blank" rel="noopener" class="c-career-tag" data-category="<?php echo $category_type; ?>"><?php echo $category_name; ?></a></div>
									<?php
								}

							?>
						</article>
					</li>
					<?php

					$output = ob_get_contents();
					ob_end_clean();

					return $output;
				}

			?>
			<section class="p-news">
				<div class="l-wrapper">
					<div class="p-news__main l-container">
						<header>
							<h3>
								<span lang="ja">新着情報</span>
								<span lang="en">Recruit News</span>
							</h3>
						</header>

						<div class="p-news__list">
							<ul>
								<?php

									$results = get_news_data('https://www.kumesekkei.co.jp/news/news.json');
									// $results = get_news_data('https://www.kumesekkei.co.jp/news/news_recruit_sample.json');

									foreach ($results['recruit'] as $news) {
										echo get_news_source($news);
									}

									/*
									foreach ($results['mypage'] as $news) {
										echo get_news_source($news);
									}
									*/

									unset($results);

								?>
							</ul>
						</div>
					</div>

					<div class="p-news__sub">
						<p><a class="c-button c-button--rect c-link-external is--darkgray" href="https://www.kumesekkei.co.jp/news/?category=recruit" target="_blank" rel="noopener"><span class="c-icon c-icon--external"></span><span>一覧へ</span></a></p>
					</div>

					<footer class="p-lead l-container">
						<div class="p-lead__container">
							<h5>募集職種 / 募集概要 / 採用プロセス</h5>
							<ul>
								<li class="p-lead__item is--new">
									<a href="https://www.kumesekkei.co.jp/recruit/entry_newgraduate.html" target="_blank" rel="noopener">
										<div>
											<h6>
												<span lang="en">New Graduate</span>
												<span lang="ja">新卒採用</span>
												<span class="c-circle-arrow c-circle-arrow--new"><span class="c-icon c-icon--arrow_r"></span></span>
											</h6>
											<p class="p-lead__item__process">募集職種 / 募集概要 / 採用プロセス</p>
										</div>
									</a>
								</li>
								<li class="p-lead__item is--career">
									<a href="https://www.kumesekkei.co.jp/recruit/entry_career.html" target="_blank" rel="noopener">
										<div>
											<h6>
												<span lang="en">Career</span>
												<span lang="ja">キャリア採用</span>
												<span class="c-circle-arrow c-circle-arrow--career"><span class="c-icon c-icon--arrow_r"></span></span>
											</h6>
											<p class="p-lead__item__process">募集職種 / 募集概要 / 採用プロセス</p>
										</div>
									</a>
								</li>
							</ul>
						</div>
					</footer>
				</div>
			</section>

			<section class="p-about">
				<div class="l-wrapper">
					<div class="p-about__container l-container">
						<header class="c-header-set">
							<div class="c-inview-border"></div>

							<div class="c-header-set__title">
								<h2>
									<span lang="ja">会社を知る</span>
									<span lang="en">About KUME SEKKEI</span>
								</h2>
							</div>

							<div class="c-header-set__nav">
								<ul>
									<li>メッセージ</li>
									<li>社会課題への取組み</li>
									<li>数字で見る久米設計</li>
								</ul>
							</div>
						</header>

						<ul class="p-about__list">
							<li class="p-about__item p-about__message">
								<div class="p-about__item__main">
									<h3>
										<a class="c-list-link" href="/about/">
											<span class="c-animate-underline" lang="ja">メッセージ</span>
											<span lang="en">Top Message</span>
											<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
											<picture class="c-circle-picture">
												<div class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/about_message.jpg', true); ?>" alt="">
												</div>
											</picture>
										</a>
									</h3>
								</div>
								<div class="p-about__item__sub"></div>
							</li>

							<li class="p-about__item p-about__csr">
								<div class="p-about__item__main">
									<h3>
										<a class="c-list-link" href="/about/csr/">
											<span class="c-animate-underline" lang="ja">社会課題への取組み</span>
											<span lang="en">Corporate Social Resposibility</span>
											<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
										</a>
									</h3>
									<div class="p-about__csr__tags">
										<a href="/about/csr/#kodomo">#こども未来</a><!--
										--><a href="/about/csr/#carbon">#カーボンニュートラル</a><br><!--
										--><a href="/about/csr/#diversity">#ダイバーシティ＆インクルージョン</a><!--
										--><a href="/about/csr/#community">#地域づくり</a><br><!--
										--><a href="/about/csr/#study">#これからの学び</a><!--
										--><a href="/about/csr/#workstyle">#ワークスタイル</a><br><!--
										--><a href="/about/csr/#safety">#安全・安心</a><!--
										--><a href="/about/csr/#stock">#ストック活用</a>
									</div>
								</div>
								<div class="p-about__item__sub">
									<div class="swiper-parent is--upper">
										<div class="swiper is-lazy">
											<div class="swiper-wrapper">
												<div class="swiper-slide">
													<picture><img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/about_csr1_1.jpg', true); ?>" alt=""></picture>
												</div>
												<div class="swiper-slide">
													<picture><img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/about_csr2_1.jpg', true); ?>" alt=""></picture>
												</div>
												<div class="swiper-slide">
													<picture><img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/about_csr3_1.jpg', true); ?>" alt=""></picture>
												</div>
											</div>
										</div>
										<div class="swiper-pagination"></div>
									</div>
									<div class="swiper-parent is--lower">
										<div class="swiper is-lazy">
											<div class="swiper-wrapper">
												<div class="swiper-slide">
													<picture><img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/about_csr1_2.jpg', true); ?>" alt=""></picture>
												</div>
												<div class="swiper-slide">
													<picture><img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/about_csr2_2.jpg', true); ?>" alt=""></picture>
												</div>
												<div class="swiper-slide">
													<picture><img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/about_csr3_2.jpg', true); ?>" alt=""></picture>
												</div>
											</div>
										</div>
									</div>
								</div>
							</li>

							<li class="p-about__item p-about__stats">
								<div class="p-about__item__main">
									<h3>
										<a class="c-list-link" href="/about/stats/">
											<span class="c-animate-underline" lang="ja">数字で見る久米設計</span>
											<span lang="en">Statistics &amp; Facts</span>
											<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
										</a>
									</h3>
								</div>

								<?php

									$_GET['path'] = '/about/stats/';
									$_GET['is_top'] = '1';
									include($_SERVER['DOCUMENT_ROOT'] . '/modules/figs.mod.php');

								?>
							</li>
						</ul>
					</div>
				</div>
			</section>

			<section class="p-work">
				<div class="l-wrapper">
					<div class="p-work__container l-container">
						<div class="p-work__main">
							<header class="c-header-set">
								<div class="c-inview-border"></div>

								<div class="c-header-set__title">
									<h2>
										<span lang="ja">働く環境</span>
										<span lang="en">Work @ Kume Sekkei</span>
									</h2>
								</div>

								<div class="c-header-set__nav">
									<ul>
										<li>ワークプレイス</li>
										<li>福利厚生</li>
										<li>人材育成プログラム</li>
									</ul>
								</div>

								<figure class="p-work__illustration">
									<div class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('top/work_visual.jpg'); ?>>
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/work_visual.jpg', true); ?>" alt="">
									</div>
								</figure>

								<p class="c-header-set__description">久米設計本社ビルは、久米設計社員により設計された自社ビルです。本社ビルは運河沿いに立地しており、東京でありながら風や緑が感じられる環境で業務に取組んでいます。社内には様々な設備や環境が整っています。</p>
							</header>

							<ul class="p-work__list">
								<li class="is--workplace">
									<a class="c-list-link" href="/work/">
										<span class="c-animate-underline" lang="ja">ワークプレイス</span>
										<span lang="en">Workplace</span>
										<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
									</a>
								</li>
								<li class="is--welfare">
									<a class="c-list-link" href="/work/welfare/">
										<span class="c-animate-underline" lang="ja">福利厚生</span>
										<span lang="en">Welfare</span>
										<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
										<picture class="c-circle-picture">
											<div class="c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/work_welfare_thumb.jpg', true); ?>" alt="">
											</div>
										</picture>
									</a>
								</li>
								<li class="is--hrd">
									<a class="c-list-link" href="/work/hrd/">
										<span class="c-animate-underline" lang="ja">人材育成プログラム</span>
										<span lang="en">Human Resource Development</span>
										<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
										<picture class="c-circle-picture">
											<div class="c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('top/work_hrd_thumb.jpg', true); ?>" alt="">
											</div>
										</picture>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>

			<section class="p-people" data-theme="light">
				<div class="l-wrapper">
					<div class="p-people__container l-container">
						<header class="c-header-set">
							<div class="c-inview-border"></div>

							<div class="c-header-set__title">
								<h2>
									<span lang="ja">人を知る</span>
									<span lang="en">People</span>
								</h2>
								<a class="c-arrow-link" href="/people/">
									<span>一覧へ</span>
									<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
								</a>
							</div>

							<div class="c-header-set__nav">
								<ul>
									<li>社員紹介</li>
									<li>クロストーク</li>
									<li>動画</li>
								</ul>
							</div>
						</header>

						<div class="p-people__main">
							<section class="p-people__employee">
								<header>
									<h3>
										<span lang="ja">社員紹介</span>
										<span lang="en">Employees Introduction</span>
									</h3>
									<a class="c-arrow-link" href="/people/#employees">
										<span>一覧へ</span>
										<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
									</a>
								</header>

								<div class="p-people__employee__main c-pane-scroller">
									<div class="c-pane-scroller__container">
										<article class="p-people__employee__article">
											<a class="is--new" href="/people/employees/miura/" rel="bookmark">
												<picture class="c-circle-picture">
													<div class="c-lazy-trigger">
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/miura_thumb.jpg', true); ?>" alt="">
													</div>
												</picture>
												<header>
													<h4>三浦 淑美</h4>
													<p>意匠設計</p>
												</header>
												<p class="p-people__employee__article__description">子育てをする中でより強くなった、子どもが主役となる学校をつくりたいという想い。</p>
												<footer>
													<span class="c-career-tag" data-category="new">新卒採用</span>
												</footer>
											</a>
										</article>

										<article class="p-people__employee__article">
											<a class="is--new" href="/people/employees/mizutani/" rel="bookmark">
												<picture class="c-circle-picture">
													<div class="c-lazy-trigger">
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/employees/mizutani_thumb.jpg', true); ?>" alt="">
													</div>
												</picture>
												<header>
													<h4>水谷 絢子</h4>
													<p>意匠設計</p>
												</header>
												<p class="p-people__employee__article__description">たくさんの人との協働を楽しみながら社会の役に立つような設計を行いたい。</p>
												<footer>
													<span class="c-career-tag" data-category="new">新卒採用</span>
												</footer>
											</a>
										</article>
									</div>
								</div>
							</section>

							<section class="p-people__crosstalk">
								<header>
									<h3>
										<span lang="ja">クロストーク</span>
										<span lang="en">Crosstalk</span>
									</h3>
									<a class="c-arrow-link" href="/people/#crosstalk">
										<span>一覧へ</span>
										<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
									</a>
								</header>
								<div class="p-people__crosstalk__main">
									<div class="swiper-parent">
										<div class="swiper is-lazy">
											<div class="swiper-wrapper">
												<div class="swiper-slide">
													<a href="/people/crosstalk/bim/">
														<div class="p-people__crosstalk__title">
															<h4>BIM座談会</h4>
														</div>
														<picture class="c-lazy-trigger">
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk_thumb_bim.jpg', true); ?>" alt="">
														</picture>
														<div class="p-people__crosstalk__description">
															<p>BIMを取り入れた設計ワークフローの構築とは？</p>
														</div>
													</a>
												</div>
												<div class="swiper-slide">
													<a href="/people/crosstalk/milano/">
														<div class="p-people__crosstalk__title">
															<h4>新宿TOKYU MILANO再開発プロジェクトチーム</h4>
														</div>
														<picture class="c-lazy-trigger">
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/crosstalk_thumb_milano.jpg', true); ?>" alt="">
														</picture>
														<div class="p-people__crosstalk__description">
															<p>都市と建築のチャレンジ</p>
														</div>
													</a>
												</div>
											</div>
										</div>
										<div class="swiper-pagination"></div>
									</div>
								</div>
							</section>

							<section class="p-people__interview">
								<header>
									<h3>
										<span lang="ja">インタビュー動画</span>
										<span lang="en">Interview Movie</span>
									</h3>
								</header>

								<div class="p-people__interview__main c-pane-scroller">
									<div class="c-pane-scroller__container">
										<article class="p-people__interview__article">
											<a class="c-movie-thumb" href="javascript:void(0);" data-video-id="xV3KkfYQomI" data-video-start="472">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/interview_thumb1.jpg', true); ?>" alt="">
												</picture>
												<div>
													<div class="c-movie-thumb__button"><span class="c-icon c-icon--play"></span></div>
													<p lang="en">10:32</p>
												</div>
											</a>
											<header>
												<h4>電気設備について聞いてみた</h4>
											</header>
											<p>技術的な電気設備の設計を、デザイン性高く建築に融合させる、若手電気設備設計者の健闘を公開しています。</p>
										</article>

										<article class="p-people__interview__article">
											<a class="c-movie-thumb" href="javascript:void(0);" data-video-id="NPLFk1un62c" data-video-start="340">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/interview_thumb2.jpg', true); ?>" alt="">
												</picture>
												<div>
													<div class="c-movie-thumb__button"><span class="c-icon c-icon--play"></span></div>
													<p lang="en">7:41</p>
												</div>
											</a>
											<header>
												<h4>監理とはどんな仕事ですか？</h4>
											</header>
											<p>久米設計で働く若手社員のインタビュー動画。建築の最終防衛線として第一線で働く社員のリアルな声を公開しています。</p>
										</article>

										<article class="p-people__interview__article">
											<a class="c-movie-thumb" href="javascript:void(0);" data-video-id="psmwLZXixNA" data-video-start="78">
												<picture class="c-lazy-trigger">
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('people/interview_thumb3.jpg', true); ?>" alt="">
												</picture>
												<div>
													<div class="c-movie-thumb__button"><span class="c-icon c-icon--play"></span></div>
													<p lang="en">13:16</p>
												</div>
											</a>
											<header>
												<h4>先輩社員にリレーインタビュー</h4>
											</header>
											<p>話しかけやすい先輩にアポをとって、久米設計がどんなところか、聞いてみました。回答者が次の人を呼んでくるのがルールです。</p>
										</article>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</section>

			<?php

				$stories = KUME_Util::get_json('https://www.kumesekkei.co.jp/designstory/for_recruit_top.json', 5);

			?>
			<section class="p-story">
				<div class="l-wrapper">
					<div class="p-story__container l-container">
						<header class="c-header-set">
							<div class="c-inview-border"></div>

							<div class="c-header-set__title">
								<h2>
									<span lang="ja">デザインストーリー</span>
									<span lang="en">Design Story</span>
								</h2>
							</div>

							<div class="c-header-set__nav">
								<ul>
									<li><a class="c-link-external" href="https://www.kumesekkei.co.jp/designstory/" target="_blank" rel="noopener"><span class="c-icon c-icon--external"></span><span>一覧へ</span></a></li>
								</ul>
							</div>

							<p class="c-header-set__description">それぞれのプロジェクトには、関わった方々の強い想いとデザインで紡いだストーリーがあります。</p>
						</header>

						<div class="p-story__slides">
							<div class="swiper">
								<div class="swiper-wrapper">
									<?php

										if (count($stories) > 0) {
											foreach ($stories as $story) {
												?>
												<div class="swiper-slide"><picture><img class="c-lazy is--cover" data-src="<?php echo $story['image']; ?>" alt=""></picture></div>
												<?php
											}
										}

									?>
								</div>
							</div>
						</div>

						<div class="p-story__main c-pane-scroller">
							<div class="c-pane-scroller__container">
								<?php

									if (count($stories) > 0) {
										foreach ($stories as $story) {
											?>
											<article>
												<a href="<?php echo $story['url']; ?>" target="_blank" rel="bookmark noopener">
													<h3><?php echo $story['catch']; ?><span class="c-icon c-icon--external"></span></h3>
													<p><?php echo $story['text']; ?></p>
													<figure>
														<div class="c-lazy-trigger"><img class="c-lazy is--cover" data-src="<?php echo $story['image']; ?>" alt=""></div>
														<figcaption><?php echo $story['title']; ?></figcaption>
													</figure>
												</a>
											</article>
											<?php
										}
									}

								?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php

				unset($stories);

			?>

			<?php

				$projects = KUME_Util::get_json('https://www.kumesekkei.co.jp/project/for_recruit.json', 6);
				$project_count = count($projects);

			?>
			<style>
				@media only screen and (min-device-width: 320px) and (max-width: 767px) {
					#projectScrollerContainer {
						width: <?php echo "calc(11.25rem * {$project_count} + 1.25rem * ({$project_count} + 1))"; ?>;
					}
				}
			</style>
			<section class="p-project">
				<div class="l-wrapper">
					<div class="p-project__container l-container">
						<header class="c-header-set">
							<div class="c-inview-border"></div>

							<div class="c-header-set__title">
								<h2>
									<span lang="ja">プロジェクト紹介</span>
									<span class="no--mask" lang="en">Project</span>
								</h2>
							</div>

							<div class="c-header-set__nav">
								<ul>
									<li><a class="c-link-external" href="https://www.kumesekkei.co.jp/project/" target="_blank" rel="noopener"><span class="c-icon c-icon--external"></span><span>一覧へ</span></a></li>
								</ul>
							</div>

							<p class="c-header-set__description">都市開発からホテルや文化施設、大学施設まで、久米設計のプロジェクトは多岐に渡ります。また日本国内に留まらず、中国やベトナムなど、海外プロジェクトにも広く携わっております。</p>
						</header>
						<div class="c-pane-scroller">
							<ul id="projectScrollerContainer" class="p-project__list c-pane-scroller__container">
								<?php

									if (count($projects) > 0) {
										foreach ($projects as $project_key => $project) {
											?>
											<li class="p-project__item">
												<a class="<?php if ($project_key === 0) { echo 'is--active'; } ?>" href="<?php echo $project['url']; ?>" target="_blank" rel="noopener">
													<div class="p-project__item__wrapper">
														<div class="p-project__item__container">
															<picture class="c-lazy-trigger"><img class="c-lazy is--cover" data-src="<?php echo $project['image']; ?>" alt=""></picture>
															<div class="p-project__item__body">
																<div class="p-project__item__body__container">
																	<h3><?php echo $project['name']; ?></h3>
																	<div><span class="c-icon c-icon--external"></span><?php

																		$chars = mb_str_split($project['catch']);

																		$str_counts = 0;
																		$line_counts = 1;
																		$output = '';

																		foreach ($chars as $char) {
																			$output .= $char;

																			$str_counts = $str_counts + mb_strwidth($char);
																			if ($str_counts > 40) {

																				$line_counts++;

																				$str_counts = 0;
																			}
																		}

																		?>
																		<p class="is--text" data-lines="<?php echo $line_counts; ?>"><?php echo $output; ?></p>
																		<?php

																		unset($chars, $str_counts, $line_counts, $output);

																	?></div>
																</div>
															</div>
														</div>
													</div>
												</a>
											</li>
											<?php
										}
									}

								?>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<?php

				unset($projects);

			?>
		</main>

		<?php

			$_GET['is_include_lead'] = '0';
			include($_SERVER['DOCUMENT_ROOT'] . '/modules/ui.mod.php');

		?>

	</div>

<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/gf.mod.php');

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/footer.mod.php');

?>
