<?php
/**
 * Category Custom Loop
 */
?>

        <div id="cada-post">
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
        </div><!-- #cada-post -->
