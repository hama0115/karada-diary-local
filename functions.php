<?php
function sample_child_styles() {
	wp_dequeue_style( 'sampletheme-style' );
	wp_enqueue_style( 'sampletheme-parent-style', get_template_directory_uri() . '/style.css', [], wp_get_theme()->get( 'Version' ) );
	wp_enqueue_style( 'sampletheme-child-style', get_stylesheet_uri(), ['sampletheme-parent-style'], wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'sample_child_styles', 11 );

function sample_child_setup() {
	remove_filter( 'body_class', 'sampletheme_body_classes' );
}
add_action( 'after_setup_theme', 'sample_child_setup' );


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

/* とりあえず無効化
//スクリプト、スタイルシートを追加する
function sampletheme_scripts() {
	wp_enqueue_style( 'sampletheme-style', get_stylesheet_uri(), [], wp_get_theme()->get( 'Version' ) );

	if ( has_nav_menu( 'menu-1' ) ) {
		wp_enqueue_script( 'sampletheme-touch-navigation', get_theme_file_uri( '/js/touch-keyboard-navigation.js' ), [], '1.1', true );
		wp_enqueue_script( 'toggle-menu-button', get_theme_file_uri( '/js/toggle-menu.js' ), [], '1.1', true );
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sampletheme_scripts' );
*/