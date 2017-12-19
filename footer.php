	<?php require('templates/footer.php') ?>
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
<script src="<?php echo get_template_directory_uri() ?>/client/dist/vendor.js?v=<?php echo filemtime(get_template_directory() . '/client/dist/vendor.js') ?>">
</script>
<script src="<?php echo get_template_directory_uri() ?>/client/dist/app.js?v=<?php echo filemtime(get_template_directory() . '/client/dist/app.js') ?>
">
</script>
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

<!--olark-->

<script type="text/javascript" async>
;(function(o,l,a,r,k,y){if(o.olark)return;
r="script";y=l.createElement(r);r=l.getElementsByTagName(r)[0];
y.async=1;y.src="//"+a;r.parentNode.insertBefore(y,r);
y=o.olark=function(){k.s.push(arguments);k.t.push(+new Date)};
y.extend=function(i,j){y("extend",i,j)};
y.identify=function(i){y("identify",k.i=i)};
y.configure=function(i,j){y("configure",i,j);k.c[i]=j};
k=y._={s:[],t:[+new Date],c:{},l:a};
})(window,document,"static.olark.com/jsclient/loader.js");
/* Add configuration calls bellow this comment */
olark.identify('2850-621-10-4118');</script>

<!--/olark-->


</body>
</html>
