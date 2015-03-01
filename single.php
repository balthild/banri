<?php get_header(); ?>
<div id="wrap" class="width">
	<?php
	if (have_posts()){
		while(have_posts()){
			the_post(); ?>
			<div id="article">
				<h2><?php the_title() ?></h2>
				<div class="info">
					<?php the_time('Y年m月d日'); ?><span class="line">|</span>
					<?php the_category('&#12288;'); ?><span class="line">|</span>
					<?php comments_popup_link('没有评论', '1 条评论', '% 条评论'); ?>
					<?php the_tags('<span class="line">|</span>' . __('Tags') . ': ', '&#12288;', ''); ?>
				</div>
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
			<?php comments_template();
		}
	} ?>
</div>
<?php get_footer(); ?>