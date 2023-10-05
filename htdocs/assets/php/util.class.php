<?php

class KUME_Util {

	/**
	 * Class constructor
	 */
	function __construct () {

	}


	/** =================================================================
	 *
	 * assets 関連
	 *
	 * --------------------------------------------------------------- */

	public static function asset_path ($_filename, $_timestamp = false) {
		$url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . '/assets/' . $_filename;

		if ($_timestamp) {
			$path = $_SERVER['DOCUMENT_ROOT'] . '/assets/' . $_filename;

			if (file_exists($path)) {
				$timestamp = filemtime($path);
				return "{$url}?timestamp={$timestamp}";
			}
			else {
				return $url;
			}
		}
		else {
			return $url;
		}
	}

	public static function style_path ($_filename, $_timestamp = false) {
		return self::asset_path('css/' . $_filename, $_timestamp);
	}

	public static function script_path ($_filename, $_timestamp = false) {
		return self::asset_path('js/' . $_filename, $_timestamp);
	}

	public static function asset_full_path ($_filename, $_timestamp = false) {
		return $_SERVER['DOCUMENT_ROOT'] . '/assets/' . $_filename;
	}

	public static function style_full_path ($_filename, $_timestamp = false) {
		return self::asset_full_path('css/' . $_filename, $_timestamp);
	}

	public static function script_full_path ($_filename, $_timestamp = false) {
		return self::asset_full_path('js/' . $_filename, $_timestamp);
	}

	public static function image_path ($_filename, $_timestamp = false) {
		return self::asset_path('images/' . $_filename, $_timestamp);
	}

	public static function image_full_path ($_filename, $_timestamp = false) {
		return self::asset_full_path('images/' . $_filename, $_timestamp);
	}


	/** =================================================================
	 *
	 * GET META
	 *
	 * --------------------------------------------------------------- */

	public static function get_meta ($_args) {
		$_args = array_replace(array(
			'bc' => null,
			'title' => '',
			'description' => '久米設計の新卒・キャリア採用のエントリーページです。在籍スタッフによるチームインタビューや職場環境、人材育成プログラムもご紹介しています。',
			'image' => KUME_Util::image_path('ogp.png', true),
			'site' => '採用サイト | 株式会社 久米設計',
			'url' => '/',
			'type' => 'article'
		), $_args);

		$root_url = 'https://' . $_SERVER['HTTP_HOST'];

		//

		$titles = array();

		if ($_args['bc']) {
			foreach ($_args['bc'] as $layer) {
				if (
					$layer['title'] !== $_args['site'] &&
					$layer['title'] !== '採用トップ'
				) {
					array_push($titles, $layer['title']);
				}
			}
		}

		$titles = array_reverse($titles);

		array_push($titles, $_args['site']);

		$meta['title'] = implode(' – ', $titles);

		//

		$meta['description'] = $_args['description'];
		$meta['image'] = $_args['image'];
		$meta['site'] = $_args['site'];
		$meta['url'] = $root_url . $_args['url'];
		$meta['type'] = $_args['type'];

		return $meta;
	}


	/** =================================================================
	 *
	 * GET SNIPPET
	 *
	 * --------------------------------------------------------------- */

	public static function get_snippet ($_args) {
		$_args = array_replace(array(
			'type' => 'bc',
			'data' => null
		), $_args);

		$root_url = 'https://' . $_SERVER['HTTP_HOST'];

		ob_start();

		if ($_args['type'] === 'bc') {
			?>
			<script type="application/ld+json">
				{
					"@context": "https://schema.org",
					"@type": "BreadcrumbList",
					"itemListElement": [
						<?php

							foreach ($_args['data'] as $layer_key => $layer) {
								if ($layer_key !== 0) {
									echo ',';
								}

								if (!empty($layer['url'])) {
									?>
									{
										"@type": "ListItem",
										"position": <?php echo $layer_key + 1; ?>,
										"name": "<?php echo $layer['title']; ?>",
										"item": "<?php echo $root_url . $layer['url']; ?>"
									}
									<?php
								}
								else {
									?>
									{
										"@type": "ListItem",
										"position": <?php echo $layer_key + 1; ?>,
										"name": "<?php echo $layer['title']; ?>"
									}
									<?php
								}
							}

						?>
					]
				}
			</script>
			<?php
		}
		else if ($_args['type'] === 'line') {
			echo '<nav class="c-breadcrumb"><ul>';

			foreach ($_args['data'] as $layer_key => $layer) {
				if ($layer_key === count($_args['data']) - 1) {
					echo "<li><span class=\"is--item is--active\">{$layer['title']}<span></li>";
				}
				else if ($layer['url'] === null) {
					echo "<li><span class=\"is--item\">{$layer['title']}<span></li>";
				}
				else {
					echo "<li><a class=\"is--item\" href=\"{$root_url}{$layer['url']}\">{$layer['title']}</a></li>";
				}
			}

			echo '</ul></nav>';
		}

		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}


	/** =================================================================
	 *
	 * GET IMAGE ASPECT STYLE
	 *
	 * --------------------------------------------------------------- */

	public static function get_image_aspect_style ($_path) {
		$full_path = KUME_Util::image_full_path($_path);

		if (file_exists($full_path)) {
			$size = getimagesize($full_path);

			if ($size) {
				return "style=\"aspect-ratio: {$size[0]} / {$size[1]};\"";
			}
		}
	}


	/** =================================================================
	 *
	 * fastgetimagesize
	 * FYI) https://stackoverflow.com/questions/4635936/super-fast-getimagesize-in-php
	 *
	 * --------------------------------------------------------------- */

	public static function fastgetimagesize ($_url) {
		function ranger ($url) {
			$headers = array(
				"Range: bytes=0-32768"
			);

			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			$data = curl_exec($curl);
			curl_close($curl);

			return $data;
		}

		$raw = ranger($_url);
		$im = imagecreatefromstring($raw);

		$width = imagesx($im);
		$height = imagesy($im);

		return array(
			'width' => $width,
			'height' => $height,
		);
	}


	/** =================================================================
	 *
	 * GET CROSSTALK FACE
	 *
	 * --------------------------------------------------------------- */

	public static function get_crosstalk_face ($_name, $_slug, $_dir) {
		ob_start();

		?>
		<figure class="p-people__crosstalk__article__face">
			<div class="c-circle-picture c-lazy-trigger">
				<img class="c-lazy is--cover" data-src="<?php echo KUME_Util::image_path("people/crosstalk/{$_dir}/member_{$_slug}.jpg", true); ?>" alt="">
			</div>
			<figcaption><p><?php echo $_name; ?></p></figcaption>
		</figure>
		<?php

		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}

?>
