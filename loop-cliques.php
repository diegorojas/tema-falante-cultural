<?php

if ( query_posts( array ( 'category_name' => 'cliques', 'posts_per_page' => 2)) ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<h1 class="entry-title-query"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

				<div id="entry-content-query">
				<?php if ( has_post_thumbnail()) { ?>
				<div class="thumb-cliques">
                    <a href="<?php the_permalink() ?>" rel="bookmark">
                    <?php the_post_thumbnail('thumb-cliques'); ?>
                    </a>
                </div>
                <?php } ?>
				
				</div><!-- .entry-content -->
			
				
		</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>
