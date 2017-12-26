<?php
 header('Access-Control-Allow-Origin: *');
 $homeUrl =  function_exists(' pll_home_url') ?  pll_home_url() : '/';
 $permalink = get_permalink();

  if(function_exists('pll_home_url') && $homeUrl == $permalink) {
    redirectToLang();
  }
 ?>

<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, user-scalable=0">
  <meta name="theme-color" content="#f1364e">
  <meta property="title" content="<?php echo get_the_title(); ?>" />

  <meta property="og:title" content="Aid to the Church in Need - <?php echo get_the_title(); ?>" />
  <meta property="og:url" content="<?php echo the_permalink() ?>" />
  <meta property="og:image" content="<?php echo get_the_post_thumbnail_url() ?>" />
  <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?php echo get_the_title(); ?>">
  <meta name="twitter:image" content="<?php echo get_the_post_thumbnail_url() ?>">
  <meta name="twitter:description" content="<?php echo get_the_excerpt(); ?>" />

  <link rel="icon" href="//acninternational.org/wp-content/uploads/2017/03/fav2x.png" sizes="32x32" />
  <link rel="icon" href="//acninternational.org/wp-content/uploads/2017/03/fav2x.png" sizes="192x192" />

  <link rel="apple-touch-icon-precomposed" href="//acninternational.org/wp-content/uploads/2017/03/fav2x.png" />
	<title><?php echo bloginfo( 'name' ) ?> / <?php echo bloginfo( 'description' ) ?> <?php echo wp_title(); ?></title>

  	<!--wordpress files-->
	  <?php wp_head(); ?>
		<!-- /wordpress files-->

  <script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/client/dist/app.css?v=<?php echo filemtime(get_template_directory() . '/client/dist/app.css') ?>">
	<link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<script>
      function onLoad(cb) {
        if (window.addEventListener)
          window.addEventListener("load", cb, false);
        else if (window.attachEvent) {
          window.attachEvent("onload", cb);
        } else {
          window.onload = cb;
        }
      }

  </script>

  <!-- ConvertLoop -->
  <script>
    !function(t,e,n,s) { t.DPEventsFunction=s,t[s]=t[s] || function() { (t[s].q=t[s].q||[]).push(arguments) }; var c=e.createElement("script"),o=e.getElementsByTagName("script")[0]; c.async=1,c.src=n,o.parentNode.insertBefore(c,o); }(window, document, "https://www.convertloop.co/v1/loop.min.js", "_dp");

    _dp("configure", { appId: "746fffe4" });
    _dp("pageView");
  </script>
  <!-- End ConvertLoop -->

</head>
<body>

<?php if(get_option('gta_id')): ?>
<!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_option('gta_id') ?>"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','<?php echo get_option('gta_id') ?>');</script>
  <!-- End Google Tag Manager -->

<?php endif; ?>

<?php require('templates/nav.php') ?>
