<footer id="gf" class="p-gf">
	<div class="p-sh">
		<div class="l-wrapper">
			<div class="p-sh__container l-container">
				<div class="p-site-title">
					<p class="is--body"><span>久米設計</span><span>採用サイト</span></p>
				</div>

				<div class="p-sh__logoset">
					<a href="/">
						<span class="p-sh__logo"><span class="c-icon">KUME SEKKEI</span></span>
						<span class="p-sh__logoset__text" lang="en">RECRUIT</span>
					</a>
				</div>

				<div class="p-sh__buttons">
					<nav class="p-sh__nav">
						<ul>
							<li>
								<a class="is--new" href="https://www.kumesekkei.co.jp/recruit/entry_newgraduate.html" target="_blank" rel="noopener">
									<span lang="en">New Graduate</span>
									<span lang="ja">新卒採用</span>
									<p>募集職種 / 募集概要 / 採用プロセス</p>
								</a>
							</li>
							<li>
								<a class="is--career" href="https://www.kumesekkei.co.jp/recruit/entry_career.html" target="_blank" rel="noopener">
									<span lang="en">Career</span>
									<span lang="ja">キャリア採用</span>
									<p>募集職種 / 募集概要 / 採用プロセス</p>
								</a>
							</li>
						</ul>
					</nav>

					<div class="p-sh__menu"></div>
				</div>
			</div>
		</div>
	</div>

	<?php

		$_GET['is_footer'] = '1';
		include($_SERVER['DOCUMENT_ROOT'] . '/modules/gm.mod.php');

	?>
</footer>
