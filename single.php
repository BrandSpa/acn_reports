<?php get_header() ?>

<div id="acn_int" class="bs-post" >

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php if(!empty(get_the_post_thumbnail_url($post->ID, 'full'))): ?>
	<?php require('templates/post_header_image.php') ?>
<?php else: ?>
	<?php require('templates/post_header.php') ?>
<?php endif; ?>

		<div id="post-content" class="l-wrap" style="margin-top: 40px">
		<div class="col-1-l sticky">
			<div
				class="bs-post-share"
				data-props='<?php echo json_encode($props) ?>'
			>
			</div>
		</div>
		<div class="col-6-l col-12-s post-text" style="word-wrap: break-word;">
			<?php the_content() ?>

			<div class="banner-horizontal">
			<?php if(get_lang() == 'en'): ?>
				<?php echo get_option('banner_horizontal_en') ?>
			<?php else: ?>
					<?php echo get_option('banner_horizontal_es') ?>
			<?php endif; ?>
			</div>
		</div>


		<div class="col-4-l banner-vertical">

			<?php if ( is_active_sidebar( 'post_widget_area' ) ) : ?>
					<?php dynamic_sidebar( 'post_widget_area' ); ?>
			<?php endif; ?>

			<?php if(get_lang() == 'en'): ?>
				<?php echo get_option('banner_vertical_en') ?>
			<?php else: ?>
				<?php echo get_option('banner_vertical_es') ?>
			<?php endif; ?>
		</div>

	</div>

	</div>

<?php require('templates/post_donate.php') ?>
	<div style="background:#f3f3f3">
		<div class="l-wrap" style="margin: 0 auto; padding: 40px 0">
			<h3 style="font-size: 28px; font-weight: normal; display: block; padding: 40px 12px;color: #3C515F"><?php echo gett('Latest news'); ?></h3>
			<?php require('templates/post_latest_2.php') ?>
		</div>
	</div>

  <?php endwhile; else : ?>
    <h2> <?php echo gett('404') ?> </h2>
  <?php endif; ?>
</div>

<script>
	onLoad(function() {
		console.log(window.innerWidth < '767');
		if(window.innerWidth < '767') {
			jQuery('.post-text').addClass('post-text--trim');
			jQuery('.post-text').append('<div class="post-text__see_more"><button><?php echo gett("Read more") ?></button>');

			jQuery(document).on('click', '.post-text__see_more > button', function() {
				jQuery('.post-text').removeClass('post-text--trim');
				jQuery(this).remove();
			});
		}

	})
</script>

<style>
.post-text--trim {
	overflow: hidden;
	height: 500px;
	position: relative;
}

.post-text__see_more {
	position: absolute;
	bottom: 0;
	left: 0;
	right: 0;
	margin: 0 auto;
	width: 100%;

	background: -moz-linear-gradient(top, rgba(30,87,153,0) 0%, rgba(255,255,255,1) 100%); /* FF3.6-15 */
	background: -webkit-linear-gradient(top, rgba(30,87,153,0) 0%,rgba(255,255,255,1) 100%); /* Chrome10-25,Safari5.1-6 */
	background: linear-gradient(to bottom, rgba(30,87,153,0) 0%,rgba(255,255,255,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#001e5799', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */
}

.post-text__see_more button {
	display: block;
	margin: 0 auto;
}

.sticky{
position: relative;
position: relative;
top: 2em;
}

@media (max-width: 991px) {
	.sticky{
		position: -webkit-sticky;
		position: sticky;
		top: 2em;
	}
}
</style>


<?php get_footer() ?>
