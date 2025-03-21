<?php get_header(); //header.phpを読み込む ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php //フロントページに指定した固定ページを表示するメインループを開始 
      if ( have_posts() ) : ?>

				<?php
				while ( have_posts() ) : the_post();//ループ開始
          get_template_part( 'content' ); //コンテンツを表示するテンプレートを読み込む
					
				endwhile; //ループ終了

			//コンテンツが無い場合
			else :
				echo '記事はありません。';

			endif;
			?>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); //footer.phpを読み込む