<?php
add_action('admin_menu', 'bs_admin_accounts_options_menu');

function bs_admin_accounts_options_menu() {
		add_menu_page(
    'Brandspa theme options',
    'Accounts Info', //menu name
    'manage_options', //allow it options
    'bs-accounts', //slug
    'bs_accounts_options',
    get_template_directory_uri() . '/public/img/bs.png', //icon on menu
    111 //position on menu
  );

	//call register settings function on init admin page
	add_action( 'admin_init', 'bs_accounts_settings' );
}

function bs_accounts_settings() {
  register_setting( 'bs_accounts_info_group', 'logo' );
  register_setting( 'bs_accounts_info_group', 'donate_link' );
  register_setting( 'bs_accounts_info_group', 'infusionsoft_key' );
  register_setting( 'bs_accounts_info_group', 'infusionsoft_subdomain' );
  register_setting( 'bs_accounts_info_group', 'infusionsoft_tags' );
  register_setting( 'bs_accounts_info_group', 'mailchimp_api' );
  register_setting( 'bs_accounts_info_group', 'mailchimp_list_id' );
  register_setting( 'bs_accounts_info_group', 'stripe_key_private' );
  register_setting( 'bs_accounts_info_group', 'stripe_key_public' );
  register_setting( 'bs_accounts_info_group', 'donate_monthly_redirect' );
  register_setting( 'bs_accounts_info_group', 'donate_once_redirect' );
  register_setting( 'bs_accounts_info_group', 'subscribe_redirect' );
  register_setting( 'bs_accounts_info_group', 'analytics_id' );
  register_setting( 'bs_accounts_info_group', 'gta_id' );
  register_setting( 'bs_accounts_info_group', 'smtp_url' );
  register_setting( 'bs_accounts_info_group', 'smtp_port' );
  register_setting( 'bs_accounts_info_group', 'smtp_username' );
  register_setting( 'bs_accounts_info_group', 'smtp_password' );
  register_setting( 'bs_accounts_info_group', 'banner_url_en' );
  register_setting( 'bs_accounts_info_group', 'banner_vertical_en' );
  register_setting( 'bs_accounts_info_group', 'banner_horizontal_en' );
  register_setting( 'bs_accounts_info_group', 'banner_url_es' );
  register_setting( 'bs_accounts_info_group', 'banner_vertical_es' );
  register_setting( 'bs_accounts_info_group', 'banner_horizontal_es' );
}

