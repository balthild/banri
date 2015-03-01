<div id="comments">
	<div class="title">评论</div>
	<div class="info"><?php comments_popup_link('没有评论', '1 条评论', '% 条评论'); ?></div>

	<?php if(comments_open()) {
		comment_form(array(
			'title_reply'       => '',
			'title_reply_to'    => '',
			'comment_field' =>  '<div style="clear:both"></div><p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' .
				'</textarea></p>',
			'comment_notes_before' => '',
			'comment_notes_after' => ''
		));
	} else { ?>
		<em class="comment-closed"><?php _e('Comments are closed.'); ?></em>
	<?php } ?>
	
	<?php if (have_comments()) { ?>
		<ol class="comment-list">
			<?php
				wp_list_comments(array(
					'callback'          => 'st_list_comments',
					'type'              => 'all',
					'max_depth'         => '9999',
				));
			?>
		</ol><!-- .comment-list -->
	<?php } // have_comments() ?>

	<div class="comments-nav">
		<?php paginate_comments_links('prev_text=前一页&next_text=后一页'); ?>
	</div>

</div>