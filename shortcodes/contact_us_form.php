<?php

function bs_contact_us_form_sc($atts) {
  $at = shortcode_atts([
    'name_placeholder' => gett('Name'),
    'lastname_placeholder' => gett('Lastname'),
    'email_placeholder' => gett('Email'),
    'message_placeholder' => gett('Message'),
    'name_validation' => gett('Name required'),
    'lastname_validation' => gett('Lastname required'),
    'email_validation' => gett('Email invalid'),
    'message_validation' => gett('Message required'),
    'message_thanks' => gett('Thank you very much for joining ACN'),
    'btn_text' => gett('Send')
  ], $atts);

  $props = [
    'placeholders' => [
      'name' => $at['name_placeholder'],
      'lastname' => $at['lastname_placeholder'],
      'email' => $at['email_placeholder'],
      'message' => $at['message_placeholder']
    ],
    'messages' => [
      'name' => $at['name_validation'],
      'lastname' => $at['lastname_validation'],
      'email' => $at['email_validation'],
      'message' => $at['message_validation'],
      'thanks' => $at['message_thanks']
    ],
    'btnText' => $at['btn_text']
  ];

  ob_start();
?>
<div
  class="bs-contact-form-us"
  data-props='<?php echo json_encode($props) ?>'
>
</div>
<?php
  return ob_get_clean();
}

add_shortcode('bs_contact_us_form', 'bs_contact_us_form_sc');
