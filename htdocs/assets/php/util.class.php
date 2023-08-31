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
			$timestamp = filemtime($_SERVER['DOCUMENT_ROOT'] . '/assets/' . $_filename);

			return "{$url}?timestamp={$timestamp}";
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

}

?>
