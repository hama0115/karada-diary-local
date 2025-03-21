<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
    <?php the_category(); ?> <!-- カテゴリーを表示 -->
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); //タイトルを表示 ?>
		<?php if ( is_singular( 'post' ) ) { //個別投稿の場合 ?>
			<span class="custom-date"><?php the_date( '' ); ?></span>  <!-- 投稿日を表示。表示形式は管理画面で指定。cssをつけたいためspanでクラス付与 -->
		<?php } //is_singlar( 'post' ) ?>
	</header><!-- .entry-header -->

	<figure class="post-thumbnail">
		<?php the_post_thumbnail(); //アイキャッチ画像を表示 ?>
	</figure><!-- .post-thumbnail -->

	<div class="entry-content">
		<?php
		the_content(); //本文を表示
		if( is_singular( 'post' ) && in_category( 'bookreview' ) ):
		?>
		<table>
			<tr><td>書籍名</td><td><?php echo esc_html( get_post_meta( $post->ID, '書籍名', true ) ); ?></td></tr>
			<tr><td>出版社</td><td><?php echo esc_html( get_post_meta( $post->ID, '出版社', true ) ); ?></td></tr>
			<tr><td>著者</td><td><?php
				$authors = get_post_meta( $post->ID, '著者', false );
				echo esc_html( implode( ', ', $authors ));
			?></td></tr>
			<tr><td>価格</td><td><?php echo esc_html( get_post_meta( $post->ID, '価格', true ) ); ?>円</td></tr>
		</table>
		<?php
		endif;
		?>

		<?php 
		wp_link_pages( //ページ分割を表示
			[
				'before' => '<div class="page-links">ページ:',
				'after'  => '</div>',
			]
		); ?>
		<?php if ( is_singular( 'post' ) ) { //個別投稿の場合のみカテゴリーとタグを表示するコード ?>
			<footer class="entry-footer">
				<?php the_tags( '<span class="tags-links">タグ: ', ', ', '</span>' ); //タグを表示 ?>
			</footer><!-- .entry-footer -->
		<?php } //is_singular( 'post' ) ?>
    <div class="other-article">
      <?php
      //同じ投稿者の記事を表示するコード↓
      if ( is_singular( 'post' ) ) { //個別投稿の場合
        $postid   = get_the_ID(); //投稿のIDを取得
        $authorid = get_the_author_meta( 'ID' ); //投稿者の情報を取得

        $args = [
          'posts_per_page' => 5,
          'author'         => $authorid,
          'orderby'        => 'rand',
          'exclude'        => $postid,
        ];

        $myposts = get_posts( $args ); //$argsの条件を満たすデータを取得する

        echo '<h3>ほかの記事</h3>';
        if ( $myposts ) :
          echo '<ul>';
          foreach ( $myposts as $post ) : //投稿を1つずつ取ってくる
            setup_postdata( $post ); //ループ内用のテンプレートタグを使えるようにする ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
          <?php endforeach;
          wp_reset_postdata(); //データを元に戻す
          echo '</ul>';
        else :
          echo '記事はありません';
        endif;
      } //is_singlar( 'post' ) ?>
    </div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->