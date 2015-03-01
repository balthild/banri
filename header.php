<!DOCTYPE html>
<html lang="zh-cmn-Hans">
<head>
	<meta charset="UTF-8">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">
	<meta http-equiv="Cache-Control" content="no-siteapp">
	<meta http-equiv="Cache-Control" content="no-transform">
	<title><?php wp_title(' | ', true, 'right'); ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></title>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<!-- 禁止搜索引擎索引评论分页 -->
	<?php if(is_single() || is_page()) {
		if(function_exists('get_query_var')) {
			$cpage = intval(get_query_var('cpage'));
			$commentPage = intval(get_query_var('comment-page'));
		}
		if(!empty($cpage) || !empty($commentPage)) {
			echo '<meta name="robots" content="noindex, nofollow">';
			echo "\n";
		}
	} ?>
	<?php wp_head(); ?>
</head>
<body>
<div id="header">
	<div class="width">
		<?php
		wp_nav_menu(array(
			'menu_class' => 'topnav',
			'theme_location' => 'topmenu',
			'depth' => 1,
			'fallback_cb' => 'st_page_menu'
		));
		function st_page_menu() {
			wp_page_menu(array(
				'menu_class' => 'topnav',
				'depth' => 1,
				'show_home' => true
			));
		}
		?>
		<h1 class="right blogname"><?php bloginfo('name'); ?></h1>
		<div id="triangle" class="right"></div>
		<form id="search" class="right" method="get" action="<?php home_url(); ?>">
			<input type="text" name="s" id="s" value="(<ゝω·)☆" onfocus="if (value =='(<ゝω·)☆'){value =''}" onblur="if (value ==''){value='(<ゝω·)☆'}" autocomplete="off" />
		</form>
	</div>
</div>