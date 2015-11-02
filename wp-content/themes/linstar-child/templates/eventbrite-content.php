<?php
/**
    * Template Name: Eventbrite Content
	* (c) king-theme.com
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $king, $post;
if( is_page() ){
	$sidebar = get_post_meta( $post->ID,'_king_page_sidebar' , true );
}else if( is_home() ){
	if( get_option( 'page_for_posts', true ) ){
		$sidebar = get_post_meta( get_option( 'page_for_posts', true ),'_king_page_sidebar' , true );
	}
}	
if( empty( $sidebar ) ){
	$sidebar = 'sidebar';
}
get_header();

?>

	<?php $king->breadcrumb(); ?>
	
	<div id="primary" class="site-content container-content content ">
		<div id="content" class="row row-content container">
			<div class="col-md-3">
				<?php if ( is_active_sidebar( $sidebar ) ) : ?>
					<div id="sidebar" class="widget-area king-sidebar">
						<?php dynamic_sidebar( $sidebar ); ?>
					</div><!-- #secondary -->
				<?php endif; ?>
			</div>
			<div class="col-md-9">
				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>
					<?php endwhile; ?>
			
					<?php $king->pagination(); ?>
					
				<?php else : ?>
			
					<article id="post-0" class="post no-results not-found">
			
					<?php if ( current_user_can( 'edit_posts' ) ) :
						// Show a different message to a logged-in user who can add posts.
					?>
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'No posts to display', KING_DOMAIN ); ?></h1>
						</header>
			
						<div class="entry-content">
							<p><?php printf( __( 'Ready to publish your first post? <a href="%s">Get started here</a>.', KING_DOMAIN ), admin_url( 'post-new.php' ) ); ?></p>
						</div><!-- .entry-content -->
			
					<?php else :
						// Show the default message to everyone else.
					?>
						<header class="entry-header">
							<h1 class="entry-title"><?php _e( 'Nothing Found', KING_DOMAIN ); ?></h1>
						</header>
			
						<div class="entry-content">
							<p><?php _e( 'Apologies, but no results were found. Perhaps searching will help find a related post.', KING_DOMAIN ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .entry-content -->
					<?php endif; // end current_user_can() check ?>
			
					</article><!-- #post-0 -->
			
				<?php endif; // end have_posts() check ?>
				<?php
				// Get our event based on the ID passed by query variable.
				$event = new Eventbrite_Query( array( 'p' => get_query_var( 'eventbrite_id' ) ) );

				if ( $event->have_posts() ) :
					while ( $event->have_posts() ) : $event->the_post(); ?>

						<article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<?php the_post_thumbnail(); ?>

								<h1 class="entry-title"><?php the_title(); ?></h1>

								<div class="entry-meta">
									<?php eventbrite_event_meta(); ?>
								</div><!-- .entry-meta -->
							</header><!-- .entry-header -->

							<div class="entry-content">
								<?php the_content(); ?>

								<?php eventbrite_ticket_form_widget(); ?>
							</div><!-- .entry-content -->

							<footer class="entry-footer">
								<?php eventbrite_edit_post_link( __( 'Edit', 'eventbrite_api' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-## -->

					<?php endwhile;

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;

				// Return $post to its rightful owner.
				wp_reset_postdata();
			?>
			</div>
		</div>
	</div>
				
<?php get_footer(); ?>		
