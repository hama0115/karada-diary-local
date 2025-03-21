<?php get_header(); //header.phpを読み込む ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); //タイトルを表示する?>
				</header><!-- .page-header -->

				<?php
				while ( have_posts() ) : //ループ開始
					the_post();
					
					get_template_part( 'template-parts/excerpt-diary' );
					
				endwhile; //ループ終了

				//前後のページへのリンク。
				the_posts_pagination( [
					'prev_text' => '&larr;',
					'next_text' => '&rarr;',
				] );

			//コンテンツが無い場合
			else :
				echo '記事はありません。';

			endif;
			?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); //footer.phpを読み込む