<?php

// CustomPostType Dicas
	add_action( 'init', 'register_cpt_dica' );

	function register_cpt_dica() {

    $labels = array( 
        'name' => _x( 'Dicas', 'dicas' ),
        'singular_name' => _x( 'Dica', 'dica' ),
        'add_new' => _x( 'Adicionar Nova', 'dica' ),
        'add_new_item' => _x( 'Adicionar Nova Dica', 'dica' ),
        'edit_item' => _x( 'Editar Dica', 'dica' ),
        'new_item' => _x( 'Nova Dica', 'dica' ),
        'view_item' => _x( 'Ver Dica', 'dica' ),
        'search_items' => _x( 'Procurar Dicas', 'dica' ),
        'not_found' => _x( 'N&atilde;o foram encontradas Dicas', 'dica' ),
        'not_found_in_trash' => _x( 'N&atilde;o foram encontradas Dicas na Lixeira', 'dica' ),
        'parent_item_colon' => _x( 'Dica Pai:', 'dica' ),
        'menu_name' => _x( 'Dicas', 'dicas' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'description' => 'Post Type da Dicas Culturais do Falante Cultural',
        'supports' => array( 'title', 'editor','thumbnail' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,   
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
		'taxonomies' => array('post_tag'),
        'capability_type' => 'post'
    );

    register_post_type( 'dica', $args );
	
		/**
		* Registrando as categorias Para Dicas Culturais
		*/
			register_taxonomy( 'dica_category', array( 'dica' ), array(
				'hierarchical' => true,
				'label' => __( 'Dicas' ),
				'labels' => array( // Labels customizadas
				'name' => _x( 'Categorias de Dicas', 'taxonomy general name' ),
				'singular_name' => _x( 'Dica', 'taxonomy singular name' ),
				'search_items' =>  __( 'Pesquisar Dicas' ),
				'all_items' => __( 'Todas as Dicas' ),
				'parent_item' => __( 'Parent Category' ),
				'parent_item_colon' => __( 'Parent Category:' ),
				'edit_item' => __( 'Editar Dica' ),
				'update_item' => __( 'Update Category' ),
				'add_new_item' => __( 'Adicionar Nova Categoria' ),
				'new_item_name' => __( 'Novo Nome da Categoria' ),
				'menu_name' => __( 'Categorias de Dicas' ),
			),
				'show_ui' => true,
				'show_in_tag_cloud' => true,
				'query_var' => true,
				'rewrite' => array(
					'slug' => 'dica_category',
					'with_front' => false,
				),
				)
			);
	
			flush_rewrite_rules();
	
	}
	// Fim CustomPostType Dicas
?>