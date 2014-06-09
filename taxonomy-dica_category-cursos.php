<?php
/*
Template da pagina dicas Culturais
 */

get_header(); ?>


<header id="category-header" class="dicas-culturais">
					<h1 class="category-title"><span>DICAS DE CURSOS</span></h1>
				</header>		
		
		<section id="primary">
			
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
				 <!-- Inicio Loop -->
        <?php
        $args = array(
                'dica_category' => 'cursos',
				'post_type' => 'dica',
                'posts_per_page' => 8, /* Quantidade de Posts a exibir */
                'order' => 'DESC', /* Ordem DESC > DECRESCENTE ou ASC > ACRESCENTE */
                );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); 
		?>       
        <div id="cada-dica">
			<div id="categoria-archive-titulo"> <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2></div>
				<?php if ( has_post_thumbnail()) { ?>
				<div class="thumb-cliques">
                    <a href="<?php the_permalink() ?>" rel="bookmark">
                    <?php the_post_thumbnail('thumb-cliques'); ?>
                    </a>
                </div>
                <?php } ?>
				<div id="conteudo-post">
				<?php echo excerpt( 38 ); ?>
				</div>
				<div id="leia-mais-categoria">
				<a href="<?php the_permalink() ?>">Leia mais</a>
				</div>
        </div><!-- #cada-dica -->

		<?php endwhile;	?>

	    <!-- Fim Loop -->
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
		<?php /* Display navigation to next/previous pages when applicable */ ?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
						<div id="nav-below-big" class="navigation">
							<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyten' ) ); ?></div>
							<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?></div>
						</div><!-- #nav-below -->
		<?php endif; ?>
			</div><!-- #content -->
					</section><!-- #primary -->

<?php get_footer(); ?>
