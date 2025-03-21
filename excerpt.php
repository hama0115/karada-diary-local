<article id="post-<?php the_ID(); //投稿IDを表示 ?>" <?php post_class(); //投稿のカテゴリーなどに基づきクラス属性を表示 ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="archive-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); //タイトルを表示 ?>
	</header><!-- .entry-header -->

	<figure class="post-thumbnail">
		<?php the_post_thumbnail(); //アイキャッチ画像を表示 ?>
	</figure><!-- .post-thumbnail -->

	<div class="entry-content">
		<?php the_excerpt(); //概要を表示 ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<span class="cat-links">カテゴリー: <?php the_category( ', ' ); //カテゴリーを表示 ?></span>
		<?php the_tags( '<span class="tags-links">タグ: ', ', ', '</span>' ); //タグを表示 ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->