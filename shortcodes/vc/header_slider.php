<?php

function bs_header_slider_vc() {
  $subparams = [
    [
      "type" => "attach_image",
      "heading" => "enter image",
      "param_name" => "image"
    ],
    [
      "type" => "dropdown",
      "heading" => "image position",
      "param_name" => "image_position",
      "value" => [
        "center",
        "left",
        "right"
      ]
    ],
    [
      "type" => "textfield",
      "heading" => "enter title",
      "param_name" => "title"
    ],
    [
      "type" => "textarea",
      "heading" => "enter subtitle",
      "param_name" => "subtitle"
    ],
    [
      "type" => "textfield",
      "heading" => "enter url",
      "param_name" => "url"
    ],
    [
      "type" => "textfield",
      "heading" => "Enter anchor",
      "param_name" => "anchor",
      "value" => "#contact"
    ],
    [
      "type" => "checkbox",
      "heading" => "is a video?",
      "param_name" => "is_video",
      "value" => false
    ],

  ];

  $params = [
    [
      "type" => "textfield",
      "heading" => "enter interval",
      "param_name" => "interval",
      "value" => 5000
    ],
    [
      'type' => 'param_group',
      'value' => '',
      'param_name' => 'slides',
      'params' => $subparams
    ]
  ];

  vc_map(
    array(
      "name" =>  "BS Header Slider",
      "base" => "bs_header_slider",
      "category" =>  "BS",
      "params" => $params
    )
  );
}

add_action( 'vc_before_init', 'bs_header_slider_vc' );
