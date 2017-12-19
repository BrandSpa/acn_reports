<script>
  var bs = {};
  bs.currentPageLang = '<?php  if(function_exists("pll_current_language")) echo pll_current_language("name"); ?>';
  bs.country = '<?php echo getCountry() ?>';
  bs.lang = '<?php echo getCountryLang(getCountry()) ?>';
  bs.donate = '<?php echo gett('Donate') ?>';
  bs.pid = '<?php echo isset($_COOKIE['dp_pid']) ? $_COOKIE['dp_pid'] : ''  ?>';
  onLoad(function() {
		mitt.emit("run:events");
	})
</script>
<!-- sentry. handle errors -->
<script src="https://cdn.ravenjs.com/3.20.1/raven.min.js"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src='<?php echo get_template_directory_uri() ?>/client/dist/vendor.js?v=<?php echo filemtime(get_template_directory() . '/client/dist/vendor.js') ?>'></script>
<script src='<?php echo get_template_directory_uri() ?>/client/dist/app.js?v=<?php echo filemtime(get_template_directory() . '/client/dist/app.js') ?>'></script>

<script
  src="<?php echo get_template_directory_uri() ?>/client/dist/vendor_me.js?v=<?php echo filemtime(get_template_directory() . '/client/dist/vendor_me.js') ?>"></script>
<script
  src="<?php echo get_template_directory_uri() ?>/client/dist/app_me.js?v=<?php echo filemtime(get_template_directory() . '/client/dist/app_me.js') ?>"></script>

  <!-- Google Analytics -->
   <script src='https://www.google-analytics.com/analytics.js'></script>

   <script>
   window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;

   ga('create', '<?php echo get_option('analytics_id') ?>', 'auto');
   ga('send', 'pageview');
   ga('require', 'ecommerce');

   <?php if(isset($_GET['customer_id']) && isset($_GET['order_revenue'])): ?>
     ga('ecommerce:addTransaction', {
       id: "<?php echo $_GET['customer_id'] ?>",
       revenue: "<?php echo $_GET['order_revenue'] ?>",
 			currency: 'USD',
     });

     ga('ecommerce:send');
   <?php endif; ?>

   <?php if(isset($_GET['event_action']) && isset($_GET['event_category']) && isset($_GET['event_label'])): ?>
    ga('send', 'event', <?php echo $_GET['event_category'] ?>,  <?php echo $_GET['event_action'] ?>,  <?php echo $_GET['event_label'] ?>);
  <?php endif; ?>

  <?php if(isset($_GET['ga_action']) && isset($_GET['ga_category']) && isset($_GET['ga_label'])): ?>
   ga('send', 'event', <?php echo $_GET['ga_category'] ?>, <?php echo $_GET['ga_action'] ?>, <?php echo $_GET['ga_label']?>);
 <?php endif; ?>

 <?php if(isset($_GET['fa_action']) && isset($_GET['ga_category']) && isset($_GET['ga_label'])): ?>
   ga('send', 'event', <?php echo $_GET['ga_category'] ?>, <?php echo $_GET['ga_action'] ?>, <?php echo $_GET['ga_label'] ?>);
 <?php endif; ?>

 </script>

 <!-- End Google Analytics -->

</body>
</html>
