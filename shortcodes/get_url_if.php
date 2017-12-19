<?php

function bs_get_url_if_sc( $atts ) {
  $at = shortcode_atts([
    'field' => '',
    'if' => '',
    'if_content' => '',
    'else_content' => '',
  ], $atts );

  ob_start();
  ?>
  <?php if(isset($_GET[$at['field']])): ?>

    <?php if($_GET[$at['field']] == $at['if']): ?>
      <?php echo $at['if_content']; ?>
    <?php else: ?>
      <?php echo $at['else_content']; ?>
    <?php endif; ?>

  <?php endif; ?>

  <?php
  return ob_get_clean();
}

add_shortcode('bs_get_url_if', 'bs_get_url_if_sc');
