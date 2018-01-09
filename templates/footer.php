<?php
ini_set('display_errors',0);
error_reporting(E_ALL|E_STRICT);
include_once str_replace('templates', '', __DIR__) . '/lib/offices_countries.php';
?>

<div class="learn-more">
	<a
		class="learn-more-link"
		href="<?php echo get_option('url_' . space_to_lodash( getCountry() ) ) ?>"
	>
		<?php echo replace_office_texts() ?>
	</a>
</div>

<?php
$offices = '';
foreach(getOfficesCountries() as $office) {
	$officeDash = space_to_lodash($office);
	if($office !== 'default' && get_option('no_show_' . $officeDash ) == 0) {
		$offices .= '<li><a href="'. get_option('url_' . space_to_lodash($office)) .'">'.$office.'</a></li>';
	}
};

echo do_shortcode('[bs_accordion btn_title="'.gett('ACN International in the world').'"]<ul class="offices-list">'. $offices .'</ul>[/bs_accordion]')

?>

<div class="bs-about">
	<div class="col-3-l bs-about__left">
		<img width="76" height="103" src="//acninternational.org/wp-content/uploads/2016/11/logoACNwhy2.png" class="vc_single_image-img attachment-full" alt="logoacnwhy2">
	</div>

	<div class="col-9-l bs-about__right">
		<h3 style="font-family: 'Source Sans Pro', sans-serif !important;"><?php echo gett('ABOUT US') ?></h3>
		<p><?php echo gett('Founded in 1947 as a Catholic aid organization for war refugees and recognized as a papal foundation since 2011, ACN is dedicated to the service of Christians around the world, through information, prayer and action, wherever they are persecuted or oppressed or suffering material need. ACN supports every year an average of 6000 projects in close to 150 countries, thanks to private donations, as the foundation receives no public funding.') ?></p>
	</div>

</div>

<div class="bs-footer">
	<div class="bs-footer__left col-3-l">
		<img width="86" height="86" src="//acninternational.org/wp-content/uploads/2017/02/pope.png" class="vc_single_image-img attachment-medium" alt="pope">
			<p><?php echo gett('“I invite you all, together with ACN, to do everywhere in the world, a work of mercy.”'); ?></p>
			<img width="122" height="23" src="//acninternational.org/wp-content/uploads/2017/02/SignPope.png" class="vc_single_image-img attachment-thumbnail" alt="signpope">
	</div>
	<div class="bs-footer__right col-9-l">
		<div class="bs-footer__right--top">
			<ul class="bs-footer__menu">
				<?php
					$args = array(
						'theme_location' => 'footer',
						'container' => false,
						'echo' => false
					);

					$menu = wp_nav_menu( $args);
					echo clean_menu($menu);
				?>
			</ul>
		</div>

		<div class="bs-footer__right--bottom">
			<div class="col-4-l">
			<h5><?php echo gett('Contact') ?></h5>
			<h6>ACN International</h6>
			<h6><?php echo get_option('name_default') ?></h6>
			<h6><?php echo get_option('contact_info_address_default') ?></h6>
			<h6><?php echo get_option('contact_info_phone_default') ?></h6>
			</div>

			<div class="col-4-l">
				<h5 style="visibility: hidden;"><?php echo gett('Contact') ?></h5>
				<h6>C/ Ferrer del Río, 14</h6>
				<h6>(esq. C/ Ardemans)</h6>
				<h6>28028 MADRID</h6>
				<h6><a href="mailto:info@ayudaalaiglesianecesitada.org">info@ayudaalaiglesianecesitada.org</a></h6>
				<h6><a href="tel:+34917259212">91 725 92 12</a></h6>
			</div>

			<div class="col-4-l privacy-terms">
				<br/><br/>
				<h6><a href="<?php echo gett('https://acninternational.org/privacy-policy/') ?>"><?php echo gett('PRIVACY POLICY') ?></a></h6>
				<h6><a href="<?php echo gett('https://acninternational.org/terms-and-conditions/') ?>"><?php echo gett('TERMS & CONDITIONS') ?></a></h6>
				<h6>KPMG</h6>
			</div>
		</div>
	</div>

	<div class="bs-footer__bottom--top">
		<h6><?php echo gett('ACN – Aid to the Church in Need gGmbH, HRB 8446 is non-profit organization officially registered in Germany and audited internationally by KPMG.') ?></h6>
	</div>
	<div class="bs-footer__bottom--bottom">
			<img width="173" height="84" src="//acninternational.org/wp-content/uploads/2016/11/llaves-4.png" class="vc_single_image-img attachment-full" alt="llaves">
	</div>
</div>
