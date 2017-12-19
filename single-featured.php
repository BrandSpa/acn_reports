<?php get_header() ?>

<div id="acn_int" class="bs-post" >

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
<div class="bs-post__header--image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>); background-attachment: fixed">
    <div class="bs-feat__img__textbox" style="">
        <div class="news_date" style="color:#FFF;">
        <span class="featured__metadata" style="font-weight:600; font-size:18px; color:#eaeaea line-height:1.28; text-align:left;">
				<?php foreach(get_the_category($post->ID) as $ind => $category): ?>
					<span style="">
						<?php echo $category->name ?> <?php echo $ind >= 0 && $ind + 1 != count(get_the_category($post->ID)) ?  '|' : '' ?>
					</span>
				<?php endforeach; ?>
				<?php echo '/ ' . get_the_date( 'M Y', $post->ID ); ?>
			</span>
        </div>
        <div class="breadcrumbs" style=" color: #e1e1e1; text-align:left; font-size:15px; margin:0;" typeof="BreadcrumbList" vocab="https://schema.org/">
        <?php if(function_exists('bcn_display'))
        {
         bcn_display();
        }?>
        </div>
        <h3 style="color:#FFF; font-size:40px; line-height:1.05; margin:40px 0;"><?php the_title(); ?></h3>
    </div> 
    <a class="bs-down-btn"  href="#post-content" style="display:block; margin:auto; position:absolute; bottom:10px; left:0; right:0">
			<?php require(__DIR__. '/templates/down_arrow.php')?>
	</a>
</div>

	<!--<div class="bs-post__header--image__title--mobile">
		<h3><?php the_title() ?></h3>
		<a style="display: block; margin: 0 auto; width: 20px" href="#post-content">
				<?php //require('down_arrow.php') ?>
		</a>
	</div>-->


<div class="l-wrap">
	<!--<div class="breadcrumbs" style="margin-top: 20px; text-align: center; color: #b9b9b9" typeof="BreadcrumbList" vocab="https://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
       // bcn_display();
    }?>
</div>-->

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


<script>
    onLoad(function() {
        $('.bs-post__header--image').css('height', '100vh');
        function changeColor() {
            $('body').css('padding', 0);
            $('.nav').css('transition', 'all 300ms');
            $('.nav').css('background-color', 'transparent');
            $('.nav li > a').css('color', '#FFF');
            $('.nav img').css('filter', 'grayscale(100%) invert(100%)');
        }
        
       changeColor();

        window.addEventListener('scroll', function() {
            
            if(document.querySelector('.bs-post__header--image').getBoundingClientRect().bottom < 0 ) {
                $('.nav').css('background-color', '#fff');
                $('.nav img').css('filter', 'none');
                $('.nav li > a').css('color', ' #3C515F');
            }

             if(document.querySelector('.bs-post__header--image').getBoundingClientRect().bottom > 0) {
                changeColor();
            }
		});
    });

</script>

<?php get_footer() ?>
