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
			'title' => '働く環境',
			'url' => null
		),
		array(
			'title' => 'ワークプレイス',
			'url' => '/work/'
		)
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

	$_GET['gm_active'] = 'work';
	$_GET['gm_sub_active'] = 'work_workplace';


	/** =================================================================
	 * ページナビゲーション
	 * --------------------------------------------------------------- */

	ob_start();

	?>
	<nav class="c-page-nav">
		<ul>
			<li><a class="c-button c-button--round is--gray is--active" href="/work/"><span>ワークプレイス</span></a></li>
			<li><a class="c-button c-button--round is--gray" href="/work/welfare/"><span>福利厚生</span></a></li>
			<li><a class="c-button c-button--round is--gray" href="/work/hrd/"><span>人材育成プログラム</span></a></li>
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

		<main class="p-work is--index" data-init-event="initWork">
			<header class="c-page-header">
				<div class="l-wrapper">
					<div class="l-container--narrow">
						<div class="c-page-header__main">
							<h1 class="is--title">
								<span lang="en">Work @ KUME SEKKEI</span>
								<span lang="ja">働く環境</span>
							</h1>
						</div>
						<div class="c-page-header__sub">
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
			</header>

			<article class="p-work__workplace">
				<header class="p-work__workplace__header">
					<div class="l-wrapper">
						<div class="l-container--narrow">

							<div class="c-article-header">
								<h2 class="c-article-header__title">
									<span lang="en">Workplace</span>
									<span lang="ja">ワークプレイス</span>
								</h2>
							</div>

						</div>
					</div>
				</header>

				<div class="p-work__workplace__sections">
					<section id="head" class="p-work__workplace__sec">
						<div class="l-wrapper">
							<div class="l-container">
								<header class="p-work__workplace__sec__header">
									<h3>
										<span lang="ja">久米設計本社ビル</span>
										<span lang="en">Head office building</span>
									</h3>
									<div>
										<p>久米設計本社ビルは、久米設計社員により設計された自社ビルです。本社ビルは運河沿いに立地しており、東京でありながら風や緑が感じられる環境で業務に取り組んでいます。社内には様々な設備や環境が整っています。</p>
									</div>
								</header>

								<div class="p-work__workplace__map">
									<nav>
										<ul>
											<li>
												<a href="#atrium" data-modal="headModal">
													<span lang="en">Atrium</span>
													<span class="c-animate-underline" lang="ja">アトリウム</span>
												</a>
											</li>
											<li>
												<a href="#k-lounge" data-modal="headModal">
													<span lang="en">Lounge &amp; Event Space</span>
													<span class="c-animate-underline" lang="ja">K-Lounge</span>
												</a>
											</li>
											<li>
												<a href="#buffet" data-modal="headModal">
													<span lang="en">Buffet</span>
													<span class="c-animate-underline" lang="ja">食堂</span>
												</a>
											</li>
											<li>
												<a href="#healthcareroom" data-modal="headModal">
													<span lang="en">Healthcare Room</span>
													<span class="c-animate-underline" lang="ja">保健室</span>
												</a>
											</li>
											<li>
												<a href="#terrace" data-modal="headModal">
													<span lang="en">Terrace</span>
													<span class="c-animate-underline" lang="ja">テラス</span>
												</a>
											</li>
											<li>
												<a href="#library" data-modal="headModal">
													<span lang="en">Library</span>
													<span class="c-animate-underline" lang="ja">図書室</span>
												</a>
											</li>
										</ul>
									</nav>

									<figure>
										<div>
											<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/head_illustration.png'); ?>>
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_illustration.png', true); ?>" alt="">
											</picture>
										</div>
									</figure>
								</div>

								<div class="p-work__workplace__links">
									<ul>
										<li>
											<a class="p-work__workplace__link" href="#atrium" data-modal="headModal">
												<p class="p-work__workplace__link__index" lang="en"><b></b>　Atrium</p>
												<h4>
													<span class="c-animate-underline">アトリウム</span>
													<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
												</h4>
												<div>
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/head_atrium_thumb.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_atrium_thumb.jpg', true); ?>" alt="">
													</picture>
												</div>
												<p class="p-work__workplace__link__description">東京でありながら風や緑が感じられる環境で業務に取組んでいます。</p>
											</a>
										</li>

										<li>
											<a class="p-work__workplace__link" href="#k-lounge" data-modal="headModal">
												<p class="p-work__workplace__link__index" lang="en"><b></b>　Lounge &amp; Event Space</p>
												<h4>
													<span class="c-animate-underline">K-Lounge</span>
													<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
												</h4>
												<div>
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/head_k-lounge_thumb.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_k-lounge_thumb.jpg', true); ?>" alt="">
													</picture>
												</div>
												<p class="p-work__workplace__link__description">社員同士の繋がりを生む、コミュニケーションの中心となる場所です。</p>
											</a>
										</li>

										<li>
											<a class="p-work__workplace__link" href="#buffet" data-modal="headModal">
												<p class="p-work__workplace__link__index" lang="en"><b></b>　Buffet</p>
												<h4>
													<span class="c-animate-underline">食堂</span>
													<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
												</h4>
												<div>
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/head_buffet_thumb.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_buffet_thumb.jpg', true); ?>" alt="">
													</picture>
												</div>
											</a>
										</li>

										<li>
											<a class="p-work__workplace__link" href="#healthcareroom" data-modal="headModal">
												<p class="p-work__workplace__link__index" lang="en"><b></b>　Healthcare Room</p>
												<h4>
													<span class="c-animate-underline">保健室</span>
													<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
												</h4>
												<div>
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/head_healthcareroom_thumb.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_healthcareroom_thumb.jpg', true); ?>" alt="">
													</picture>
												</div>
											</a>
										</li>

										<li>
											<a class="p-work__workplace__link" href="#terrace" data-modal="headModal">
												<p class="p-work__workplace__link__index" lang="en"><b></b>　Terrace</p>
												<h4>
													<span class="c-animate-underline">テラス</span>
													<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
												</h4>
												<div>
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/head_terrace_thumb.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_terrace_thumb.jpg', true); ?>" alt="">
													</picture>
												</div>
											</a>
										</li>

										<li>
											<a class="p-work__workplace__link" href="#library" data-modal="headModal">
												<p class="p-work__workplace__link__index" lang="en"><b></b>　Library</p>
												<h4>
													<span class="c-animate-underline">図書室</span>
													<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
												</h4>
												<div>
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/head_library_thumb.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_library_thumb.jpg', true); ?>" alt="">
													</picture>
												</div>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<aside id="headModal" class="p-workplace-modal">
							<div class="p-workplace-modal__veil"></div>
							<div class="p-workplace-modal__wrapper">
								<div class="p-workplace-modal__container">

									<p class="p-workplace-modal__sign" lang="en">Work @ KUME SEKKEI</p>

									<div class="swiper">
										<header>
											<div>
												<h3 lang="en">Head Office Building</h3>
												<div class="c-circle-arrow c-circle-arrow--border is--prev"><span class="c-icon c-icon--arrow_r"></span></div>
												<div class="c-circle-arrow c-circle-arrow--border is--next"><span class="c-icon c-icon--arrow_r"></span></div>
											</div>
										</header>
										<div class="swiper-wrapper">
											<section class="swiper-slide" data-hash="atrium">
												<div class="swiper-slide__wrapper">
													<header>
														<h4><span>アトリウム</span></h4>
														<p><span lang="en">Atrium 01 - 06</span></p>
													</header>

													<div class="swiper-slide__body">
														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_atrium_pic1.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_atrium_pic1.jpg', true); ?>" alt="">
														</picture>

														<p>緑と光がとても気持ちのよい空間です。上から見下ろしているだけでも気分転換になります。どこに居てもアトリウム越しに今日は誰が居るか、何をしているかが何となく伝わってきて、あとで声を掛けに行ってみようとコミュニケーションのきっかけにもなります。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_atrium_pic2.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_atrium_pic2.jpg', true); ?>" alt="">
														</picture>
													</div>
												</div>
											</section>

											<section class="swiper-slide" data-hash="k-lounge">
												<div class="swiper-slide__wrapper">
													<header>
														<h4><span>K-Lounge</span></h4>
														<p><span lang="en">Lounge &amp; Event Space 02 - 06</span></p>
													</header>

													<div class="swiper-slide__body">
														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_k-lounge_pic1.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_k-lounge_pic1.jpg', true); ?>" alt="">
														</picture>

														<p>働き方と働く場のアップデートの第1弾としてつくったのが「つながる場」としてのK-Loungeです。KUMEの頭文字Kから名付けています。コロナ禍の経験から、つながること・集まることの大切さを形にしています。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_k-lounge_pic2.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_k-lounge_pic2.jpg', true); ?>" alt="">
														</picture>

														<p>このラウンジでは多様なイベントが開催されています。どんなイベントでも「飛び入り参加OK」というルールでつながりを拡げています。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_k-lounge_pic3.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_k-lounge_pic3.jpg', true); ?>" alt="">
														</picture>
													</div>
												</div>
											</section>

											<section class="swiper-slide" data-hash="buffet">
												<div class="swiper-slide__wrapper">
													<header>
														<h4><span>食堂</span></h4>
														<p><span lang="en">Buffet 03 - 06</span></p>
													</header>

													<div class="swiper-slide__body">
														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_buffet_pic1.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_buffet_pic1.jpg', true); ?>" alt="">
														</picture>

														<p>組織設計事務所の中ではここまで充実した社食機能はないと思います。自慢のカフェテリアです。外部に開けた開放的な空間は、日常の社員同士のコミュニケーションの場としてとても重要だと思います。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_buffet_pic2.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_buffet_pic2.jpg', true); ?>" alt="">
														</picture>

														<p>メニューも豊富でビュッフェコーナーもあり、毎日飽きることなく楽しくランチタイムを過ごしています。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_buffet_pic3.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_buffet_pic3.jpg', true); ?>" alt="">
														</picture>
													</div>
												</div>
											</section>

											<section class="swiper-slide" data-hash="healthcareroom">
												<div class="swiper-slide__wrapper">
													<header>
														<h4><span>保健室</span></h4>
														<p><span lang="en">Healthcare Room 04 - 06</span></p>
													</header>

													<div class="swiper-slide__body">
														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_healthcareroom_pic1.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_healthcareroom_pic1.jpg', true); ?>" alt="">
														</picture>

														<p>社員の健康と安全を考え保健室を設置し、日常的な健康相談の他、心身共にサポートできるよう保健師が常駐しています。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_healthcareroom_pic2.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_healthcareroom_pic2.jpg', true); ?>" alt="">
														</picture>
													</div>
												</div>
											</section>

											<section class="swiper-slide" data-hash="terrace">
												<div class="swiper-slide__wrapper">
													<header>
														<h4><span>テラス</span></h4>
														<p><span lang="en">Terrace 05 - 06</span></p>
													</header>

													<div class="swiper-slide__body">
														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_terrace_pic1.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_terrace_pic1.jpg', true); ?>" alt="">
														</picture>

														<p>運河に面したテラスは、談話や休憩のスペースとして、また社内イベント時にはBBQの会場等、社員のコミュニケーションを誘発する場となっています。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_terrace_pic2.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_terrace_pic2.jpg', true); ?>" alt="">
														</picture>
													</div>
												</div>
											</section>

											<section class="swiper-slide" data-hash="library">
												<div class="swiper-slide__wrapper">
													<header>
														<h4><span>図書室</span></h4>
														<p><span lang="en">Library 06 - 06</span></p>
													</header>

													<div class="swiper-slide__body">
														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_library_pic1.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_library_pic1.jpg', true); ?>" alt="">
														</picture>

														<p>国内外の書籍・雑誌を自由に閲覧できる図書室は社員の感性を刺激する場として活用されています。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/head_library_pic2.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/head_library_pic2.jpg', true); ?>" alt="">
														</picture>
													</div>
												</div>
											</section>
										</div>
									</div>

								</div>
							</div>
						</aside>
					</section>

					<section id="branch" class="p-work__workplace__sec">
						<div class="l-wrapper">
							<div class="l-container">
								<header class="p-work__workplace__sec__header">
									<h3>
										<span lang="ja">支社・海外オフィス</span>
										<span lang="en">Branch / Overseas Office</span>
									</h3>
									<div>
										<p>久米設計は東京を本社とし、全国に支社や事務所を設けています。国内にとどまらず、海外にも活動の場を展開しています。</p>
									</div>
								</header>

								<div class="p-work__workplace__links">
									<ul>
										<li>
											<a class="p-work__workplace__link" href="#osaka" data-modal="branchModal">
												<p class="p-work__workplace__link__index" lang="en">Osaka Branch</p>
												<h4>
													<span class="c-animate-underline">大阪支社</span>
													<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
												</h4>
												<div>
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/osaka_thumb.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/osaka_thumb.jpg', true); ?>" alt="">
													</picture>
												</div>
											</a>
										</li>

										<li>
											<a class="p-work__workplace__link" href="#kyushu" data-modal="branchModal">
												<p class="p-work__workplace__link__index" lang="en">Kyushu Branch</p>
												<h4>
													<span class="c-animate-underline">九州支社</span>
													<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
												</h4>
												<div>
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/kyushu_thumb.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/kyushu_thumb.jpg', true); ?>" alt="">
													</picture>
												</div>
											</a>
										</li>

										<li>
											<a class="p-work__workplace__link" href="#kda" data-modal="branchModal">
												<p class="p-work__workplace__link__index" lang="en">Kume Design Asia</p>
												<h4>
													<span class="c-animate-underline">KDA</span>
													<div class="c-circle-arrow c-circle-arrow--border"><span class="c-icon c-icon--arrow_r"></span></div>
												</h4>
												<div>
													<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/kda_thumb.jpg'); ?>>
														<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/kda_thumb.jpg', true); ?>" alt="">
													</picture>
												</div>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<aside id="branchModal" class="p-workplace-modal">
							<div class="p-workplace-modal__veil"></div>
							<div class="p-workplace-modal__wrapper">
								<div class="p-workplace-modal__container">

									<p class="p-workplace-modal__sign" lang="en">Work @ KUME SEKKEI</p>

									<div class="swiper">
										<header>
											<div>
												<h3 lang="en">Branch / Overseas Office</h3>
												<div class="c-circle-arrow c-circle-arrow--border is--prev"><span class="c-icon c-icon--arrow_r"></span></div>
												<div class="c-circle-arrow c-circle-arrow--border is--next"><span class="c-icon c-icon--arrow_r"></span></div>
											</div>
										</header>
										<div class="swiper-wrapper">
											<section class="swiper-slide" data-hash="osaka">
												<div class="swiper-slide__wrapper">
													<header>
														<h4><span>大阪支社</span></h4>
														<p><span lang="en">OSAKA Branch 02 - 03</span></p>
													</header>

													<div class="swiper-slide__body">
														<picture <?php echo KUME_Util::get_image_aspect_style('work/osaka_pic1.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/osaka_pic1.jpg', true); ?>" alt="">
														</picture>

														<p>緑と光がとても気持ちのよい空間です。上から見下ろしているだけでも気分転換になります。どこに居てもアトリウム越しに今日は誰が居るか、何をしているかが何となく伝わってきて、あとで声を掛けに行ってみようとコミュニケーションのきっかけにもなります。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/osaka_pic2.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/osaka_pic2.jpg', true); ?>" alt="">
														</picture>

														<p>ウェルネススペース｜健康と快適さをテーマとした緑豊かな空間。ヨギボーやバランスボールなどが置かれた､社員のくつろぎを追求したスペースです。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/osaka_pic3.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/osaka_pic3.jpg', true); ?>" alt="">
														</picture>

														<p>ラウンジ｜眺望のよい縁側のようなラウンジ。開放感ある窓際の空間でカジュアルなミーティングやランチに人気のスポットです。</p>
													</div>
												</div>
											</section>

											<section class="swiper-slide" data-hash="kyushu">
												<div class="swiper-slide__wrapper">
													<header>
														<h4><span>九州支社</span></h4>
														<p><span lang="en">KYUSHU Branch 01 - 03</span></p>
													</header>

													<div class="swiper-slide__body">
														<picture <?php echo KUME_Util::get_image_aspect_style('work/kyushu_pic1.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/kyushu_pic1.jpg', true); ?>" alt="">
														</picture>

														<p>緑あふれるオフィス環境で、フリーアドレス制を採用しています。<br>
														コミュニケーションが自然と生まれ､専門分野の異なる社員同士がコラボレーションしながらプロジェクトを進めています。<br>
														リフレッシュを兼ねたカジュアルな打合せスペースもあり、支社内交流を大切にしながらフレキシブルに働くことのできるオフィスです。</p>
													</div>
												</div>
											</section>

											<section class="swiper-slide" data-hash="kda">
												<div class="swiper-slide__wrapper">
													<header>
														<h4><span>Kume Design Asia</span></h4>
														<p><span lang="en">KDA 03 - 03</span></p>
													</header>

													<div class="swiper-slide__body">
														<h5><span>Hanoi Head Office</span></h5>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/kda_pic1.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/kda_pic1.jpg', true); ?>" alt="">
														</picture>

														<p>OPEN COMMUNITY｜オープンコミュニティーは、チームで集まって共同作業ができる場所です。スタッフ同士でアイデアを共有できる環境を整え、コラボレーションすることを大切にしています。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/kda_pic2.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/kda_pic2.jpg', true); ?>" alt="">
														</picture>

														<p>（左）GALLERY CORNER｜ギャラリーコーナーは､スタッフがリラックスしたり、お茶を飲んだり、交流したりする､社員同士のコミュニケーションが生まれる場所です。（右）FLEXIBLE WORKING｜フレシキビリティーのある作業環境は、さまざまなチームがオフィス内を移動でき、アイディア・メモをとったり、ホワイトボードによるセッションでブレインストーミングをしたり、コーヒーを飲みながら話し合ったりできる環境です。</p>

														<h5><span>Ho Chi Minh Branch</span></h5>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/kda_pic3.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/kda_pic3.jpg', true); ?>" alt="">
														</picture>

														<p>久米設計のベトナム現地法人、久米デザインアジアのホーチミン事務所です。ホーチミン事務所は建築設計、ランドスケープ/マスタープランニング、インテリアデザイン、久米設計の設計支援を行う制作部門の４部構成となっています。ベトナム全土を中心に、カンボジア、タイのホテル、コンドミニアム、オフィスを中心とした設計業務に携わっています。また、社員の平均年齢が30歳の活気あるオフィスです。</p>

														<picture <?php echo KUME_Util::get_image_aspect_style('work/kda_pic4.jpg'); ?>>
															<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/kda_pic4.jpg', true); ?>" alt="">
														</picture>
													</div>
												</div>
											</section>
										</div>
									</div>

								</div>
							</div>
						</aside>
					</section>
				</div>
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
