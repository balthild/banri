<?php
add_filter('pre_option_link_manager_enabled', '__return_true'); //启用链接功能
remove_filter('the_content', 'wptexturize'); //禁止自动转换全半角符号
add_filter('login_errors', '__return_null'); //隐藏登陆错误信息
add_filter('use_default_gallery_style', '__return_false' ); //禁用自带相册样式
add_filter('show_admin_bar', '__return_false' ); //禁用首页用户信息栏

register_nav_menus(array('topmenu' => __('Header') . __('Navigation'))); //注册菜单


// 加载静态文件
function st_load_libs() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', '//lib.sinaapp.com/js/jquery/1.8.3/jquery.min.js', array(), '1.8.3', true);

	wp_enqueue_style('st-main-style', get_stylesheet_uri(), array(), '1.0');

	wp_enqueue_script('jquery');
	wp_enqueue_script('ajax-comment', get_template_directory_uri() . '/comments-ajax.js', array('jquery'), '1.3', true);
	wp_enqueue_script('common-script', get_template_directory_uri() . '/common.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'st_load_libs');


if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'id'=> 'footer-widget',
		'name' => '页脚小工具（放三个或者留空）',
		'before_widget' => '<div id="%1$s" class="list %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>'
	));
}


// 修改默认评论表单
function st_fields($fields) {
	$commenter = wp_get_current_commenter();
	$req = get_option('require_name_email');
	$aria_req = ($req ? " aria-required='true'" : '');
	$fields = array(
		'author' => '<div class="comment-form-author comment-info"><span class="form-tip"><label for="author">' . ($req ? '<span class="required">*</span>' : '') . '昵称' . ': </label> ' . '</span>' .
		'<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></div>',
		'email' => '<div class="comment-form-email comment-info"><span class="form-tip"><label for="email">' . ($req ? '<span class="required">*</span>' : '') . '邮箱' . ': </label> ' . '</span>' .
		'<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></div>',
		'url' => '<div class="comment-form-url comment-info"><span class="form-tip"><label for="url">' . '站点' . ': </label>' . '</span>' .
		'<input id="url" name="url" type="text" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div>',
	);
	return $fields;
}
add_filter('comment_form_default_fields', 'st_fields');

function st_list_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;

	if ($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') { ?>
		<p class="pingback"><?php comment_author_link(); ?></p>
	<?php } else { ?>
		<li id="commentli-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div id="comment-<?php comment_id(); ?>" class="comment-container">
				<div class="comment-avatar"><?php echo get_avatar($comment, (!$comment->comment_parent ? 50 : 30)); ?></div>
				<div class="comment-body">
					<div class="comment-header">
						<span class="comment-author"><?php comment_author_link(); ?></span>
						<span class="comment-edit fade"><?php edit_comment_link(__('Edit')); ?></span></span>
					</div>
					<div class="comment-content"><?php comment_text(); ?></div>
					<div class="comment-footer">
						<span class="comment-time">
							<?php if ($comment->comment_approved == '0') { ?>
								<em class="comment-awaiting-moderation">初次评论需要等待审核</em>
							<?php } else { ?>
								<time>
								<?php if (current_time('timestamp') - get_comment_time('U') < 2592000) {
									echo human_time_diff(get_comment_time('U'), current_time('timestamp')) . '前';
								} else {
									echo comment_time('Y-n-j H:i');
								} ?>
								</time>
							<?php } ?>
						</span>
						<span><?php comment_reply_link(array_merge($args, array(
							'reply_text' => __('Reply'),
							'depth' => $depth,
							'max_depth' => $args['max_depth']
						))); ?></span>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</li>
	<?php }
}
