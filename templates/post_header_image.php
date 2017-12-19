<!--<div class="bs-post__header--image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>)">
	<div class="bs-post__header--image__title">
		<h3 style="padding-bottom: 20px; border-bottom: 1px solid #D3D3D3"><?php the_title() ?></h3>
		<a style="display: block; margin: 0 auto; width: 20px" href="#post-content">
			<?php //require('down_arrow.php') ?>
		</a>
	</div>
</div> -->

<div class="bs-post__header--image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>)">
	
		<div class="l-wrap">
		<div class="single__header-title">
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
			<?php require('down_arrow.php')?>
		</a>
	</div>
	</div>
	<script>
		/*onLoad(function() {
			console.log("working!!");
			var h = window.innerHeight;
			var navH = $('.nav').height() + 20;
			var titleH = $('.single__header-title').innerHeight();
		
			if(window.innerWidth > '700') {
				$('.single__header-title').css({position: 'relative', marginTop: '-' + titleH + 'px'});
			}
		});*/
	</script>
</div>


	<!-- <div class="bs-post__header--image__title--mobile">
		<h3><?php the_title() ?></h3>
		<a style="display: block; margin: 0 auto; width: 20px" href="#post-content">
				<?php //require('down_arrow.php') ?>
		</a>
	</div> -->
