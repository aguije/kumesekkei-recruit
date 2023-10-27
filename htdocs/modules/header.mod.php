<!DOCTYPE html>
<html lang="ja" class="<?php

	if (!empty($_GET) && array_key_exists('debug', $_GET) && $_GET['debug'] === '1') {
		echo 'is-debug';
	}

?>">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
	<meta name="format-detection" content="telephone=no">

	<title><?php echo $meta['title']; ?></title>

	<meta name="description" content="<?php echo $meta['description']; ?>">

	<meta property="og:title" content="<?php echo $meta['title']; ?>">
	<meta property="og:type" content="<?php echo $meta['type']; ?>">
	<meta property="og:url" content="<?php echo $meta['url']; ?>">
	<meta property="og:image" content="<?php echo $meta['image']; ?>">
	<meta property="og:description" content="<?php echo $meta['description']; ?>">
	<meta property="og:site_name" content="<?php echo $meta['site']; ?>">
	<meta property="og:locale" content="ja_JP">

	<meta name="twitter:card" content="summary_large_image">
	<meta name="twitter:site" content="<?php echo $meta['site']; ?>">
	<meta name="twitter:title" content="<?php echo $meta['title']; ?>">
	<meta name="twitter:description" content="<?php echo $meta['description']; ?>">
	<meta name="twitter:url" content="<?php echo $meta['url']; ?>">
	<meta name="twitter:image" content="<?php echo $meta['image']; ?>">

	<!-- favicon -->
	<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php echo $meta['url']; ?>favicon.ico">
	<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $meta['url']; ?>favicon.ico">

	<!-- Apple -->
	<meta name="apple-mobile-web-app-title" content="Takehiko Ono">
	<link rel="apple-touch-icon" href="<?php echo $meta['url']; ?>assets/images/touch/apple-touch-icon-57x57.png" sizes="57x57">
	<link rel="apple-touch-icon" href="<?php echo $meta['url']; ?>assets/images/touch/apple-touch-icon-60x60.png" sizes="60x60">
	<link rel="apple-touch-icon" href="<?php echo $meta['url']; ?>assets/images/touch/apple-touch-icon-72x72.png" sizes="72x72">
	<link rel="apple-touch-icon" href="<?php echo $meta['url']; ?>assets/images/touch/apple-touch-icon-76x76.png" sizes="76x76">
	<link rel="apple-touch-icon" href="<?php echo $meta['url']; ?>assets/images/touch/apple-touch-icon-114x114.png" sizes="114x114">
	<link rel="apple-touch-icon" href="<?php echo $meta['url']; ?>assets/images/touch/apple-touch-icon-120x120.png" sizes="120x120">
	<link rel="apple-touch-icon" href="<?php echo $meta['url']; ?>assets/images/touch/apple-touch-icon-144x144.png" sizes="144x144">
	<link rel="apple-touch-icon" href="<?php echo $meta['url']; ?>assets/images/touch/apple-touch-icon-152x152.png" sizes="152x152">
	<link rel="apple-touch-icon" href="<?php echo $meta['url']; ?>assets/images/touch/apple-touch-icon-180x180.png" sizes="180x180">

	<!-- Android -->
	<link rel="manifest" href="<?php echo $meta['url']; ?>manifest.json">

	<!-- Windows -->
	<meta name="msapplication-square70x70logo" content="<?php echo $meta['url']; ?>assets/images/touch/site-tile-70x70.png">
	<meta name="msapplication-square150x150logo" content="<?php echo $meta['url']; ?>assets/images/touch/site-tile-150x150.png">
	<meta name="msapplication-wide310x150logo" content="<?php echo $meta['url']; ?>assets/images/touch/site-tile-310x150.png">
	<meta name="msapplication-square310x310logo" content="<?php echo $meta['url']; ?>assets/images/touch/site-tile-310x310.png">
	<meta name="msapplication-TileColor" content="#ffffff">

	<!-- theme -->
	<meta name="theme-color" content="#ffffff">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&family=Zen+Kaku+Gothic+New:wght@400;500;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo KUME_Util::style_path('core.css', true); ?>">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

	<script>
		(function(i, s, o, g, r, a, m) {
			i['GoogleAnalyticsObject'] = r;
			i[r] = i[r] || function() {
				(i[r].q = i[r].q || []).push(arguments)
			},
			i[r].l = 1 * new Date();
			a = s.createElement(o),
			m = s.getElementsByTagName(o)[0];
			a.async = 1;
			a.src = g;
			m.parentNode.insertBefore(a, m)
		})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

		ga('create', 'UA-58580335-1', 'auto');
		ga('send', 'pageview');
	</script>
</head>

<?php

	echo KUME_Util::get_snippet(array(
		'type' => 'bc',
		'data' => $bc
	));

?>

<body>
