<div class="comments_area">
<?php if (comments_open()) { ?>
  <span class="comments_caption"><?php comments_number('Комментарии', '1 комментарий', '% комментариев'); ?></span>
    <?php if (get_comments_number() == 0) { ?>
    <?php } else { ?>
    <ol class="commentlist">
      <?php
        function verstaka_comment($comment, $args, $depth){
          $GLOBALS['comment'] = $comment; ?>
          <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>" class="comment_padd">
              <div class="comment-author vcard">
                <?php echo get_avatar($comment,$size='40',$default='<path_to_url>' ); ?>
                <?php printf(__('<div class="comment_user_name">%s</div>'), get_comment_author()) ?>
                <div class="comment-meta commentmetadata">
                  <time title="<?php comment_date('d.m.Y H:i:s'); ?>"><?php printf(__('%1$s at %2$s'), get_comment_date('d F'),  get_comment_time()) ?></time>
                </div>
				<?php if ( is_user_logged_in() ) { ?>
						<?php echo do_shortcode( '[rating-system-comments]' ); ?>
					<?php } else { ?>
					<div class="main_menu_profile_out">
						<?php echo do_shortcode( '[rating-system-comments]' ); ?>
					</div>	
				<?php } ?>
              </div>
              <?php if ($comment->comment_approved == '0') : ?>
              <?php endif; ?>
              <?php comment_text() ?>
              <div class="reply">
				<?php if ( is_user_logged_in() ) { ?>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				<?php } else { ?>
					<div class="main_menu_profile_out"><span>Ответить</span></div>
				<?php } ?>
              </div>
            </div>
		</li>
      <?php }
        $args = array(
          'reply_text' => 'Ответить',
          'callback' => 'verstaka_comment'
        );
        wp_list_comments($args);
      ?>
    </ol>
  <?php } ?>
  
	<?php if ( is_user_logged_in() ) { ?>
	<div id="respond" class="comments_footer">
		<div class="comments_post">
		<?php 
			global $current_user;
			get_currentuserinfo();
			echo get_avatar( $current_user->ID, 40 ); ?>
		<div class="comments_post_form">
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="commentform" method="post">
       <textarea name="comment" id="comment" placeholder="Оставить комментарий" class="comment_form" cols="45" rows="8" required></textarea>
	   <div class="comments_post_panel">
			<div class="reply_to_label"><?php comment_form_title('', 'Ответ %s' ); ?></div>
			<?php if (function_exists("the_cir_upload_field")) { the_cir_upload_field(); } ?>
			<div class='comments_gallery'></div>
			<input name="submit" type="submit" id="submit" class="submit" value="Отправить" />
		</div>
		<?php comment_id_fields();
			do_action('comment_form', $post->ID); ?>
	</form>
		</div>
		</div>
	</div>
	<?php } else { ?>
	<div class="comments_footer user_profile_out">
	<div class="comments_post">
		<div class="comments_post_form">
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="commentform" class="main_menu_profile_out" method="post">
       <textarea name="comment" id="comment" placeholder="Оставить комментарий" class="comment_form" cols="45" rows="8" required></textarea>
	   <div class="comments_post_panel">
			<div class="comments_upload_img"><svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 21 18"><path class="cls-1" d="M20.18,3.58a2.71,2.71,0,0,0-2-.81H15.75L15.19,1.3a2,2,0,0,0-.76-.91A2,2,0,0,0,13.3,0H7.7A2,2,0,0,0,6.57.38a2,2,0,0,0-.76.91L5.25,2.77H2.8a2.71,2.71,0,0,0-2,.81,2.66,2.66,0,0,0-.82,2v9.69a2.66,2.66,0,0,0,.82,2,2.71,2.71,0,0,0,2,.81H18.2a2.71,2.71,0,0,0,2-.81,2.66,2.66,0,0,0,.82-2V5.54a2.66,2.66,0,0,0-.82-2M14,13.81a4.74,4.74,0,0,1-3.46,1.42A4.75,4.75,0,0,1,7,13.81,4.64,4.64,0,0,1,5.6,10.38,4.64,4.64,0,0,1,7,7,4.74,4.74,0,0,1,10.5,5.54,4.75,4.75,0,0,1,14,7a4.64,4.64,0,0,1,1.44,3.42A4.64,4.64,0,0,1,14,13.81M10.5,7.27a3.05,3.05,0,0,0-2.23.91,3.08,3.08,0,0,0,0,4.4,3.17,3.17,0,0,0,4.45,0,3.08,3.08,0,0,0,0-4.4,3.05,3.05,0,0,0-2.23-.91"/></svg></div>
			<span class="submit">Отправить</span>
		</div>
		<?php comment_id_fields();
			do_action('comment_form', $post->ID); ?>
	</form>
		</div>
		</div>
	</div>
	<?php } ?>
	
	
  
  <?php } else { ?>
  <h3>Комментарии к этому материалу отключены.</h3>
  <?php }
?>
</div>
