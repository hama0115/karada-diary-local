</div><!-- #content -->

<footer id="colophon" class="site-footer">
  <?php if ( is_active_sidebar( 'footer' ) ) : //ウィジェットがあるかどうか ?>
    <aside class="widget-area" role="complementary" aria-label="フッター">
      <div class="widget-column footer-widget-1">
        <?php dynamic_sidebar( 'footer' ); //ウィジェットを出力 ?>
      </div>
    </aside><!-- .widget-area -->
  <?php endif; ?>
  <div class="site-info">
    <p><?php bloginfo( 'name' ); //サイト名を表示 ?> All right reserved.</p>
    <?php the_privacy_policy_link(); //プライバシーポリシーページへのリンクを表示 ?>
  </div><!-- .site-info -->
</footer><!-- #colophon -->

</div><!-- #page -->
<?php wp_footer(); //フッターに必ず書く ?>

</body>
</html>