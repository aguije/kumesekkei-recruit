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
			'title' => '会社を知る',
			'url' => null
		),
		array(
			'title' => 'メッセージ',
			'url' => '/about/'
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

	$_GET['gm_active'] = 'about';

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/header.mod.php');

?>
<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/modules/gh.mod.php');

?>

	<div class="p-page-box">

		<main class="p-about is--index">
			<header class="c-page-header">
				<div class="l-wrapper">
					<div class="c-page-header__container">
						<div class="c-page-header__main">
							<h1 class="c-article-header__title">
								<span lang="en">About KUME SEKKEI</span>
								<span lang="ja">会社を知る</span>
							</h1>
						</div>
						<div class="c-page-header__sub">
							<?php

								echo KUME_Util::get_snippet(array(
									'type' => 'line',
									'data' => $bc
								));

							?>
							<nav class="c-page-nav">
								<ul>
									<li><a class="c-button c-button--round is--gray is--active" href="/about/"><span>メッセージ</span></a></li>
									<li><a class="c-button c-button--round is--gray" href="/about/csr/"><span>社会課題への取組み</span></a></li>
									<li><a class="c-button c-button--round is--gray" href="/about/stats/"><span>数字で見る久米設計</span></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</header>

			<article class="p-about__message">
				<header class="p-about__message__header">
					<div class="l-wrapper">
						<div class="l-container--narrow">

							<div class="c-article-header">
								<h2 class="is--title">
									<span lang="en">Top Message</span>
									<span lang="ja">心地よいチームワークで、<br>
									プラス<i>α</i>の価値を生み出していく</span>
								</h2>
							</div>

						</div>
					</div>
				</header>

				<section class="p-about__message__sec1 p-about__message__sec">
					<div class="l-wrapper">
						<div class="l-container is--2col">
							<div>
								<figure>
									<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/message_pic1.jpg'); ?>>
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/message_pic1.jpg', true); ?>" alt="">
									</picture>
									<figcaption class="u-align--right"><small>代表取締役社長</small>　<b>藤澤 進</b></figcaption>
								</figure>
							</div>
							<div>
								<header>
									<h3>重ねてきた経験を誇りに、<br>
									誠実で上質な設計を目指して</h3>
								</header>

								<div class="p-about__message__sec__body">
									<p>久米設計は、90年という長い歴史を通じて、様々な建築や都市の設計を手掛けてきました。使いやすさや耐久性はもちろんのこと、経済的・構造的合理性も考慮し、技術とデザインの融合を追求した建築を世に送り出してきました。</p>
									<p>何十年先も見据え、使う人にとって機能的で親しみやすい設計を心掛けること、クライアントの期待を超えた価値を提案することが、私たちの存在意義です。従来の〝当たり前〟を時に疑問視し、空間のあり方や使い方を再考することも大切です。設計の中で新しい価値をどう生み出していくのか。そこが、この仕事のおもしろさでしょう。</p>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="p-about__message__sec2 p-about__message__sec">
					<div class="l-wrapper">
						<div class="l-container--narrow">
							<header>
								<h3>前のめりにチームワークで<br>
								意見を交わし合う</h3>
							</header>

							<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/message_pic2.jpg'); ?>>
								<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/message_pic2.jpg', true); ?>" alt="">
							</picture>

							<div class="p-about__message__sec__body">
								<p>設計は、一人で進めるものではありません。プロジェクトごとにチームを組み、アイデアを出し合いながら形にしていきます。それぞれのチームの個性を生かして任せるスタンスを大切にしています。設計にチームの個性が出てくるのは面白いものです。</p>
								<p>良いチームは、皆が前のめりになって新しいことやクライアントを驚かせる提案をしようとするムードが自然と生まれています。そのようなチームはクライアントも一緒になってわくわくしながら設計を進めています。</p>
								<p>久米設計は、昔からの自由な社風もあり、年代や部署に関わらず、社員同士が心地よい関係性を築いています。一人ひとりが、自分の中に閉じこもることなくオープンマインドでつながり、活発なコミュニケーションの中で良い設計をして欲しいと願っています。</p>
							</div>
						</div>
					</div>
				</section>

				<section class="p-about__message__sec3 p-about__message__sec">
					<div class="l-wrapper">
						<div class="l-container is--2col without--gap">
							<div>
								<header>
									<h3>過去を敬い、未来に思いを馳せ、<br>
									新たな挑戦を</h3>
								</header>

								<div class="p-about__message__sec__body">
									<p>2022年、ソーシャルデザイン室という新部署を設立しました。このメンバーは、設計者とは異なる視点でプロジェクトに参加し、未来のクリエイティブを育む種まきのような活動をしています。社内に多様な視点を混ぜていくことで、設計者の発想の幅も広がります。</p>
									<p>新たな試みの一方で、創設当初に建てられた住宅を改修する計画や、古い社宅を新たな賃貸物件に蘇らせる企画など、過去と向き合うようなプロジェクトも進行しています。</p>
									<p>建築物が人の気持ちに与える影響は少なくありません。ポジティブな気持ちがよりポジティブに、ネガティブな気持ちが少しでも和らいでポジティブになるように。そんな想いを設計に乗せ、建築・都市を通じて人々に豊かさを提供できる設計事務所でありたいと思っています。</p>
									<p>多様な視点や新鮮なアイデアを持ったあなたの力を、私たちは必要としています。私たちと共に、新しい建築の未来を築き上げてみませんか？</p>
									<p class="u-align--right"><small>代表取締役社長</small>　<b>藤澤 進</b></p>
								</div>
							</div>
							<div>
								<div class="p-about__message__sec3__picture">
									<picture class="c-lazy-trigger" <?php echo KUME_Util::get_image_aspect_style('about/message_pic3.jpg'); ?>>
										<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path('about/message_pic3.jpg', true); ?>" alt="">
									</picture>
								</div>
							</div>
						</div>
					</div>
				</section>
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
							<nav class="c-page-nav">
								<ul>
									<li><a class="c-button c-button--round is--gray is--active" href="/about/"><span>メッセージ</span></a></li>
									<li><a class="c-button c-button--round is--gray" href="/about/csr/"><span>社会課題への取組み</span></a></li>
									<li><a class="c-button c-button--round is--gray" href="/about/stats/"><span>数字で見る久米設計</span></a></li>
								</ul>
							</nav>
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
