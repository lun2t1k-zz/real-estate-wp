<?php
add_action('wp_enqueue_scripts', 'realestate_scripts');

function realestate_scripts()
{
  wp_enqueue_style('main', get_template_directory_uri() . '/css/style.min.css');
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.min.js', array(), '1.0.0', true);
}

add_theme_support( 'custom-logo', [
	'height'      => 50,
	'width'       => 160,
	'flex-width'  => false,
	'unlink-homepage-logo' => false,
] );

add_theme_support( 'post-thumbnails' );

add_action('init', 'realestate_init');
function realestate_init(){
	register_post_type('reviews', array(
		'labels'             => array(
			'name'               => 'Отзывы',
			'singular_name'      => 'Отзыв',
			'add_new'            => 'Добавить новый',
			'add_new_item'       => 'Добавить новый отзыв',
			'edit_item'          => 'Редактировать отзыв',
			'new_item'           => 'Новый отзыв',
			'view_item'          => 'Посмотреть отзыв',
			'search_items'       => 'Найти отзыв',
			'not_found'          => 'Отзывов не найдено',
			'not_found_in_trash' => 'В корзине отзывов не найдено',
			'parent_item_colon'  => '',
			'menu_name'          => 'Отзывы'

		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'menu_icon'          => 'dashicons-format-status',
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array('title','editor','author','thumbnail','excerpt')
	) );
}