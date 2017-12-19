<?php
/**
**
**/

add_shortcode( 'bs_tri_news', 'bs_tri_news_sc' );

function bs_tri_news_sc($atts, $content = null) {
	$attributes = [
		'id_1' => '',
		'id_2' => '',
    'id_3' => ''
  ];

  $at = shortcode_atts( $attributes , $atts );

  ob_start();
?>
<style>
    .bs-post__recent{
        /*float:right;*/
        margin-left:5%;
    }
    .main_niw{
        width:53%;
        margin-left:5%;
        /*float:left;*/
    }
    .tri_only_mob h4{
      border-bottom-style:none;
    }
    .tri_only_mob p{
      display:none;
    }
    .tri_only_mob .main_a{
      display:none;
    }
    .first_new h4{
      border-bottom-style:solid;
    }
    .first_new p{
      display:block;
    }
    .first_new a{
      display:block!important;
    }
    @media (max-width: 760px){
      .bs-post__recent{
        margin:auto;
        }
       .main_niw{
            width:100%;
            float:right;
            margin:auto;
        }
        .hide_txt{
            display:none;
        }
        .tri_only_mob h4{
            border-bottom-style:solid;
        }
        .tri_only_mob a{
            font-size:1.3em;
        }
        .tri_only_mob .main_a{
            display:block;
        }
        .first_new p{
          display:none;
        }
    }

</style>

<div style="display:block; position:relative; margin:auto;">
<?php
$countri=0;
$customcla="main_niw";
$trilen=148;
foreach($at as $ID_n):  ?>
<?php $recent =  get_post($ID_n); //?>
<?php if($countri>0){$customcla=" "; $trilen=25;}?>

	<div class="bs-post__recent <?php echo $customcla ?>">
		<?php if(get_post_meta($recent->ID, 'image_square_key', true)): ?>
		<a href="<?php echo get_permalink($recent->ID) ?>">
			<img src="<?php echo get_post_meta($recent->ID, 'image_square_key', true) ?>" style="width: 100%" />
			</a>
		<?php endif; ?>

		<div class="bs-post__recent__content tri_only_mob <?php if($countri==0) echo("first_new"); ?> ">
			<h4>
				<a href="<?php echo get_permalink($recent->ID) ?>">
				<?php if(is_mobile()) : ?>
					<?php echo substr($recent->post_title, 0, 70) ?>...
				<?php else: ?>
					<?php echo $recent->post_title ?>
				<?php endif; ?>
				</a>
			</h4>
			<p class="hide_txt"><?php echo substr(wp_strip_all_tags($recent->post_content), 0, $trilen) ?>...</p>
			<a class="main_a" href="<?php echo get_permalink($recent->ID) ?>"><?php echo gett('Read more') ?>...</a>
		</div>
	</div>

 <?php $countri++;?>
 <?php endforeach; ?>
 </div>


<script>

</script>
<?php

  return ob_get_clean();
}


add_action( 'vc_before_init', 'bs_tri_news_vc' );

  function bs_tri_news_vc() {
		$params = [
			[
        "type" => "textfield",
        "heading" => "ID Noticia 1",
        "param_name" => "id_1",
        "value" => ''
			],
      [
        "type" => "textfield",
        "heading" => "ID Noticia 2",
        "param_name" => "id_2",
        "value" => ''
			],
      [
        "type" => "textfield",
        "heading" => "ID Noticia 3",
        "param_name" => 'id_3',
        "value" => ""
      ]
		];

  	vc_map(
      array(
        "name" =>  "BS Tri_News",
        "base" => "bs_tri_news",
        "category" =>  "BS",
        "params" => $params
      )
    );
  }
