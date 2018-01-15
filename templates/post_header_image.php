
<div class="l-wrap">
	<div class="single_post-title">
			<h1 style="font-weight: 900;"><?php the_title() ?></h1>
			<div class="breadcrumbs" style="margin: 3px 0 10px 0;  color: #b9b9b9;font-style: italic;" typeof="BreadcrumbList" vocab="https://schema.org/">
				<?php if(function_exists('bcn_display')) { bcn_display(); }?>
			</div>
			<span class="video__header__metadata" style=" font-size: 0.9em; color: #ABABAB;">
				<i class="icon ion-android-calendar" style="font-size: 16px; line-height: 15px;color: #000;"></i> <?php echo '' . get_the_date( 'Y-m-d ', $post->ID ); ?>
				<b style="margin-left:1em; color:#525252;">Tags: </b><?php foreach(get_the_tags($post->ID) as $ind => $tags): ?>
					<span style="font-weight: 300;">
						<?php echo $tags->name ?> <?php echo $ind >= 0 && $ind + 1 != count( get_the_tags($post->ID)) ?  ',' : '' ?>
					</span>
				<?php endforeach; ?>
				
			</span>
	</div>
</div>