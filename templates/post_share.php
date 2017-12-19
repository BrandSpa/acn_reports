
<?php $current_url = str_replace('//', 'https://', esc_url($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])); ?>
<span style="text-align: center; font-size: 20px; color: #3C515F; display:block; margin: 40px auto"> <?php echo gett('¿Quiéres que el mundo conozca la realidad de la Iglesia que Sufre en el Mundo?') ?></span>

<div class="bs-post__share" style="background: #F7F7F7">
	<div class="l-wrap" style="text-align: center">
	 <span style="display: inline-block;font-size: 20px;color: #3C515F;"><?php echo gett('Comparte este artículo'); ?></span>

		<ul style="display: inline-block">
			<li style="display: inline-block; margin-right: 15px">
      	<a key={1} style="color: #939597; width: 40px; height: 40px; border-radius: 40px; text-align: center; display: block; border: 1px solid #939597; padding: 5px; font-size: 20px;" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url ?>">
        	<i class="ion-social-facebook"></i></a>
      </li>
			<li style="display: inline-block; margin-right: 15px">
				<a key={2} style="color: #939597;
			width: 40px;
			height: 40px;
			border-radius: 40px;
			text-align: center;
			display: block;
			border: 1px solid #939597;
			padding: 5px;
      font-size: 20px;" href="https://twitter.com/intent/tweet?text=<?php echo $current_url ?>">
					<i class="ion-social-twitter"></i></a>
			</li>
			<li style="display: inline-block; margin-right: 15px">
				<a key={3} style="	color: #939597;
			width: 40px;
			height: 40px;
			border-radius: 40px;
			text-align: center;
			display: block;
			border: 1px solid #939597;
			padding: 5px;
      font-size: 20px;" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $current_url ?>">
					<i class="ion-social-linkedin"></i></a>
			</li>
			<li style="display: inline-block; margin-right: 15px">
				<a key={4} style="	color: #939597;
					width: 40px;
					height: 40px;
					border-radius: 40px;
					text-align: center;
					display: block;
					border: 1px solid #939597;
					padding: 5px;
					font-size: 20px;" href="whatsapp://send?text=<?php echo $current_url ?>">
					<i class="ion-social-whatsapp-outline"></i>
				</a>
			</li>
		</ul>
	</div>
</div>
