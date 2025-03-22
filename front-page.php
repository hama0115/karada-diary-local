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

      <section class="latest-posts"> <!-- 最新の記事を取得するサブループ開始 -->
        <?php
        $args = array(
          'post_type' => 'post', //通常の「投稿」を取得
          'posts_per_page' => '3',
        );
        $new_query = new WP_Query($args);
        if ( $new_query->have_posts() ) : ?>

          <header class="page-header">
            <h2 class="page-title">最新記事</h2><!-- フロントページのためh2 -->
          </header>

        <?php
        while ( $new_query->have_posts() ) : $new_query->the_post(); //ループ開始
          
          get_template_part( 'excerpt' ); //コンテンツを表示するテンプレートを読み込む
          
        endwhile; //ループ終了
        wp_reset_postdata();

        //前後のページへのリンク
        the_posts_pagination( [
          'prev_text' => '&larr;',
          'next_text' => '&rarr;',
        ] );

        //コンテンツが無い場合
        else :
        echo '記事はありません。';

        endif;	?>
      </section>

      <section class="diary-posts"> <!-- カスタム投稿タイプ(「日記」)を取得するサブループ開始 -->
        <?php
        $args = array(
          'post_type' => 'diary',
          'posts_per_page' => '6',
        );
        $new_query = new WP_Query($args);
        if ( $new_query->have_posts() ) : ?>

          <header class="page-header">
          <h2 class="page-title">日々の日記</h2><!-- フロントページのためh2 -->
          </header>

        <?php
        while ( $new_query->have_posts() ) : $new_query->the_post(); //ループ開始
          
          get_template_part( 'template-parts/excerpt-onlyheader' ); //コンテンツを表示するテンプレートを読み込む
          
        endwhile; //ループ終了
        wp_reset_postdata();

        //前後のページへのリンク
        the_posts_pagination( [
          'prev_text' => '&larr;',
          'next_text' => '&rarr;',
        ] );

        //コンテンツが無い場合
        else :
        echo '記事はありません。';

        endif;	?>
      </section>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_footer(); //footer.phpを読み込む