function bs_accounts_options() {
?>
<div style="padding: 15px; margin: 15px; background: #fff; box-shadow: 1px 1px 5px rgba(0,0,0, .1);">

  <h1>Accounts keys</h1>
  <hr/>
  <p></p>
  <form method="post" action="options.php" style="position: relative; margin: 0 auto">
    <?php settings_fields( 'bs_accounts_info_group' ); ?>
    <?php do_settings_sections( 'bs_accounts_info_group' ); ?>

    <p>
    	<label><b>Logo url</b></label>
      <br>
			<input
        style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
        type="text"
				class="uploader"
				placeholder="logo"
				name="logo"
				value="<?php echo esc_attr( get_option('logo') ); ?>"
			/>
    </p>

    <p>
    	<label><b>Donate link</b></label>
       <br>
			<input
        style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
        type="text"
				placeholder="url"
				name="donate_link"
				value="<?php echo esc_attr( get_option('donate_link') ); ?>"
			/>
    </p>

    <p>
       <label for=""> <b>Mailchimp key</b> </label>
        <br>
        <input
          style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
          type="text"
          name="mailchimp_api"
          placeholder="Api Key"
          value="<?php echo get_option('mailchimp_api') ?>"
          >
    </p>

     <p>
       <label for=""> <b>Mailchimp List id</b> </label>
        <br>
        <input
          style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
          type="text"
          name="mailchimp_list_id"
          placeholder="list id"
          value="<?php echo get_option('mailchimp_list_id') ?>"
          >
    </p>

    <p>
       <label for=""> <b>Stripe Private key</b> </label>
       <br>
      <input
        style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
        type="text"
        name="stripe_key_private"
        placeholder="Private Api Key"
        value="<?php echo get_option('stripe_key_private') ?>"
        >
    </p>

    <p>
      <label for=""> <b>Stripe Public Key</b>  </label>
       <br>
      <input
        style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
        type="text"
        name="stripe_key_public"
        placeholder="Public Api Key"
        value="<?php echo get_option('stripe_key_public') ?>"
        >
    </p>

    <p>
     <label for=""> <b>Donate once thanks / redirect</b>  </label>
       <br>
      <input
        style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
        type="text"
        name="donate_once_redirect"
        placeholder="url"
        value="<?php echo get_option('donate_once_redirect') ?>"
        >
    </p>

    <p>
     <label for=""> <b>Donate monthly thanks / redirect</b>  </label>
       <br>
      <input
        style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
        type="text"
        name="donate_monthly_redirect"
        placeholder="url"
        value="<?php echo get_option('donate_monthly_redirect') ?>"
        >
     </p>
    <p>

     <label for=""> <b>Subscribe thanks / redirect</b>  </label>
       <br>
      <input
        style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
        type="text"
        name="subscribe_redirect"
        placeholder="url"
        value="<?php echo get_option('subscribe_redirect') ?>"
        >
      </p>

      <p>
        <label for=""> <b>Google Analytics ID</b>  </label>
         <br>
      <input
        style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
        type="text"
        name="analytics_id"
        placeholder="ID"
        value="<?php echo get_option('analytics_id') ?>"
        >
      </p>

      <p>
        <label for=""> <b>Google Tag Manager ID</b>  </label>
         <br>
      	<input
	        style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
	        type="text"
	        name="gta_id"
	        placeholder="ID"
	        value="<?php echo get_option('gta_id') ?>"
        >
      </p>

			<p>
				<label for=""> <b>SMTP URL</b>  </label>
				 <br>
				<input
					style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
					type="text"
					name="smtp_url"
					placeholder="smtp url"
					value="<?php echo get_option('smtp_url') ?>"
				>
			</p>

			<p>
				<label for=""> <b>SMTP PORT</b>  </label>
				 <br>
				<input
					style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
					type="text"
					name="smtp_port"
					placeholder="smtp port"
					value="<?php echo get_option('smtp_port') ?>"
				>
			</p>

			<p>
				<label for=""> <b>SMTP USERNAME</b></label>
				 <br>
				<input
					style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
					type="text"
					name="smtp_username"
					placeholder="smtp username"
					value="<?php echo get_option('smtp_username') ?>"
				>
			</p>

			<p>
				<label for=""> <b>SMTP PASSWORD</b></label>
				 <br>
				<input
					style="background: rgba(255,255,255,.4); width: 60%; height: 35px"
					type="text"
					name="smtp_password"
					placeholder="smtp password"
					value="<?php echo get_option('smtp_password') ?>"
				>
			</p>


      <p>
        <label for="">
          <b>It's necessary update this database once each month</b>
        </label>
        <br>
        <button class="button update-geoip">Update Geoip Database</button>
        <span class="update-geoip-message"></span>
      </p>
      <h4>Banner english</h4>
      <p>
        <input type="text" placeholder="Banner url" name="banner_url_en" value="<?php echo get_option('banner_url_en') ?>">
      </p>
      <h4>Desktop</h4>
      <p>
        <textarea
          style="background: rgba(255,255,255,.4); width: 60%;"
          rows="4"
          type="text"
          placeholder="Banner vertical"
          name="banner_vertical_en"
        ><?php echo get_option('banner_vertical_en') ?></textarea>
      </p>
      <h4>Mobile</h4>
      <p>
        <textarea
          style="background: rgba(255,255,255,.4); width: 60%;"
          rows="4"
          type="text"
          placeholder="Banner horizontal"
          name="banner_horizontal_en"
        ><?php echo get_option('banner_horizontal_en') ?></textarea>
      </p>

      <h4>Banner spanish</h4>
      <p>
        <input type="text" placeholder="Banner url" name="banner_url_es" value="<?php echo get_option('banner_url_es') ?>">
      </p>
      <h4>Desktop</h4>
      <p>
        <textarea
          style="background: rgba(255,255,255,.4); width: 60%;"
          rows="4"
          type="text"
          placeholder="Banner vertical"
          name="banner_vertical_es"
        ><?php echo get_option('banner_vertical_es') ?></textarea>
      </p>
      <h4>Mobile</h4>
      <p>
        <textarea
          style="background: rgba(255,255,255,.4); width: 60%;"
          rows="4"
          type="text"
          placeholder="Banner horizontal"
          name="banner_horizontal_es"
        ><?php echo get_option('banner_horizontal_es') ?></textarea>
      </p>

    <p>
      <?php submit_button(); ?>
    </p>

  </form>
</div>

<?php
}
