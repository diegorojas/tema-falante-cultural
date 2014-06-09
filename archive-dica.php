<?php
/*
Template da pagina dicas Culturais
 */

get_header(); ?>


<header id="category-header" class="dicas-culturais">
					<h1 class="category-title"><span>DICAS CULTURAIS</span></h1>

					<div class="category-archive-meta">
					<?php show_post('dicas');  // Shows the content of "Dicas" page. ?>
					</div>
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
                'post_type' => 'dica',
                'posts_per_page' => 20, /* Quantidade de Posts a exibir */
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
				<?php // Aqui estamos a procura de uma função de paginação de taxonomias no twentyeleven ?>
			</div><!-- #content -->
					</section><!-- #primary -->

<?php get_footer(); ?>
