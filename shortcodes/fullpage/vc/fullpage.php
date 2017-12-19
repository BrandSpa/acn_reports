<?php
function acn_fullpage_vc() {
    $links_subparams = [
      [
        'type' => 'textfield',
        'param_name' => 'link',
        'heading' => 'link',
        'value' => '#'
      ],
      [
        'type' => 'textfield',
        'param_name' => 'title',
        'heading' => 'link title',
        'value' => ''
      ]
    ];

    $intro_subparams =  [
      [
        'type' => 'textfield',
        'param_name' => 'title',
        'heading' => 'title',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'delay',
        'heading' => 'slide delay',
        'value' => '1'
      ],
      [
        'type' => 'textfield',
        'param_name' => 'duration',
        'heading' => 'slide duration',
        'value' => '1'
      ]
    ];

    $titles_subparams = [
      [
        'type' => 'textfield',
        'param_name' => 'story',
        'heading' => 'story number',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'title',
        'heading' => 'title',
        'value' => ''
      ]
    ];

    $params = [
      [
        'type' => 'textfield',
        'param_name' => 'unique_name',
        'heading' => 'Component Name',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'story_name',
        'heading' => 'Story name',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'link_donate',
        'heading' => 'Donate link',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'text_donate',
        'heading' => 'Donate text',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'link_pray',
        'heading' => 'Pray link',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'text_pray',
        'heading' => 'Pray text',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'link_privacy',
        'heading' => 'Privacy link',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'text_privacy',
        'heading' => 'Privacy text',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'link_terms',
        'heading' => 'Terms link',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'text_terms',
        'heading' => 'Terms text',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'link_lang',
        'heading' => 'Translation link',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'text_lang',
        'heading' => 'Translation text',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'link_lang_2',
        'heading' => 'Translation link 2',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'text_lang_2',
        'heading' => 'Translation text 2',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'link_lang_3',
        'heading' => 'Translation link 3',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'text_lang_3',
        'heading' => 'Translation text 3',
        'value' => ''
      ],
      [
        'type' => 'textfield',
        'param_name' => 'text_about',
        'heading' => 'About text',
        'value' => 'About ACN'
      ],
      [
        'type' => 'param_group',
        'param_name' => 'links',
        'heading' => 'Menu links',
        'value' => '',
        'params' =>  $links_subparams
      ],
      [
        'type' => 'param_group',
        'param_name' => 'intro',
        'heading' => 'Intro',
        'value' => '',
        'params' =>  $intro_subparams
      ],
      [
        'type' => 'param_group',
        'param_name' => 'titles',
        'heading' => 'Titles',
        'value' => '',
        'params' =>  $titles_subparams
      ],
      [
        'type' => 'checkbox',
        'heading' => 'Show Intro',
        'param_name' => 'show_intro',
        'value' => false
      ],
      [
        'type' => 'textfield',
        'heading' => 'Call us title',
        'param_name' => 'call-us-title',
        'value' => 'Llámanos al'
      ],
      [
        'type' => 'textfield',
        'heading' => 'Call us number',
        'param_name' => 'call-us-num',
        'value' => '91 725 92 12'
      ]
    ];

    vc_map(
      array(
        "name" =>  "FullPage",
        "base" => "acn_fullpage",
        "category" =>  "ACN",
				"content_element" => true,
				"show_settings_on_create" => true,
				"is_container" => true,
        "params" => $params,
				"js_view" => 'VcColumnView'
      )
    );
		if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    	class WPBakeryShortCode_acn_fullpage extends WPBakeryShortCodesContainer {}
		}
  }

add_action( 'vc_before_init', 'acn_fullpage_vc' );
