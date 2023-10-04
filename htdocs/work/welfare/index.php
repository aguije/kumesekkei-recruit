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
			'url' => '/work/'
		),
		array(
			'title' => '福利厚生',
			'url' => '/work/welfare/'
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
	$_GET['gm_sub_active'] = 'work_welfare';


	/** =================================================================
	 * ページナビゲーション
	 * --------------------------------------------------------------- */

	ob_start();

	?>
	<nav class="c-page-nav">
		<ul>
			<li><a class="c-button c-button--round is--gray" href="/work/"><span>ワークプレイス</span></a></li>
			<li><a class="c-button c-button--round is--gray is--active" href="/work/welfare/"><span>福利厚生</span></a></li>
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

		<main class="p-work is--welfare" data-init-event="initWorkWelfare">
			<header class="c-page-header">
				<div class="l-wrapper">
					<div class="l-container--narrow">
						<div class="c-page-header__main">
							<h2 class="is--title">
								<span lang="en">Work @ KUME SEKKEI</span>
								<span lang="ja">働く環境</span>
							</h2>
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

			<article class="p-work__welfare">
				<header class="p-work__welfare__header">
					<div class="l-wrapper">
						<div class="l-container--narrow">

							<div class="c-article-header">
								<h1 class="c-article-header__title">
									<span lang="en">Welfare</span>
									<span lang="ja">福利厚生</span>
								</h1>
							</div>

						</div>
					</div>
				</header>

				<div class="p-work__welfare__sections">
					<section id="workstyle" class="p-work__welfare__sec">
						<div class="l-wrapper">
							<div class="l-container">
								<header>
									<h2>働き方</h2>
								</header>

								<dl>
									<div id="workstyleHoliday" class="p-work__welfare__item">
										<div>
											<dt>年間休日</dt>
											<dd>
												<p><span class="p-work__welfare__sec__strong"><b lang="en">125<br><small lang="en">days</small></b></span></p>
												<p>（2023年）</p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>在宅勤務制度</dt>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>時短勤務制度</dt>
											<dd>
												<p><span class="p-work__welfare__sec__strong"><b lang="en">6<small>年生</small></b></span></p>
												<p>（子が小学6年まで）</p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>特別休暇</dt>
											<dd>
												<p>慶弔、永年勤続休暇<br>
												転勤休暇、<span class="u-inline-block">生理日休暇（有給）</span><br>
												子の看護休暇（有給）<br>
												介護休暇（有給）</p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>水曜 <span lang="en">NO</span> 残業デー<br>
											日曜出勤禁止</dt>
										</div>
									</div>
									<div id="workstyleStar" class="p-work__welfare__item">
										<div>
											<dt>「えるぼし」認定</dt>
											<dd>
												<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('work/welfare/workstyle_pic1.png'); ?>>
													<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/welfare/workstyle_pic1.png', true); ?>" alt="女性が活躍しています！">
												</picture>
											</dd>
										</div>
									</div>
								</dl>
							</div>
						</div>
					</section>

					<section id="system" class="p-work__welfare__sec">
						<div class="l-wrapper">
							<div class="l-container">
								<header>
									<h2>制度</h2>
									<figure>
										<div>
											<picture class="c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/welfare/system_pic1.jpg', true); ?>" alt="">
											</picture>
										</div>
										<div>
											<picture class="c-lazy-trigger">
												<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('work/welfare/system_pic2.jpg', true); ?>" alt="">
											</picture>
										</div>
										<figcaption>
											本社社員食堂（上）<br>
											保健師相談の様子（下）
										</figcaption>
									</figure>
								</header>

								<dl>
									<div class="p-work__welfare__item">
										<div>
											<dt>賞与</dt>
											<dd>
												<p><span class="p-work__welfare__sec__strong">年<b lang="en">2</b>回</span></p>
												<p>（2022年度実績4か月）</p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>各種研修制度</dt>
											<dd>
												<p>スキルアップ研修<br>
												階層別研修 など</p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>退職金制度<br>
											企業型確定拠出年金</dt>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>社員食堂完備</dt>
											<dd>
												<p>本社</p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>昼食代補助</dt>
											<dd>
												<p>支社</p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>国内宿泊施設利用補助<br>
											健保福利厚生施設利用</dt>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>保健師常駐<br>
											産業医相談</dt>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>健康診断</dt>
											<dd>
												<p><span class="p-work__welfare__sec__strong">年<b lang="en">1</b>回</span></p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>各種保険制度</dt>
											<dd>
												<p>健康保険　厚生年金<br>
												雇用保険　労災保険</p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>永年勤続表彰</dt>
											<dd>
												<p>休暇+賞与</p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>共済会</dt>
											<dd>
												<p>各種慶弔金<br>
												貸付金<br>
												部活動補助 など</p>
											</dd>
										</div>
									</div>
									<div class="p-work__welfare__item">
										<div>
											<dt>職員組合</dt>
										</div>
									</div>
								</dl>
							</div>
						</div>
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
