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

	public static function get_meta ($_args) {
		$_args = array_replace(array(
			'bc' => null,
			'title' => '',
			'description' => '',
			'image' => KUME_Util::image_path('ogp.png', true),
			'site' => '久米設計 採用サイト',
			'url' => '/',
			'type' => 'article'
		), $_args);

		$root_url = 'https://' . $_SERVER['HTTP_HOST'];

		//

		$titles = array();

		if ($_args['bc']) {
			foreach ($_args['bc'] as $layer) {
				if ($layer['title'] !== $_args['site']) {
					array_push($titles, $layer['title']);
				}
			}
		}

		array_push($titles, $_args['site']);

		$meta['title'] = implode(' | ', $titles);

		//

		$meta['description'] = $_args['description'];
		$meta['image'] = $_args['image'];
		$meta['site'] = $_args['site'];
		$meta['url'] = $root_url . $_args['url'];
		$meta['type'] = $_args['type'];

		return $meta;
	}

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

								?>
								{
									"@type": "ListItem",
									"position": <?php echo $layer_key + 1; ?>,
									"name": "<?php echo $layer['title']; ?>",
									"item": "<?php echo $root_url . $layer['url']; ?>"
								}
								<?php
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
				else {
					echo "<li><a class=\"is--item\" href=\"{$root_url}{$layer['url']}\">{$layer['title']}<a></li>";
				}
			}

			echo '</ul></nav>';
		}

		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}

}

?>
