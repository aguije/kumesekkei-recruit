<?php

	$active = (array_key_exists('gm_active', $_GET)) ? $_GET['gm_active'] : '';
	$sub_active = (array_key_exists('gm_sub_active', $_GET)) ? $_GET['gm_sub_active'] : '';

?>
<div class="p-gm">
	<div class="p-gm__container">
		<div class="l-wrapper">
			<div class="p-gm__main l-container">
				<div class="p-site-title">
					<p class="is--body"><span>久米設計</span><span>採用サイト</span></p>
				</div>

				<ul class="p-gm__list is--main">
					<li>
						<h4>
							<a href="https://www.kumesekkei.co.jp/news/?category=recruit" target="_blank" rel="noopener">
								<span lang="en">Recruit News</span>
								<span lang="ja">新着情報</span>
							</a>
						</h4>
					</li>
					<li class="<?php if ($active === 'about') { echo 'is--active'; } ?>">
						<h4>
							<a href="/about/">
								<span lang="en">About KUME SEKKEI</span>
								<span lang="ja">会社を知る</span>
							</a>
						</h4>
						<ul class="p-gm__list is--sub">
							<li><a class="<?php if ($sub_active === 'about_message') { echo 'is--active'; } ?>" href="/about/">メッセージ</a></li>
							<li><a class="<?php if ($sub_active === 'about_csr') { echo 'is--active'; } ?>" href="/about/csr/">社会課題への取組み</a></li>
							<li><a class="<?php if ($sub_active === 'about_stats') { echo 'is--active'; } ?>" href="/about/stats/">数字で見る久米設計</a></li>
						</ul>
					</li>
					<li class="<?php if ($active === 'work') { echo 'is--active'; } ?>">
						<h4>
							<a href="/work/">
								<span lang="en">Work at KUME SEKKEI</span>
								<span lang="ja">働く環境</span>
							</a>
						</h4>
						<ul class="p-gm__list is--sub">
							<li><a class="<?php if ($sub_active === 'work_workplace') { echo 'is--active'; } ?>" href="/work/">ワークプレイス</a></li>
							<li><a class="<?php if ($sub_active === 'work_welfare') { echo 'is--active'; } ?>" href="/work/welfare/">福利厚生</a></li>
							<li><a class="<?php if ($sub_active === 'work_hrd') { echo 'is--active'; } ?>" href="/work/hrd/">人材育成プログラム</a></li>
						</ul>
					</li>
					<li class="<?php if ($active === 'people') { echo 'is--active'; } ?>">
						<h4>
							<a href="/people/">
								<span lang="en">People</span>
								<span lang="ja">人を知る</span>
							</a>
						</h4>
						<ul class="p-gm__list is--sub">
							<li><a class="<?php if ($sub_active === 'people_employees') { echo 'is--active'; } ?>" href="/people/#employees">社員紹介</a></li>
							<li><a class="<?php if ($sub_active === 'people_crosstalk') { echo 'is--active'; } ?>" href="/people/#crosstalk">クロストーク</a></li>
							<li><a class="<?php if ($sub_active === 'people_interview') { echo 'is--active'; } ?>" href="/people/#interview">インタビュー動画</a></li>
						</ul>
					</li>
					<li>
						<h4>
							<a href="https://www.kumesekkei.co.jp/designstory/" target="_blank" rel="noopener">
								<span lang="en">Design Story</span>
								<span lang="ja">デザインストーリー</span>
							</a>
						</h4>
					</li>
				</ul>
			</div>

			<div class="p-gm__footer">
				<div class="p-gm__footer__container l-container">
					<ul class="p-gm__footer__links">
						<li><span class="c-icon c-icon--external"></span> <a href="https://www.kumesekkei.co.jp/" target="_blank" rel="noopener">コーポレートトップ</a></li>
						<li><span class="c-icon c-icon--external"></span> <a href="https://www.kumesekkei.co.jp/privacypolicy/" target="_blank" rel="noopener">プライバシーポリシー</a></li>
						<li><span class="c-icon c-icon--external"></span> <a href="https://www.kumesekkei.co.jp/sitepolicy/" target="_blank" rel="noopener">サイトポリシー</a></li>
						<li><span class="c-icon c-icon--instagram"></span> <a href="https://www.instagram.com/kumesekkei/" target="_blank" rel="noopener">@kumesekkei</a></li>
					</ul>
					<p class="p-gm__footer__copyright" lang="en">©︎ KUME SEKKEI co.ltd.</p>
				</div>
			</div>
		</div>
	</div>
</div>
