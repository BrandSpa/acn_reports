<?php

add_shortcode('bs_counter', 'bs_counter_sc');

function bs_counter_sc( $atts ) {
  $at = shortcode_atts([
    'num' => '1000',
    'style' => '',
    'classes' => ''
  ], $atts );

  ob_start();
  ?>

  <div
    class="bs-counter <?php echo $at['classes'] ?>"
    style="<?php echo $at['style'] ?>"
    data-props='{
      "time": 700,
      "delay": 10,
      "num": "<?php echo $at['num'] ?>"
    }'
  ></div>

  <?php
  return ob_get_clean();
}
