<?php get_header(); ?>
<div id="wrap" class="width">
	<?php
	if (have_posts()){
		while(have_posts()){
			the_post(); ?>
			<div id="article">
				<h2><?php the_title() ?></h2>
				<div class="info">最后编辑于<?php the_time('Y年m月d日'); ?></div>
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
			<?php comments_template();
		}
	} ?>
</div>
<?php get_footer(); ?>