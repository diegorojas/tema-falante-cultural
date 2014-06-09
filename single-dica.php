<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>


<header id="category-header" class="dicas-culturais">
					<h1 class="category-title"><span>DICAS CULTURAIS</span><a href="<?php echo esc_url( home_url( '/' ) ); ?>/dica" class="link-voltar"><< Voltar</a></h1>
				</header>	

		<div id="primary">
		
		
				<?php echo '<div id="sidebar-categorias-dicas">';
				$args_list = array(
					'taxonomy' => 'dica_category', // Registered tax name
					'show_count' => true,
					'hierarchical' => true,
					'echo' => '0',
				);	 
				echo wp_list_categories($args_list);
				echo '</div>';?>
		
			<div id="content" class="dicas">

				<?php while ( have_posts() ) : the_post(); ?>


					<?php get_template_part( 'content', 'single' ); ?>

				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>