	<?php require('templates/footer_donate.php') ?>

  <a
    href="#"
    id="return-to-top"
     style="display: none;color: #fff; text-align: center; padding-top: 10px; position: fixed; bottom: 40px; right: 40px; background: rgba(0, 0, 0, .5); width: 40px; height: 40px; border-radius: 40px"
  >
    <i class="ion-chevron-up"></i>
  </a>

	<!--wordpress files-->
	  <?php wp_footer() ?>
	<!-- /wordpress files-->

	<!--async load app-->
	<script>
	  var bs = {};
		bs.currentPageLang = '<?php  if(function_exists("pll_current_language")) echo pll_current_language("name"); ?>'
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
<script src='<?php echo get_template_directory_uri() ?>/client/dist/vendor.js?v=<?php echo filemtime(get_template_directory() . '/client/dist/vendor.js') ?>'></script>
<script src='<?php echo get_template_directory_uri() ?>/client/dist/app.js?v=<?php echo filemtime(get_template_directory() . '/client/dist/app.js') ?>'></script>


<!--/app theme-->


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

</script>
<!-- End Google Analytics -->


</body>
</html>
