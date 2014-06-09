<?php
/**
 * The Template for displaying all single posts.
 */
?>
			<?php if (in_category( 'classificados' ) ){ ?>
					<?php define('WP_USE_THEMES', false); get_header(); ?>
					<header id="category-header" class="classificados">
					<h1 class="category-title"><span>CLASSIFICADOS</span><a href="<?php echo esc_url( home_url( '/' ) ); ?>categoria/classificados/" class="link-voltar"><< Voltar</a></h1>
				</header>
				<div id="primary">
	
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single' ); ?>
					
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>

			<?php } elseif (in_category( 'materias' ) ){ ?>
			
			<?php define('WP_USE_THEMES', false); get_header(); ?>			
			<header id="category-header" class="materias">
					<h1 class="category-title"><span>MAT&Eacute;RIAS</span><a href="<?php echo esc_url( home_url( '/' ) ); ?>categoria/materias/" class="link-voltar"><< Voltar</a></h1>

				</header>
				
				<div id="primary">
	
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>


					<?php get_template_part( 'content', 'single' ); ?>
					
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>
				
				<?php } elseif (in_category( 'cliques' ) ){ ?>
				
				<?php define('WP_USE_THEMES', false); get_header(); ?>
				<header id="category-header" class="cliques">
					<h1 class="category-title"><span>CLIQUES</span><a href="<?php echo esc_url( home_url( '/' ) ); ?>categoria/cliques/" class="link-voltar"><< Voltar</a></h1>

				</header>
				
				<div id="primary">
	
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>


					<?php get_template_part( 'content', 'single' ); ?>
					
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>

				<?php } elseif (in_category( 'making-off' ) ){ ?>
				
				
		<?php define('WP_USE_THEMES', false); get_header(); ?>
				
				<div id="primary">
	
			<div id="content" class="blog-single">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', 'single-blog' ); ?>
					
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
		<?php get_sidebar(); ?>
<?php get_footer('semwidgets'); ?>			
				
				<?php } else { ?>
<?php get_header(); ?>
		<div id="primary">
	
			<div id="content" role="main">

				<?php while ( have_posts() ) : the_post(); ?>


					<?php get_template_part( 'content', 'single' ); ?>
					
				<?php endwhile; // end of the loop. ?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>
<?php } ?>