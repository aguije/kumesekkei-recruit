<?php

	$path = '';
	if (array_key_exists('path', $_GET) && $_GET['path']) {
		$path = $_GET['path'];
	}

	$is_top = false;
	/*
	if (array_key_exists('is_top', $_GET) && $_GET['is_top'] && $_GET['is_top'] === '1') {
		$is_top = true;
	}
	*/

?>
<div class="p-about__stats__belt">
	<div class="swiper">
		<div class="swiper-wrapper">

			<div id="sales_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#sales'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/sales_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/sales_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>売上高と<br>建物用途<br>構成比</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num"><b>119.4</b> 億円</p>
					</div>
				</a>
			</div>

			<div id="awards_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#awards'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/awards_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/awards_fig.png', true); ?>" alt="">
						</picture>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num is--lines"><b>203</b><span lang="en">awards</span></p>
					</div>
				</a>
			</div>

			<div id="employees_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#employees'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/employees_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/employees_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>社員数</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num is--lines"><b>650</b><span lang="en">employees</span></p>
					</div>
				</a>
			</div>

			<div id="professionals_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#employees'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/professionals_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/professionals_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>プロフェッ<br>ショナル<br>有資格者数</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num is--lines"><b>438</b><span lang="en">people</span></p>
					</div>
				</a>
			</div>

			<div id="female-male_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#female-male'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/female-male_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/female-male_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>女男比率</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num"><sup>女性</sup><b>37.0</b>%　<sup>男性</sup><b>63.0</b>%</p>
						<p class="p-about__stats__belt__fig__num is--sub">（ 新卒 〜 3年目 ）</p>
					</div>
				</a>
			</div>

			<div id="turnover_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#turnover'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/turnover_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/turnover_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>離職率</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num"><b>4.4</b>%</p>
						<p class="p-about__stats__belt__fig__num is--sub">（ 新卒 〜 5年目 ）</p>
					</div>
				</a>
			</div>

			<div id="female_childcare_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#female_childcare'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/female_childcare_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/female_childcare_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>女性の<br>育休取得率</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num"><b>100</b>%</p>
					</div>
				</a>
			</div>

			<div id="male_childcare_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#male_childcare'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/male_childcare_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/male_childcare_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>男性の<br>育休取得率</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num"><b>43.8</b>%</p>
						<p class="p-about__stats__belt__fig__num is--sub">（ パパになった人で取得した割合 ）</p>
					</div>
				</a>
			</div>

			<div id="female_reinstatement_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#female_reinstatement'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/female_reinstatement_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/female_reinstatement_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>女性の<br>育休復職率</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num"><b>100</b>%</p>
					</div>
				</a>
			</div>

			<div id="mama_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#mama'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/mama_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/mama_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>働くママ<br>比率</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num"><b>27.7</b>%</p>
					</div>
				</a>
			</div>

			<div id="overtime_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#overtime'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/overtime_fig.svg'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/overtime_fig.svg', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>平均残業時間</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num"><b>29.6</b> <span lang="en">hours</span></p>
						<p class="p-about__stats__belt__fig__num is--sub">（ 新卒1年目実績 ）</p>
					</div>
				</a>
			</div>

			<div id="leave_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#leave'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/leave_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/leave_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>有給休暇<br>平均取得日数</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num is--lines"><b>10.34</b><span lang="en">days</span></p>
					</div>
				</a>
			</div>

			<div id="sns_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#sns'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/sns_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/sns_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>社内SNS<br>月平均投稿数</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num is--lines"><b>177</b> <span lang="en">posts</span></p>
					</div>
				</a>
			</div>

			<div id="db_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#db'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/db_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/db_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>プロジェクトDB<br>月平均アクセス数</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num is--lines"><b>3,176</b> <span lang="en">posts</span></p>
					</div>
				</a>
			</div>

			<div id="club_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#club'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/club_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/club_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>クラブ活動</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num is--lines"><b>18</b><span lang="en">club activities</span></p>
					</div>
				</a>
			</div>

			<div id="club_participants_mini" class="p-about__stats__belt__fig swiper-slide">
				<a href="<?php echo $path; ?><?php echo ($is_top) ? '' : '#club_participants'; ?>">
					<figure>
						<picture <?php echo KUME_Util::get_image_aspect_style('about/stats/mini/club_participants_fig.png'); ?>>
							<img class="c-lazy is--cover" src="<?php echo KUME_Util::image_path('about/stats/mini/club_participants_fig.png', true); ?>" alt="">
						</picture>
						<figcaption>
							<p>クラブ活動<br>参加者</p>
						</figcaption>
					</figure>
					<div class="p-about__stats__description">
						<p class="p-about__stats__belt__fig__num is--lines"><b>308</b><span lang="en">people</span></p>
					</div>
				</a>
			</div>

		</div>
	</div>
</div>
