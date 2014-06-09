<?php
/**
 * Template Name: Showcase Template
 * Description: A Page Template that showcases Sticky Posts, Asides, and Blog Posts
 *
 * The showcase template in Twenty Eleven consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

// Enqueue showcase script for the slider
wp_enqueue_script( 'twentyeleven-showcase', get_template_directory_uri() . '/js/showcase.js', array( 'jquery' ), '2011-04-28' );

get_header(); ?>
<script type="text/javascript" charset="utf-8">
  // Auto-advance the showcase slider
  // Source: http://pastebin.com/s6JEthVi
  jQuery(document).ready(function(){
    var change_every = 5; // The number of seconds that the slider will auto-advance in
    var current = 1;
    function auto_advance(){
      if(current == -1) return false;
      jQuery('.feature-slider a').eq(current % jQuery('.feature-slider a').length).trigger('click', [true]);
      current++;
    };
    setInterval(function(){auto_advance()}, change_every * 1000);
  });
</script>
			<div id="content" class="showcase">
					
				<div id="home-bloco1">
		<div class="featured-posts">
				<?php
					/**
					 * Begin the featured posts section.
					 *
					 * See if we have any sticky posts and use them to create our featured posts.
					 * We limit the featured posts at ten.
					 */
					$sticky = get_option( 'sticky_posts' );

					// Proceed only if sticky posts exist.
					if ( ! empty( $sticky ) ) :

					$featured_args = array(
						'post__in' => $sticky,
						'post_status' => 'publish',
						'posts_per_page' => 10,
						'no_found_rows' => true,
					);

					// The Featured Posts query.
					$featured = new WP_Query( $featured_args );

					// Proceed only if published posts exist
					if ( $featured->have_posts() ) :

					/**
					 * We will need to count featured posts starting from zero
					 * to create the slider navigation.
					 */
					$counter_slider = 0;

					?>
					<h1 class="showcase-heading"><?php _e( 'DICAS EM DESTAQUE', 'twentyeleven' ); ?></h1>

				<?php
					// Let's roll.
					while ( $featured->have_posts() ) : $featured->the_post();

					// Increase the counter.
					$counter_slider++;

					/**
					 * We're going to add a class to our featured post for featured images
					 * by default it'll have the feature-text class.
					 */
					$feature_class = 'feature-text';

					if ( has_post_thumbnail() ) {
						// ... but if it has a featured image let's add some class
						$feature_class = 'feature-image small';

						// Hang on. Let's check this here image out.
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), array( HEADER_IMAGE_WIDTH, HEADER_IMAGE_WIDTH ) );
					}
					?>

					<section class="featured-post <?php echo $feature_class; ?>" id="featured-post-<?php echo $counter_slider; ?>">

						<?php
							/**
							 * If the thumbnail is as big as the header image
							 * make it a large featured post, otherwise render it small
							 */
							if ( has_post_thumbnail() ) {
								if ( $image[1] >= HEADER_IMAGE_WIDTH )
									$thumbnail_size = 'large-feature';
								else
									$thumbnail_size = 'small-feature';
								?>
								<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_post_thumbnail( $thumbnail_size ); ?></a>
								<?php
							}
						?>
						<?php get_template_part( 'content', 'featured' ); ?>
					</section>
				<?php endwhile;	?>
	
				<?php
					// Show slider only if we have more than one featured post.
					if ( $featured->post_count > 1 ) :
				?>
				<nav class="feature-slider">
					<ul>
					<?php

						// Reset the counter so that we end up with matching elements
				    	$counter_slider = 0;

						// Begin from zero
				    	rewind_posts();

						// Let's roll again.
				    	while ( $featured->have_posts() ) : $featured->the_post();
				    		$counter_slider++;
							if ( 1 == $counter_slider )
								$class = 'class="active"';
							else
								$class = '';
				    	?>
						<li><a href="#featured-post-<?php echo $counter_slider; ?>" title="<?php printf( esc_attr__( 'Featuring: %s', 'twentyeleven' ), the_title_attribute( 'echo=0' ) ); ?>" <?php echo $class; ?>></a></li>
					<?php endwhile;	?>
					</ul>
				</nav>
				<?php endif; // End check for more than one sticky post. ?>
	</div><!-- .featured-posts -->
	
		</div><!-- #home-bloco1 -->
		<div id="home-bloco2">
		<h1 class="showcase-heading"><a href="<?php echo home_url( '/category/cliques/' ); ?>">CLIQUES</a></h1>
					<?php
					 //Adiciona o query de Cliques de Fotos do Falante
					 get_template_part('loop-cliques');
					?>
		</div>								
			
		      <div id="separador"></div>
			<div id="home-bloco3">
					
			<h1 class="showcase-heading">MAT&Eacute;RIA EM DESTAQUE</h1>
			<?php show_post('home');  // Shows the content of "Home" page. ?>
			</div>
			
					<div id="home-bloco4">
		<h1 class="showcase-heading"><a href="<?php echo home_url( '/category/classificados/' ); ?>">CLASSIFICADOS</a></h1>
					<?php
					  // Adiciona o query de Classificados do Falante
					 get_template_part('loop-classificados');
					?>
		</div>
				<?php endif; // End check for published posts. ?>
				<?php endif; // End check for sticky posts. ?>	
			
				
			
		      <div id="separador"></div>
				
			</div><!-- #content.showcase -->
			
			<div id="sidebar-home">
				
				<div class="widget-area" role="complementary">
		
				<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>

<?php the_widget( 'Twenty_Eleven_Ephemera_Widget', '', array( 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );
						?>

					<?php endif; // end sidebar widget area ?>
				</div><!-- .widget-area -->
						
				</div> <!-- #sidebar-home -->
<?php get_footer(); ?>