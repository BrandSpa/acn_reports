<?php
$dir_base =  str_replace('options', '', __DIR__);
include_once $dir_base . '/lib/offices_countries.php';

// create custom plugin settings menu
add_action('admin_menu', 'bs_admin_options_menu');

function bs_admin_options_menu() {
		add_menu_page(
    'Brandspa theme options',
    'Offices Info', //menu name
    'manage_options', //allow it options
    'bs-offices', //slug
    'logos_settings_page',
    get_template_directory_uri() . '/public/img/bs.png', //icon on menu
    110 //position on menu
  );

	//call register settings function on init admin page
	add_action( 'admin_init', 'bs_add_country_info_settings' );
}

function bs_add_country_info_settings() {
	$options = getOfficesCountries();

	 register_setting( 'bs_country_info_group', 'translations');

  foreach ($options as $value) {
		$value = str_replace(' ', '_', $value);
    register_setting( 'bs_country_info_group', 'logo_' . $value );
    register_setting( 'bs_country_info_group', 'donate_url_' . $value );
    register_setting( 'bs_country_info_group', 'name_' . $value );
    register_setting( 'bs_country_info_group', 'url_' . $value );
    register_setting( 'bs_country_info_group', 'contact_info_address_' . $value );
    register_setting( 'bs_country_info_group', 'contact_info_email_' . $value );
    register_setting( 'bs_country_info_group', 'contact_info_phone_' . $value );
    register_setting( 'bs_country_info_group', 'convertloop_api_' . $value );
    register_setting( 'bs_country_info_group', 'convertloop_app_' . $value );
    register_setting( 'bs_country_info_group', 'no_show_' . $value );
  }

}

function logos_settings_page() {
?>
  <?php
  	$countries = getOfficesCountries();
  ?>

  <div style="background: #f1f1f1; background-size: contain; padding: 15px">
		<div style="text-align: center; text-shadow: 1px 1px 3px rgba(0,0,0, .1)">
			<h1>BS Offices Options</h1>
		</div>

  <form method="post" action="options.php" style="position: relative; width: 80%; margin: 0 auto">
      <?php settings_fields( 'bs_country_info_group' ); ?>
      <?php do_settings_sections( 'bs_country_info_group' ); ?>

        <?php foreach ($countries as $value): ?>
					<?php $value = str_replace(' ', '_', $value); ?>

          <section id="office-<?php echo $value ?>" style="padding: 15px; margin: 15px auto;background: #fff; box-shadow: 1px 1px 5px rgba(0,0,0, .1); width: 100%">
						<h3><a href="#office-<?php echo $value ?>"><?php echo str_replace('_', ' ', $value) ?></a></h3>
						<hr>

						<h4>Logo url</h4>
						<p>
							<input
								style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
								type="text"
								class="uploader"
								placeholder="logo url"
								name="logo_<?php echo $value ?>"
								value="<?php echo esc_attr( get_option('logo_' . $value ) ); ?>"
							/>
						</p>

						<h4>Donate url</h4>

						<input
							style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
							type="text"
							placeholder="donate url"
							name="donate_url_<?php echo $value ?>"
							value="<?php echo esc_attr( get_option('donate_url_' . $value ) ); ?>"
						/>

						<h4>Url</h4>

						<input
							style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
							type="text"
							placeholder="office url"
							name="url_<?php echo $value ?>"
							value="<?php echo esc_attr( get_option('url_' . $value ) ); ?>"
						/>

						<h4>Name</h4>

						<input
							style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
							type="text"
							placeholder="Office name"
							name="name_<?php echo $value ?>"
							value="<?php echo esc_attr( get_option('name_' . $value ) ); ?>"
						/>


						<h4>Contact</h4>

						<input
							style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
							type="text"
							placeholder="Address"
							name="contact_info_address_<?php echo $value ?>"
							value="<?php echo esc_attr( get_option('contact_info_address_' . $value ) ); ?>"
						/>
						<p></p>
						<input
							style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
							type="text"
							placeholder="Phone"
							name="contact_info_phone_<?php echo $value ?>"
							value="<?php echo esc_attr( get_option('contact_info_phone_' . $value ) ); ?>"
						/>
						<p></p>
						<input
							style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
							type="text"
							placeholder="Email"
							name="contact_info_email_<?php echo $value ?>"
							value="<?php echo esc_attr( get_option('contact_info_email_' . $value ) ); ?>"
						/>
						<p></p>
						<h4>ConvertLoop</h4>
							<input
								style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
								type="text"
								placeholder="Convertloop app id"
								name="convertloop_app_<?php echo $value ?>"
								value="<?php echo esc_attr( get_option('convertloop_app_' . $value ) ); ?>"
							/>
							<p></p>
							<input`
								style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
								type="text"
								placeholder="Convertloop api key"
								name="convertloop_api_<?php echo $value ?>"
								value="<?php echo esc_attr( get_option('convertloop_api_' . $value ) ); ?>"
							/>

							<p></p>
							<label for="">No show</label>
							<input type="checkbox" name="no_show_<?php echo $value ?>" value="<?php echo esc_attr( get_option('no_show_' . $value ) );  ?>" />
							<?php submit_button(); ?>

          </section>


        <?php endforeach; ?>


  </form>
  </div>
<?php } ?>
