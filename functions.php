<?php
function sample_child_styles() { //子テーマのCSSを読み込む
	wp_dequeue_style( 'sampletheme-style' );
	wp_enqueue_style( 'sampletheme-parent-style', get_template_directory_uri() . '/style.css', [], wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'sampletheme-child-style', get_stylesheet_uri(), ['sampletheme-parent-style'], wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'sample_child_styles', 11 );

function sample_child_setup() {
	remove_filter( 'body_class', 'sampletheme_body_classes' );
}
add_action( 'after_setup_theme', 'sample_child_setup' );

function enqueue_child_scripts() {
	if( is_front_page()) {
		wp_enqueue_style( 'front-page-style', get_stylesheet_directory_uri() . '/assets/css/front-page.css' );
	}
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_scripts' );


function sample_child_body_classes( $classes ) {
	if ( is_singular( 'post' ) ) { //処理の変更例：個別投稿の場合に「singular-post」クラスを追加
		$classes[] = 'singular';
		$classes[] = 'singular-post';
	} elseif ( is_singular() ) { 
		$classes[] = 'singular';
	} else {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'sample_child_body_classes' );

function add_front_page_class( $classes ) {
	if ( is_front_page() ) { //フロントページの場合に「front-page」クラスを追加
		$classes[] = 'front-page';
	}
	return $classes;
}
add_filter( 'body_class', 'add_front_page_class' );