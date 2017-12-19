<?php

function acn_fullpage_sc( $atts, $content ) {
	$at = shortcode_atts([
		"unique_name" => "fullpage",
		"story_name" => '',
		"link_privacy" => '#',
		"text_privacy" => 'Privacy',
		"link_terms" => '#',
		"text_terms" => 'terms',
		"link_lang" => '#',
		"text_lang" => 'español',
		"link_lang_2" => '',
		"text_lang_2" => '',
		"link_lang_3" => '',
		"text_lang_3" => '',
		"text_donate" => 'Donate',
		"text_about" => "About ACN",
		"link_donate" => '#',
		"text_pray" => 'Pray',
		"link_pray" => '#',
		"links" => "",
		"intro" => "",
		"titles" => "",
		"show_intro" => false,
		"call-us-title" => "Llámanos al",
		"call-us-num" => "91 725 92 12"
	], $atts);

	$current_url = str_replace('http://', 'https://', esc_url($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
	$links = empty(vc_param_group_parse_atts($at['links'])) ? [] : vc_param_group_parse_atts($at['links']);
	$intro = empty(vc_param_group_parse_atts($at['intro'])) ? [] : vc_param_group_parse_atts($at['intro']);
	$titles = empty(vc_param_group_parse_atts($at['titles'])) ? [] : vc_param_group_parse_atts($at['titles']);
	$introCount = count($intro);

	function get_delay($a, $b) {
		return ($a['delay'] + $a['duration']) + ($b['delay'] + $b['duration']) * 1000;
	}

	$introDelay = array_reduce($intro, 'get_delay', 0);

	ob_start();
?>

	<div id="fullpage">
		<?php echo do_shortcode($content) ?>
	</div>

	<div class="indicator">

		<svg width="81px" height="77px" viewBox="0 0 91 87" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
		    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
		        <g id="Menu-Caps" transform="translate(-70.000000, -840.000000)">
		            <circle id="Oval-3-Copy" fill="#FFFFFF" cx="143" cy="858" r="18"></circle>
		            <text id="3" font-family="OpenSans-Semibold, Open Sans" font-size="18" font-weight="500" letter-spacing="-0.204545438" fill="#000000">
		                <tspan x="138.465066" y="865"  class="indicator__index">1</tspan>
		            </text>
		            <text id="2" font-family="OpenSans-Light, Open Sans" font-size="40" font-weight="300" letter-spacing="-0.454545408" fill="#FFFFFF">
		                <tspan x="106.811257" y="904" class="indicator__story">1</tspan>
		            </text>
		            <g id="Group-4" transform="translate(72.000000, 880.000000)" stroke="#FFFFFF" stroke-width="3" stroke-linecap="square">
		                <path d="M24,1 L0,1" id="Line"></path>
		                <path d="M24,10 L0,10" id="Line-Copy-5"></path>
		                <path d="M24,19 L0,19" id="Line-Copy-6"></path>
		            </g>
		            <path d="M95,867.857708 C108.097683,854.775218 129.333601,854.775218 142.431283,867.857708 C155.528966,880.940198 155.528966,902.151483 142.431283,915.233973 C129.333601,928.316463 108.097683,928.316463 95,915.233973" id="Stroke-1" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round"></path>
		        </g>
		    </g>
		</svg>

		<div class="indicator__title"><?php echo $at['story_name'] ?></div>
	</div>
	<div class="call-us">
		<span class="call-us-title"><?php echo $at['call-us-title'] ?></span>
		<span class="call-us-num"><?php echo $at['call-us-num'] ?></span>
	</div>
		<ul class="fullpage__menu">
			<li>
				<a class="fullpage-donate bs-donate" href="<?php echo $at['link_donate'] ?>">
					<svg width="19px" height="16px" viewBox="0 0 19 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
					    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					        <g id="Menu" transform="translate(-1426.000000, -72.000000)" stroke="#FFFFFF" fill-rule="nonzero" fill="#FFFFFF">
					            <path d="M1435.30627,87 C1434.6536,87 1434.04683,86.7415784 1433.59557,86.2718366 L1428.27736,80.7367765 C1427.34935,79.7718327 1426.89171,78.4402612 1427.02174,77.0832295 C1427.15049,75.7414739 1427.85032,74.5295656 1428.94277,73.7555737 C1430.67259,72.5322083 1433.0589,72.8186362 1434.61409,74.4391817 L1435.33941,75.1940783 L1436.15652,74.3449787 C1437.07051,73.391492 1438.33378,72.9077471 1439.63529,73.0286834 C1440.94189,73.1458006 1442.12358,73.8663259 1442.87695,75.0018534 C1444.05226,76.7738873 1443.77181,79.2397133 1442.21153,80.8653508 L1437.01825,86.2705636 C1436.56571,86.7415784 1435.95894,87 1435.30627,87 Z M1431.32908,74.276236 C1430.74653,74.276236 1430.17417,74.4468197 1429.67957,74.7956253 C1428.87776,75.362116 1428.38443,76.2175807 1428.29138,77.2041657 C1428.19705,78.1907507 1428.52848,79.1582405 1429.19772,79.8558516 L1434.51466,85.3909117 C1434.93277,85.8250091 1435.67977,85.8250091 1436.09788,85.3909117 L1441.2899,79.9856989 C1442.44099,78.7865207 1442.66152,76.9864805 1441.81254,75.7058295 C1441.26695,74.8821902 1440.45239,74.3818961 1439.51928,74.2978772 C1438.61677,74.2189504 1437.7219,74.5550258 1437.07561,75.2271767 L1435.79959,76.5549291 L1434.88051,76.5549291 L1433.695,75.3213796 C1433.03468,74.6339526 1432.17296,74.276236 1431.32908,74.276236 Z" id="Shape"></path>
					        </g>
					    </g>
					</svg>
 					<?php echo $at['text_donate'] ?>
				</a>
			</li>
			<li>
				<a href="<?php echo $at['link_pray'] ?>">
					<?php echo $at['text_pray'] ?>
				</a>
			</li>
			<li class="fullpage__menu__share">
				<a href="#">
					<i class="ion-android-share-alt"></i>
				</a>
				<ul>
					<li>
						<a
							class="fullpage__menu__share-icon"
							target="_blank"
							href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $current_url ?>" >
							<i class="ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a
							class="fullpage__menu__share-icon"
							target="_blank"
							href="https://twitter.com/intent/tweet?text=<?php echo $current_url ?>">
							<i class="ion-social-twitter"></i>
						</a>
					</li>
					<li>
					<a
							class="fullpage__menu__share-icon"
							target="_blank"
							href="https://api.whatsapp.com/send?text=<?php echo urlencode($current_url) ?>">
							<i class="ion-social-whatsapp"></i>
						</a>
					
					</li>
				</ul>
			</li>
		</ul>

	<div class="fullpage-nav">
		<ul>
			<?php foreach($links as $ind => $link): ?>
				<li>
					<a href="<?php echo $link['link'] ?>">
						<span class="num"><?php echo $ind + 1 ?></span> <span class="title"><?php echo  $link['title'] ?></span>
					</a>
				</li>
			<?php endforeach; ?>
			<li>
				<a href="<?php echo get_option('url_' . space_to_lodash( getCountry() ) ) ?>">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 					viewBox="0 0 30 30" style="enable-background:new 0 0 30 30;" xml:space="preserve" width="30" height="30">
					<style type="text/css">
						.st0{fill:#EC1C24;}
						.st1{fill:#FFFFFF;}
					</style>
					<g>
						<path class="st0" d="M0,15C0,6.7,6.7,0,15,0c8.3,0,15,6.7,15,15c0,8.3-6.7,15-15,15C6.7,30,0,23.3,0,15"/>
						<path class="st1" d="M27.3,13.7c-0.7-0.6-5.1-4.5-5.6-5c-0.6-0.5-1.3,0.2-0.7,0.8c0.6,0.5,5.7,5,5.7,5H15.6V2.1
							c0-0.3-0.2-0.5-0.5-0.5c-0.3,0-0.5,0.2-0.5,0.5v12.4H8.8V9c0-0.3-0.2-0.5-0.5-0.5C8,8.5,7.8,8.7,7.8,9v5.5H2.1
							c-0.3,0-0.5,0.2-0.5,0.5c0,0.3,0.2,0.5,0.5,0.5h5.6V21c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.5v-5.5h5.7v12.3
							c0,0.3,0.2,0.5,0.5,0.5c0.3,0,0.5-0.2,0.5-0.5V15.5h11.1c0,0-5.7,5-5.7,5.1c-0.2,0.2-0.2,0.5,0,0.7c0.1,0.1,0.3,0.2,0.4,0.2
							c0.1,0,0.3,0,0.3-0.1c0.2-0.2,5.2-4.6,5.7-5.1c0.6-0.5,0.9-0.9,0.9-1.4C28.2,14.5,27.9,14.2,27.3,13.7"/>
					</g>
					</svg>

					<span class="title"><?php echo $at['text_about'] ?></span>
				</a>
			</li>
		</ul>

		<button class="fullpage-nav__close"><i class="ion-close-round"></i></button>

		<div class="fullpage-nav__info">
			<ul>
				<li><a class="open-modal" href="<?php echo $at['link_privacy'] ?>"><?php echo $at['text_privacy'] ?></a></li>
				<li><a class="open-modal" href="<?php echo $at['link_terms'] ?>"><?php echo $at['text_terms'] ?></a></li>
				<li><a href="<?php echo $at['link_lang'] ?>"><?php echo $at['text_lang'] ?></a></li>
				<?php if(!empty($at['link_lang_2']) && !empty($at['text_lang_2'])): ?>
					<li>
						<a href="<?php echo $at['link_lang_2'] ?>"><?php echo $at['text_lang_2'] ?></a>
					</li>
				<?php endif; ?>
				<?php if(!empty($at['link_lang_3']) && !empty($at['text_lang_3'])): ?>
					<li>
						<a href="<?php echo $at['link_lang_3'] ?>"><?php echo $at['text_lang_3'] ?></a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
	</div>

<?php if($at['show_intro']): ?>
	<div class="intro">

	<?php foreach($intro as $i => $item): ?>
		<div
			class="
				intro__section
				intro--fade-in-out
				intro__section--duration-<?php echo $item['duration'] ?>
				intro__section--delay-<?php echo $item['delay'] ?>
			">
			<div class="intro__section__container">
				<h3><?php echo $item['title'] ?></h3>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<script>
	window.fp_options  = {};
	fp_options['titles'] = <?php echo json_encode($titles) ?>;
	fp_options['introDelay'] = <?php echo $introDelay ?>;
</script>

	<?php
	return ob_get_clean();
}

add_shortcode( 'acn_fullpage', 'acn_fullpage_sc' );
