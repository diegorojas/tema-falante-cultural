sos<?php
/**
 * Template name: Pagina Inicial
 * @package WordPress
 * @subpackage Tema Falante Cultural
 */

get_header(); ?>
						<div id="content" class="home">
								
							<div id="home-bloco1">
							<h1 class="home-heading"><a href="<?php echo home_url( '/dica/' ); ?>" class="dicas-heading">DICAS CULTURAIS</a></h1>
				<div class="ph-box">
				
					<?php if(function_exists("insert_post_highlights")) insert_post_highlights(); ?>				
							
				</div><!-- .featured-posts -->
				
					</div><!-- #home-bloco1 -->
					<div id="home-bloco2">
					<h1 class="home-heading"><a href="<?php echo home_url( '/categoria/cliques/' ); ?>" class="cliques-heading">CLIQUES</a></h1>
								<?php
								 //Adiciona o query de Cliques de Fotos do Falante
								 get_template_part('loop-cliques');
								?>
					</div>								
						  <div id="separador"></div>
						<div id="home-bloco3">
								
						<h1 class="home-heading ">MAT&Eacute;RIA EM DESTAQUE</h1>
						<?php show_post('home');  // Shows the content of "Home" page. ?>
						<h1 class="home-heading "><a href="<?php echo home_url( '/categoria/materias/' ); ?>" class="materias-heading">VER TODAS AS MAT&Eacute;RIAS</a></h1>
						</div>
						
								<div id="home-bloco4">
					<h1 class="home-heading"><a href="<?php echo home_url( '/categoria/cursos-livres/' ); ?>" class="classificados-heading">CURSOS LIVRES</a></h1>
								<?php
								  // Adiciona o query de Classificados do Falante
								 get_template_part('loop-cursoslivres');
								?>
								<h1 class="home-heading "><a href="<?php echo home_url( '/categoria/cursos-livres/' ); ?>" class="classificados-heading">VER TODOS</a></h1>
					</div>
	
												
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
