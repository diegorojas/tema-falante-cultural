<?php

if ( query_posts( array ( 'category_name' => 'classificados', 'posts_per_page' => 9)) ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<h1 class="entry-title-query"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

				<div id="entry-content-query">
						<a href="<?php the_permalink(); ?>" rel="bookmark" class="leia-mais"><span class="mais">Saiba Mais</span></a>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
				
				</div><!-- .entry-content-query -->
				
		</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>
