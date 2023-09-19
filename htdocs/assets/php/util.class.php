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
				if ($layer['title'] !== '') {
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

}

?>
