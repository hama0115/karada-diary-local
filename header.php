<!doctype html>
<html <?php language_attributes(); //言語属性を表示 ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); //文字エンコーディングを表示 ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="profile" href="https://gmpg.org/xfn/11"/>

  <!-- googleフォント -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">

	<!-- adobeフォント -->
	<script>
  (function(d) {
    var config = {
      kitId: 'szi2nnk',
      scriptTimeout: 3000,
      async: true
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
	</script>

	<?php wp_head(); //ヘッダーに必ず書く ?>
</head>

<body <?php body_class(); //<body>にクラス属性を追加する ?>>
<?php wp_body_open(); //<body>直後に必ず書く。wp5.2以降で使用可能。wp5.1以前の場合はこの行を削除する ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content">コンテンツへスキップ</a>

	<header id="masthead" class="site-header">

	<div class="site-branding-container">
		<div class="site-branding">
			<?php if ( is_front_page() && is_home() ) : //トップページの場合 ?>
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<?php if ( has_nav_menu( 'menu-1' ) ) : //メニューがあるかどうか ?>
				<button class="btn-menu">メニュー</button>
				<nav id="site-navigation" class="main-navigation" aria-label="トップメニュー">
					<?php
					wp_nav_menu( //メニューを表示
						[
							'theme_location' => 'menu-1',
							'menu_class'     => 'main-menu',
						]
					);
					?>
				</nav><!-- #site-navigation -->
			<?php endif; ?>
		</div><!-- .site-branding -->
	</div><!-- .site-branding-container -->

	</header><!-- #masthead -->

	<div id="content" class="site-content">