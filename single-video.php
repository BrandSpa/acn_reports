<?php get_header() ?>

<div id="acn_int" class="bs-post" >
<!--video template-->
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php if(get_post_meta($post->ID, 'video_url_key', true)): ?>

<!--this call react component-->
<div class="bs-video-header" data-props='{
	"imageUrl": "<?php echo the_post_thumbnail_url( 'full' )  ?>",
	"videoUrl": "<?php echo get_post_meta($post->ID, 'video_url_key', true) ?>"
}'></div>

	<div class="l-wrap">
		<div class="video__header-title">
			<span class="video__header__metadata" style="font-size: 1.1em; color: #4A4A4A">
				<?php foreach(get_the_category($post->ID) as $ind => $category): ?>
					<span style="font-weight: 600">
						<?php echo $category->name ?> <?php echo $ind >= 0 && $ind + 1 != count(get_the_category($post->ID)) ?  '|' : '' ?>
					</span>
				<?php endforeach; ?>
				<?php echo '/ ' . get_the_date( 'm - Y', $post->ID ); ?>
			</span>
			<div class="breadcrumbs" style="margin: 3px 0 10px 0;  color: #b9b9b9" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php if(function_exists('bcn_display')) { bcn_display(); }?>
		</div>

		<h3 style="padding-bottom: 10px;color: #3C515F"><?php the_title() ?></h3>
		<a style="display: block; margin: 0 auto; width: 20px" href="#post-content">
			<?php require(__DIR__. '/templates/down_arrow.php')?>
		</a>
	</div>

</div>

	<script>
		onLoad(function() {
			var h = window.innerHeight;
			var navH = $('.nav').height() + 20;
			var titleH = $('.video__header-title').innerHeight();

			if(window.innerWidth > '700') {
				$('.video__header-title').css({position: 'relative', marginTop: '-' + titleH + 'px'});
			}
		});
	</script>
<?php endif; ?>

	<div id="post-content" class="l-wrap" style="margin-top: 80px">
		<div class="col-1-l"></div>
		<div class="col-5-l col-12-s" style="word-wrap: break-word;">
			<?php the_content() ?>
			<div class="banner-horizontal">
			<?php if(get_lang() == 'en'): ?>
				<a href="<?php echo get_option('banner_url_en') ?>">
					<?php echo get_option('banner_horizontal_en') ?>
				</a>
			<?php else: ?>
				<a href="<?php echo get_option('banner_url_es') ?>">
					<?php echo get_option('banner_horizontal_es') ?>
				</a>
			<?php endif; ?>
			</div>
		</div>

		<div class="col-2-l"></div>

		<div class="col-3-l banner-vertical">
			<?php if(get_lang() == 'en'): ?>
				<a href="<?php echo get_option('banner_url_en') ?>">
					<?php echo get_option('banner_vertical_en') ?>
				</a>
			<?php else: ?>
				<a href="<?php echo get_option('banner_url_es') ?>">
					<?php echo get_option('banner_vertical_es') ?>
				</a>
			<?php endif; ?>
		</div>

	</div>

	<?php require('templates/post_share.php') ?>
	<?php require('templates/post_donate.php') ?>


	<div class="l-wrap" style="margin: 40px auto">
		<h3 style="font-size: 28px; font-weight: normal; display: block; margin: 40px 0;color: #3C515F"><?php echo gett('Latest news'); ?></h3>
		<?php require('templates/post_latest.php') ?>
	</div>

  <?php endwhile; else : ?>
    <h2> <?php echo gett('404') ?> </h2>
  <?php endif; ?>
</div>

<?php get_footer() ?>
