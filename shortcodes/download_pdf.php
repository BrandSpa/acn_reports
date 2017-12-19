<?php

function bs_download_pdf_sc($atts, $content = null) {

	$attributes = [
    'btn_text' => 'download PDF',
		'btn_color' => '',
		'email' => 'Email',
		'validation_email' => 'Email required',
    'redirect_url' => '',
    'event' => 'PF2017',
    'terms_text' => "Yes, I want to receive emails about ACNs work",
    'tags' => ''
  ];

  $at = shortcode_atts( $attributes , $atts );
  print_r($at);
	$props = [
		'btn' => [
			'text' => $at['btn_text'],
			'background' => $at['btn_color'],
		],
		'texts' => [
			'email' => $at['email'],
      'validation_email' => $at['validation_email'],
      'terms_text' => $at['terms_text'],
		],
		'country' => getCountry(),
		'redirect_url' =>  $at['redirect_url'],
    'event' =>  $at['event'],
    'tags' => $at['tags']
  ];
  
  $props = json_encode($props);
	
  ob_start();
?>

<div
	class="bs-download-pdf" 
	data-props='<?php echo $props ?>'
>
</div>

<?php

  return ob_get_clean();
}

add_shortcode( 'bs_download_pdf', 'bs_download_pdf_sc' );
add_action( 'vc_before_init', 'bs_download_pdf_vc' );

  function bs_download_pdf_vc() {
    
		$params = [
      [
        "type" => "textfield",
        "heading" => "btn Text",
        "param_name" => "btn_text",
        "value" => 'download PDF'
			],
			[
        "type" => "textfield",
        "heading" => "btn color",
        "param_name" => "btn_color",
        "value" => ''
			],
			[
        "type" => "textfield",
        "heading" => "Email placeholder",
        "param_name" => "email",
        "value" => 'Email'
			],
			[
        "type" => "textfield",
        "heading" => "Email validation",
        "param_name" => "validation_email",
        "value" => 'Email required'
			],
			[
        "type" => "textfield",
        "heading" => "Redirect url",
        "param_name" => "redirect_url",
        "value" => ''
      ],
      [
        "type" => "textfield",
        "heading" => "Redirect url",
        "param_name" => "redirect_url",
        "value" => ''
      ],
      [
        "type" => "textfield",
        "heading" => "event",
        "param_name" => "event",
        "value" => 'PF2017'
      ],
      [
        "type" => "textfield",
        "heading" => "Terms Text",
        "param_name" => "terms_text",
        "value" => "Yes, I want to receive emails about ACN's work",
      ],
      [
        "type" => "textfield",
        "heading" => "tags",
        "param_name" => "tags",
        "value" => ''
			]  
		];

  	vc_map(
      array(
        "name" =>  "BS PF2017",
        "base" => "bs_download_pdf",
        "category" =>  "BS",
        "params" => $params
      ) 
    );
  }

