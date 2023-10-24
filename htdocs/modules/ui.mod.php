<?php

	$is_include_lead = true;
	if (array_key_exists('is_include_lead', $_GET) && $_GET['is_include_lead'] && $_GET['is_include_lead'] === '0') {
		$is_include_lead = false;
	}

	if ($is_include_lead === true) {
		?>
		<nav class="p-lead l-container">
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
		</nav>
		<?php
	}

?>

<div class="p-scroll-to-top">
	<a class="c-circle-arrow c-circle-arrow--page" href="javascript:void(0);"><span class="c-icon c-icon--arrow_u"></span></a>
</div>

<div class="p-modal">
	<div class="p-modal__wrapper">
		<div class="p-modal__content">
			<div class="p-modal__video">
				<div id="player"></div>
				<div class="p-modal__close">
					<a href="javascript:void(0);"><span class="c-icon c-icon--close"></span></a>
				</div>
			</div>
		</div>
	</div>
	<div class="p-modal__veil"></div>
</div>
