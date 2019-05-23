<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

  <div class="clear"></div>
  <div class="single-post-comments">
    <div class="comments-area">
      <?php if ( have_comments() ) : ?>
        <div class="comments-heading">
          <h3>
            <?php
              printf( _nx( '1 Comentário', '%1$s Comentários', get_comments_number(), 'comments title', 'twentyfifteen' ),
                number_format_i18n( get_comments_number() ), get_the_title() );
            ?>
          </h3>
        </div>
        <div class="comments-list">
          <?php twentyfifteen_comment_nav(); ?>
          <?php
            wp_list_comments( array(
              'style'       => 'ul',
              'short_ping'  => true,
              'avatar_size' => 56,
            ) );
          ?>
          <?php twentyfifteen_comment_nav(); ?>
        </div>
      <?php endif; ?>
    </div>
    <div class="comment-respond">
      <h3 class="comment-reply-title">Leave a Reply </h3>
      <span class="email-notes">Your email address will not be published. Required fields are marked *</span>

      <?php comment_form(); ?>

     
    </div>
  </div>
  <!-- single-blog end -->
