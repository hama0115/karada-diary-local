<?php get_header(); //header.phpを読み込む ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			while ( have_posts() ) :  //ループ開始
				the_post();

				get_template_part( 'content' );
				if ( comments_open() || get_comments_number() ) { //コメントを受け付けている、または、コメントがある ?>
					<div id="comments" class="comments-area">
					<?php comments_template(); //コメントテンプレートを読み込む ?>
					</div><!-- #comments --><?php
				}

				if ( is_singular( 'post' ) ) { //個別投稿の場合
					the_post_navigation( [ //前後の投稿へのリンク
						'prev_text' => '<span class="post-title">< 前の記事へ</span>',
						'next_text' => '<span class="post-title">後の記事へ ></span>',
					] );
				}
			endwhile; //ループ終了
			?>
		</main><!-- #main -->
	</section><!-- #primary -->
<?php get_footer(); //footer.phpを読み込む