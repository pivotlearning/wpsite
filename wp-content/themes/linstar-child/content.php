<?php 
/**
 * (c) king-theme.com
 */

	global $king;
 
?><article id="post-<?php the_ID(); ?>" <?php post_class( is_page()?'':'blog_post' ); ?>>

		<div class="entry-content blog_postcontent">
			<?php
				// Set up and call our Eventbrite query.
				$events = new Eventbrite_Query( apply_filters( 'eventbrite_query_args', array(
					// 'display_private' => false, // boolean
					// 'nopaging' => false,        // boolean
					// 'limit' => null,            // integer
					// 'organizer_id' => null,     // integer
					// 'p' => null,                // integer
					// 'post__not_in' => null,     // array of integers
					// 'venue_id' => null,         // integer
					// 'category_id' => null,      // integer
					// 'subcategory_id' => null,   // integer
					// 'format_id' => null,        // integer
				) ) );

				if ( $events->have_posts() ) :
					while ( $events->have_posts() ) : $events->the_post(); ?>

						<article id="event-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<?php the_post_thumbnail(); ?>

								<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

								<div class="entry-meta">
									<?php eventbrite_event_meta(); ?>
								</div><!-- .entry-meta -->
							</header><!-- .entry-header -->

							<div class="entry-content">
								<?php eventbrite_ticket_form_widget(); ?>
							</div><!-- .entry-content -->

							<footer class="entry-footer">
								<?php eventbrite_edit_post_link( __( 'Edit', 'eventbrite_api' ), '<span class="edit-link">', '</span>' ); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-## -->

					<?php endwhile;

					// Previous/next post navigation.
					eventbrite_paging_nav( $events );

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;

				// Return $post to its rightful owner.
				wp_reset_postdata();
			?>
			
			<?php 
				
				global $more,$post;
				
				if( $king->cfg['excerptImage'] == 1 && !is_page() && !is_single() )
				{

					$img = $king->get_featured_image( $post, true );
					if( strpos( $img , 'default.') === false && $img != null  && !is_single() )
					{
						if( strpos( $img , 'youtube') !== false )
						{
							echo '<div class="video_frame">';
							echo '<ifr'.'ame src="'.$img.'"></ifra'.'me>';
							echo '</div>';
							
						}else{
					
							echo '<div class="imgframe animated fadeInUp">';
							if( $more == false ){
								echo '<a title="Continue read: '.get_the_title().'" href="'.get_permalink(get_the_ID()).'">';
							}else{
								echo '<a href="#">';
							}	
							echo '<img alt="'.get_the_title().'" class="featured-image" src="'.$img.'" />';
							echo '</a></div>';	
							
						}	
					}	
				
				};
				
				if( $king->cfg['excerptImage'] == 1 && is_single() ){
					
					$img = $king->get_featured_image( $post, false );
					
					if( strpos( $img , 'default.') === false && $img != null )
					{
					
						echo '<div class="image_frame animated eff-fadeInUp">';
						if( $more == false ){
							echo '<a title="Continue read: '.get_the_title().'" href="'.get_permalink(get_the_ID()).'">';
						}else{
							echo '<a href="#">';
						}	
						echo '<img alt="'.get_the_title().'" class="featured-image" src="'.$img.'" />';
						echo '</a></div>';	
								
					}	
				}
				
				?>
				
				<?php if( !is_page() ): ?>
				
					<header class="entry-header animated ext-fadeInUp">
						
						<h3 class="entry-title">
							<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', KING_DOMAIN ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
								<?php the_title(); ?>
							</a>
							<?php //edit_post_link( __( 'Edit', KING_DOMAIN ), '<span class="edit-link">', '</span>' ); ?>
						</h3>
							
						<?php if ( is_sticky() ) : ?>	
							<h3 class="entry-format">
									<?php _e( 'Featured', KING_DOMAIN ); ?>
							</h3>
						<?php endif; ?>
			
						<?php 
						
						if ( 'post' == get_post_type() ){
	
							if ( $king->cfg['showMeta'] ==  1 ){ 
								king::posted_on( 'post_meta_links ' );
							}
							 
						}
				
						
					echo '</header><!-- .entry-header -->';
				
				endif;
				/*End of header of single post*/
	
				if( ( get_option('rss_use_excerpt') == 1 || is_search() ) && !is_single() && !is_page() ){
			
					the_excerpt();
					echo '<a href="'.get_the_permalink().'">'.__('read more &#187;',KING_DOMAIN).'</a>';
					
				}else{
					the_content( __( 'Read more &#187;', KING_DOMAIN ) ); 				
				}
				
				wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', KING_DOMAIN ) . '</span>', 'after' => '</div>' ) ); 
			
			?>
		</div><!-- .entry-content -->
		
	</article><!-- #post-<?php the_ID(); ?> -->
	<?php

	if( !is_page() ){
		echo '<div class="clearfix divider_line8 artciles-between"></div>';
	}
	?>	