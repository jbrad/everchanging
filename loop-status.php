<?php
/**
 * The template for displaying status post formats.
 * 
 * @package Standard
 * @since 	3.0
 * @version	3.0
 */
?>
<?php /* Main Loop */ ?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'post format-status' ); ?>>

	<div class="post-header clearfix">
		<div class="row-fluid">
				<div class="post-avatar span2">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
				</div><!-- /.post-avatar -->
			<div class="entry-content span10 clearfix">
				<?php if( ( is_category() || is_archive() || is_home() ) && has_excerpt() ) { ?>
					<?php the_excerpt( ); ?>
					<a href="<?php echo get_permalink(); ?>"><?php _e( 'Continue Reading...', 'standard' ); ?></a>
				<?php } else { ?>
					<?php the_content( __( 'Continue Reading...', 'standard' ) ); ?>
				<?php } // end if/else ?>
			</div><!-- /.entry-content -->
		</div><!-- /row-fluid -->
	</div> <!-- /.post-header -->
					
	<div class="post-meta clearfix">
	
			<div class="meta-date-cat-tags pull-left">
			
				<?php if( is_multi_author() ) { ?>
					<span class="the-author">&nbsp;<?php _e( 'Posted by', 'standard' ); ?>&nbsp;<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo get_the_author_meta( 'display_name' ); ?>"><?php echo the_author_meta( 'display_name' ); ?></a></span>
					<span class="the-time updated">&nbsp;<?php _e( 'on', 'standard' ) . ' '; echo get_the_time( get_option( 'date_format' ) ); ?></span>
				<?php } else { ?>
					<?php printf( '<span class="the-time updated">' . __( 'Posted on %1$s', 'standard' ) . '</span>', get_the_time( get_option( 'date_format' ) ) ); ?>
				<?php } // end if ?>
			
				<?php $category_list = get_the_category_list( __( ', ', 'standard' ) ); ?>
				<?php if( $category_list ) { ?>
					<?php printf( '<span class="the-category">' . __( 'In %1$s', 'standard' ) . '</span>', $category_list ); ?>
				<?php } // end if ?>
				
				<?php $tag_list = get_the_tag_list( '', __( ', ', 'standard' ) ); ?>
				<?php if( $tag_list ) { ?>
                    <?php printf( '<span class="the-tags"><i class="icon-tags"></i> ' . __( '%1$s', 'standard' ) . '</span>', $tag_list ); ?>
				<?php } // end if ?>

                <span class="share">Share: </span>
                <a rel="no-follow" href="<?php the_permalink(); ?>?share=twitter&amp;nb=1" title="Click to share on Twitter" target="_blank"><i class="icon-twitter-sign"></i></a>
                <a rel="no-follow" href="<?php the_permalink(); ?>?share=facebook&amp;nb=1" title="Click to share on Facebook" target="_blank"><i class="icon-facebook-sign"></i></a>
                <a rel="no-follow" href="<?php the_permalink(); ?>?share=facebook&amp;nb=1" title="Click to share on LinkedIn" target="_blank"><i class="icon-linkedin-sign"></i></a>
                <a rel="no-follow" href="<?php the_permalink(); ?>?share=pinterest&amp;nb=1" title="Click to share on Pinterest" target="_blank"><i class="icon-pinterest-sign"></i></a>
                <a rel="no-follow" href="<?php the_permalink(); ?>?share=google-plus-1&amp;nb=1" title="Click to share on Google Plus" target="_blank"><i class="icon-google-plus-sign"></i></a>
                <a rel="no-follow" href="<?php the_permalink(); ?>?share=email&amp;nb=1" title="Click to share via Email" target="_blank"><i class="icon-envelope-alt"></i></a>
				
			</div><!-- /meta-date-cat-tags -->
			
			<div class="meta-comment-link pull-right">
				<a class="pull-right post-link" href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'permalink', 'standard' ); ?>">&nbsp;<i class="icon-link"></i></a>
				<?php if ( '' != get_post_format() ) { ?>
					<span class="the-comment-link"><?php comments_popup_link( __( 'Leave a comment', 'standard' ), __( '1 Comment', 'standard' ), __( '% Comments', 'standard' ), '', ''); ?></span>
				<?php } // end if ?>
			</div><!-- /meta-comment-link -->

	</div><!-- /.post-meta -->
	
</div><!-- /#post -->