<?php
/**
 * <a href="http://banri.me">Banri's</a>
 * 
 * @package Theme-Banri
 * @author Banri
 * @version 2.1.0
 * @link http://banri.me
 */
?>
<?php get_header(); ?>
<div id="wrap" class="width">
	<div>
		<?php
		if (have_posts()){
			while(have_posts()){
				the_post(); ?>
			<div class="loop">
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="info">
					<?php the_time('Y年m月d日'); ?><span class="line">|</span>
					<?php the_category('&#12288;'); ?><span class="line">|</span>
					<?php comments_popup_link('没有评论', '1 条评论', '% 条评论'); ?>
					<?php the_tags('<span class="line">|</span>' . __('Tags') . ': ', '&#12288;', ''); ?>
				</div>
				<div class="content">
					<?php the_content(''); ?>
					<p class="more"><a href="<?php the_permalink(); ?>">Read More</a></p>
				</div>
			</div>
			<?php }
		} ?>
	</div>
	<div id="page">
		<?php if (get_next_posts_link()) {
			echo '<span class="next">';
			next_posts_link('&lt;');
			echo '</span>';
		}
		if (get_previous_posts_link()) {
			echo '<span class="prev">';
			previous_posts_link('&gt;');
			echo '</span>';
		} ?>
	</div>
</div>
<?php get_footer(); ?>