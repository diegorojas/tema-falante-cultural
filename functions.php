<?php

// Redefine o tamanho do Cabecalho
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyeleven_header_image_width', 250 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyeleven_header_image_height', 140 ) );


 /**
 * Register our sidebars and widgetized areas. Also register the default Epherma widget.
 *
 * @since Twenty Eleven 1.0
 */
function maracadmin_widgets_init() {

	register_widget( 'Twenty_Eleven_Ephemera_Widget' );

	register_sidebar( array(
		'name' => __( 'Widget Home', 'falanteadmin' ),
		'id' => 'sidebar-home',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}

// post thumbnail support
	if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
	if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'thumb-cliques', 300, 110, true );
}


// Muda o limite do the_excerpt no child theme do TwentyEleven
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return nl2br($excerpt);
    }
	
	
	  // Adiciona uma função para filtrar conteudo dos loops

function show_post($path) {
  $post = get_page_by_path($path);
  $content = apply_filters('the_content', $post->post_content);
  echo $content;
}

//Adiciona o custom POst Type Dicas
require_once (get_stylesheet_directory() . '/custom-dicas.php');

//Filtra a página index.php que roda o loop principal
function exclude_category($query) {

if ( $query->is_home() ) {
$query->set('cat', '-5 -2 -6 -3 -1');
}
return $query;
}
add_filter('pre_get_posts', 'exclude_category');



?>