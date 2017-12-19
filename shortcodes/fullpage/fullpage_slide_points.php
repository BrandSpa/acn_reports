<?php
function get_att_name($name) {
  $name = strtolower($name);
  return str_replace(" ", "_", $name);
}

function acn_fullpage_slide_points_sc( $atts, $content ) {

	$params = [
		"title" => "",
		"subtitle" => "",
    "btn_title_1" => "",
    "btn_title_1_x" => "1080.77246",
    "btn_title_2" => "",
    "btn_title_2_x" => "1079",
    "btn_title_3" => "",
    "btn_title_3_x" => "1099.07715",
		"bg_color" => "#fff",
		"bg_img" => "",
		"bg_img_mobile" => "",
		"story_num" => "",
		"index_num" => "",
		"uniq_name" => "slide-" . uniqid() . rand(0, 100),
		"contents" => ""
	];

	$titles = [
    'Damaged Houses',
    'Totally Destroyed',
    'Burnt',
    'Partially Damaged',
    'Number of Houses Actually Being Renovated',
    'Number of families prior to 2014',
    'Number of Houses Registered to be Renovated',
    'Number of Christians Returned',
    'Families returned to Nineveh Plains',
    'Properties already restored'
  ];

  foreach ($titles as $title) {
    $params[get_att_name($title)] = $title;
    $params[get_att_name($title) . '_num'] = '';
  }

  $params[ get_att_name('Properties already restored') . '_percentage'] = '2%';
  $params[ get_att_name('Properties already restored') . '_graph'] = '';
  $params[ get_att_name('Families returned to Nineveh Plains') . '_percentage'] = '4%';
  $params[ get_att_name('Families returned to Nineveh Plains') . '_graph'] = '';

	$points = [
		'Telleskuf' => [
			'x' => '1219.55',
			'y' => '155.68',
			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
		],
		'Baqofa' => [
			'x' => '1302.85',
			'y' => '225.32',
			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
		],
		'Batnaya' => [
			'x' => '1219.66',
			'y' => '275.41',
			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
		],
		'Telekef' => [
			'x' => '1139.8',
			'y' => '352.83',
			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
		],
		'Bahzani' => [
			'x' => '1439.68',
			'y' => '409.84',
			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
		],
		'Bashiqua' => [
			'x' => '1351.85',
			'y' => '466.08',
			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
		],
		'Bartella' => [
			'x' => '1276.32',
			'y' => '625.78',
			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
		],
		'Karamless' => [
			'x' => '1236.11',
			'y' => '786.49',
			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
		],
		'Bakhdida' => [
			'x' => '1072.1',
			'y' => '774.85',
			'image' => '/wp-content/uploads/2017/07/img150-1.jpg'
		]
	];

  foreach ($points as $name => $point) {
    $params[strtolower($name) . '_name'] = $name;
  }

  $at = shortcode_atts($params, $atts);
  $bgUrl = wp_get_attachment_url( $at['bg_img'] );
  $contents = empty(vc_param_group_parse_atts($at['contents'])) ? [] : vc_param_group_parse_atts($at['contents']);


	ob_start();
?>

	<div
		class="section section--<?php echo $at['uniq_name'] ?>"
		data-anchor="slide-<?php echo $at['uniq_name'] ?>"
		data-story="<?php echo $at['story_num'] ?>"
		data-index="<?php echo $at['index_num'] ?>"
	>

	<div class="section__content">
		<?php echo do_shortcode($content) ?>

		<div class="map-points__container">
			<svg class="map-points" width="1409" height="695" preserveAspectRatio="xMidYMid slice" viewBox="150 -50 1600 1000">
				<image class="hotspot__bg-image" width="1920" height="1080"
				xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/wp-content/uploads/2017/07/fondoSin.jpg">
			</image>
			<defs>
				<filter id="pin-drop-shadow" height="150%" width="150%" x="-0.2">
					<feGaussianBlur in="SourceAlpha" stdDeviation="5" result="blur"></feGaussianBlur>
					<feOffset in="blur" result="offsetBlur" dy="5"></feOffset>
					<feFlood flood-color="#000" flood-opacity="0.5"></feFlood>
					<feComposite operator="in" in2="offsetBlur"></feComposite>
					<feMerge>
						<feMergeNode></feMergeNode>
						<feMergeNode in="SourceGraphic"></feMergeNode>
					</feMerge>
				</filter>

				<filter id="logo-drop-shadow" height="150%" width="150%" x="-0.2">
					<feGaussianBlur in="SourceAlpha" stdDeviation="5" result="blur"></feGaussianBlur>
					<feOffset in="blur" result="offsetBlur" dy="5"></feOffset>
					<feFlood flood-color="#000" flood-opacity="0.5"></feFlood>
					<feComposite operator="in" in2="offsetBlur"></feComposite>
					<feMerge>
						<feMergeNode></feMergeNode>
						<feMergeNode in="SourceGraphic"></feMergeNode>
					</feMerge>
				</filter>
				<polygon id="path-1" points="5.42101086e-20 0.0001 5.42101086e-20 197.878 134.575 197.878 134.575 0.0001"></polygon>

			<?php foreach($points as $name => $point): ?>
				<pattern id="<?php echo $name ?>-img" patternUnits="userSpaceOnUse" height="50" width="50" x="21" y="21">
					<image x="0" y="0" height="50" width="50" xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo $point['image'] ?>">
					</image>
				</pattern>
			<?php endforeach; ?>

</defs>

<g class="nineveh-general-point map-points__spot" transform="translate(1060, 482)" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" filter="url(#pin-drop-shadow)">
		<g id="ME-Copy-2" transform="translate(-1060.000000, -471.000000)">
				<g id="Page-1" transform="translate(1060.000000, 478.000000)">
						<mask id="mask-2" fill="white">
								<use xlink:href="#path-1"></use>
						</mask>
						<g id="Clip-2"></g>
						<path d="M67.2876,0.0001 C30.1256,0.0001 -0.0004,30.1261 -0.0004,67.2881 C-0.0004,78.0161 2.5106,88.1581 6.9766,97.1571 L6.8926,97.1571 L57.4326,191.4041 C57.6606,191.9301 57.9336,192.4311 58.2396,192.9091 C60.1476,195.8941 63.4826,197.8781 67.2876,197.8781 C70.8466,197.8781 73.9926,196.1391 75.9466,193.4731 C76.5356,192.6691 77.0136,191.7821 77.3626,190.8301 L125.0956,101.7441 C131.1156,91.6661 134.5756,79.8811 134.5756,67.2881 C134.5756,30.1261 104.4496,0.0001 67.2876,0.0001" id="Fill-1" fill="#F1364E" mask="url(#mask-2)"></path>
				</g>
				<circle id="Oval-2-Copy-9" fill="#FFFFFF" cx="1175.15593" cy="489.155927" r="18.1559266" filter="url(#logo-drop-shadow)"></circle>
				<g id="Group-9" transform="translate(1165.000000, 480.000000)" stroke="#343434" stroke-width="5" stroke-linecap="square">
						<path d="M1.32515625,9.5 L19.6748438,9.5" id="Line-3"></path>
						<path d="M10,0.32515625 L10,18.6748437" id="Line-3"></path>
				</g>
				<text font-family="OpenSans-Light, Open Sans" font-size="22" font-weight="300" line-spacing="24" fill="#FFFFFF">
						<tspan x="<?php echo $at['btn_title_1_x'] ?>" y="534"><?php echo $at['btn_title_1']; ?></tspan>
						<tspan x="<?php echo $at['btn_title_2_x'] ?>" y="558"><?php echo $at['btn_title_2']; ?></tspan>
						<tspan x="<?php echo $at['btn_title_3_x'] ?>" y="582"><?php echo $at['btn_title_3']; ?></tspan>
				</text>
		</g>
</g>

<g class="map-points__spots">
	<?php foreach($points as $name => $point): ?>
 	<g transform="translate(<?php echo $point['x'] ?>, <?php echo $point['y'] ?>)" class="map-points__spot" data-content="<?php echo $name ?>">
		<g class="map-points__spot-image" fill="#fff" fill-rule="nonzero">
			<circle cx="0" cy="0" r="21" fill="url(#<?php echo $name ?>-img)" filter="url(#pin-drop-shadow)"></circle>
			<g class="hotspot__pin-360" transform="translate(13, -48) scale(1.1, 1.1)">
				<ellipse cx="0" cy="25" rx="10" ry="10" filter="url(#logo-drop-shadow)"></ellipse>
				<g transform="translate(-4, 30)" font-size="15" font-family="Roboto-Regular, Roboto" fill="#EE364D" font-weight="normal">
					<text><tspan fill="#EE364D" x="0" y="0">+</tspan></text>
				</g>
			</g>
			<text class="hotspot__pin-text" fill="#fff" dx="0" y="20" text-anchor="middle" style="display: inline-block;">
				<tspan x="0" dy="1.4em"><?php echo $at[strtolower($name) . '_name'] ?></tspan>
			</text>
	</g>
	</g>
<?php endforeach; ?>
</g>
</svg>
</div>

</div>

<button class="section__open section__close-spot-content"> <i class="ion-close-round"></i> </button>
<button class="section__open section__close-nineveh-general"> <i class="ion-close-round"></i> </button>

<div class="nineveh-general-content">
	<div class="nineveh-general-content__container">
		<h2><?php echo $at['title'] ?></h2>
		<ul class="nineveh-general-content__first-list">
      <li>
        <svg width="31px" height="29px" viewBox="0 0 31 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs></defs>
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="ME-Copy-2" transform="translate(-258.000000, -379.000000)" fill-rule="nonzero" fill="#EE364D">
                    <path d="M273.198232,379.003497 C273.340801,379.015674 273.476021,379.072015 273.585053,379.164672 L288.026363,391.542941 C288.214216,391.703701 288.301588,391.952745 288.255342,392.195623 C288.209096,392.438501 288.036315,392.638016 287.802527,392.718501 C287.568739,392.798985 287.30975,392.748113 287.123781,392.585178 L273.133762,380.59376 L259.143743,392.585178 C258.957774,392.748113 258.698785,392.798985 258.464997,392.718501 C258.231209,392.638016 258.058428,392.438501 258.012182,392.195623 C257.965936,391.952745 258.053308,391.703701 258.241161,391.542941 L272.682471,379.164672 C272.825198,379.042829 273.011521,378.984603 273.198232,379.003497 L273.198232,379.003497 Z M266.600788,379.024987 L266.600788,383.462681 L263.850063,385.826586 L263.850063,379.024987 L266.600788,379.024987 Z M273.133762,381.754222 L284.136665,391.037908 L284.136665,407.198408 L262.130859,407.198408 L262.130859,391.037908 L273.133762,381.754222 L273.133762,381.754222 Z M277.947532,393.444779 L273.821443,393.444779 L273.821443,397.570868 L277.947532,397.570868 L277.947532,393.444779 Z M272.446081,393.444779 L268.319992,393.444779 L268.319992,397.570868 L272.446081,397.570868 L272.446081,393.444779 Z M277.947532,398.946231 L273.821443,398.946231 L273.821443,403.072319 L277.947532,403.072319 L277.947532,398.946231 L277.947532,398.946231 Z M272.446081,398.946231 L268.319992,398.946231 L268.319992,403.072319 L272.446081,403.072319 L272.446081,398.946231 L272.446081,398.946231 Z" id="Icono_Casa"></path>
                </g>
            </g>
        </svg>
      </li>
			<li>
        <h4 style="color: #EE364D"><?php echo $at[get_att_name('Damaged Houses') . '_num']   ?></h4>
        <?php echo $at[get_att_name('Damaged Houses')] ?>
      </li>
			<li>
        <h4><?php echo $at[get_att_name('Totally Destroyed') . '_num']  ?></h4>
        <?php echo $at[get_att_name('Totally Destroyed')] ?></li>
			<li>
        <h4><?php echo $at[get_att_name('Burnt') . '_num']  ?></h4>
        <?php echo $at[get_att_name('Burnt')] ?></li>
			<li>
        <h4><?php echo $at[get_att_name('Partially Damaged') . '_num'] ?></h4>
        <?php echo $at[get_att_name('Partially Damaged')] ?></li>
		</ul>

    <ul class="nineveh-general-content__list">
			<li><h4><?php echo $at[get_att_name('Number of Houses Registered to be Renovated') . '_num']   ?></h4></li>
			<li><?php echo $at[get_att_name('Number of Houses Registered to be Renovated')] ?></li>
		</ul>

		<ul class="nineveh-general-content__list">
			<li><h4><?php echo $at[get_att_name('Number of Houses Actually Being Renovated') . '_num']  ?></h4></li>
			<li><?php echo $at[get_att_name('Number of Houses Actually Being Renovated')] ?></li>
		</ul>

    <ul class="nineveh-general-content__list">
			<li><h4><?php echo $at[get_att_name('Properties already restored') . '_num']  ?></h4></li>
			<li>
        <h4><?php echo $at[get_att_name('Properties already restored') . '_percentage']  ?></h4>
        <img src="<?php echo wp_get_attachment_url($at[get_att_name('Properties already restored') . '_graph'])  ?>" style="max-width: 300px;" />
				<?php echo $at[get_att_name('Properties already restored')]  ?>
			</li>
		</ul>

    <ul class="nineveh-general-content__list" style="margin-top: 40px">
      <li>
        <svg width="43px" height="30px" viewBox="0 0 43 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs></defs>
            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <g id="ME-Copy-2" transform="translate(-251.000000, -685.000000)" fill-rule="nonzero" fill="#EE364D">
                    <path d="M263.854186,688.030606 C263.854186,686.356829 265.210554,685 266.88433,685 C268.558107,685 269.914936,686.356368 269.914936,688.030606 C269.914936,689.704382 268.558107,691.061211 266.88433,691.061211 C265.210554,691.061211 263.854186,689.704382 263.854186,688.030606 L263.854186,688.030606 Z M261.840395,703.153185 C261.977416,703.171177 262.117666,703.159644 262.250996,703.119506 L261.338447,706.919182 C261.263247,707.285955 261.500842,707.643962 261.867153,707.719162 C261.909597,707.727466 261.953426,707.73208 261.996331,707.732541 L264.687845,707.732541 L265.21609,713.641507 C265.273297,714.144378 265.700046,714.524069 266.206146,714.522685 L267.562514,714.522685 C268.069076,714.524069 268.495363,714.14484 268.552571,713.641507 L269.067437,707.736232 L271.779711,707.736232 C272.153404,707.732541 272.454666,707.425744 272.450514,707.051589 C272.449591,707.008222 272.445439,706.965317 272.436673,706.922873 L271.518126,703.125965 C271.651456,703.166564 271.791245,703.178098 271.928727,703.160105 C272.504491,703.084905 272.909556,702.557582 272.834818,701.981818 C272.832511,701.96521 272.829282,701.949062 272.826975,701.932915 L270.921601,693.770256 C270.693233,692.785736 269.887255,692.040195 268.887972,691.888873 C268.705277,691.861653 265.072149,691.863037 264.891761,691.888873 C263.892017,692.040195 263.086039,692.785736 262.85721,693.770256 L260.931998,701.932915 C260.834191,702.504989 261.218034,703.047997 261.790108,703.145803 C261.806716,703.148571 261.823325,703.150878 261.840395,703.153185 Z M253.249142,694.237603 C253.249142,692.955974 254.288102,691.917015 255.569731,691.917015 C256.850899,691.917015 257.89032,692.955974 257.89032,694.237603 C257.89032,695.519233 256.850899,696.558192 255.569731,696.558192 C254.28764,696.558653 253.249142,695.519233 253.249142,694.237603 L253.249142,694.237603 Z M251.707773,705.817018 C251.8125,705.830397 251.919533,705.822092 252.021491,705.790721 L251.323008,708.700453 C251.265339,708.980953 251.447111,709.255456 251.728073,709.313125 C251.759906,709.319584 251.794046,709.323275 251.827263,709.323736 L253.888573,709.323736 L254.292254,713.848192 C254.337005,714.232957 254.663179,714.524069 255.050713,714.522685 L256.089211,714.522685 C256.477206,714.524069 256.80338,714.233419 256.847669,713.848192 L257.241662,709.326504 L259.318197,709.326504 C259.604695,709.323736 259.834447,709.088909 259.83214,708.802411 C259.83214,708.769194 259.828449,708.735977 259.821529,708.703682 L259.118894,705.796718 C259.219929,705.827629 259.327424,705.836394 259.433073,705.822554 C259.873662,705.764885 260.183688,705.361204 260.126481,704.920615 C260.125097,704.908159 260.12279,704.895702 260.120945,704.882785 L258.660773,698.631959 C258.485922,697.878113 257.869097,697.306962 257.103718,697.191625 C256.963929,697.170864 254.181991,697.172248 254.043125,697.191625 C253.278207,697.306962 252.660922,697.878113 252.485147,698.631959 L251.011597,704.882323 C250.936858,705.320605 251.231199,705.736743 251.66902,705.811481 C251.682399,705.813327 251.694394,705.815633 251.707773,705.817018 Z M279.172839,691.07459 C280.84477,691.07459 282.200215,689.719607 282.200215,688.047214 C282.200215,686.375283 280.84477,685.019838 279.172839,685.019838 C277.502753,685.019838 276.147769,686.372976 276.145463,688.043523 C276.145463,689.716377 277.500446,691.072745 279.172839,691.07459 Z M274.491524,700.322344 C274.579181,701.148621 275.130955,701.852179 275.911558,702.135909 L277.166429,713.661345 C277.222714,714.163294 277.647156,714.542523 278.152795,714.542984 L280.139366,714.542984 C280.644544,714.542984 281.068986,714.163755 281.125732,713.661345 L282.383371,702.135909 C283.181044,701.866942 283.751272,701.162 283.848156,700.325573 L284.594158,694.722021 C284.752862,693.315366 283.742045,692.046193 282.33539,691.887027 C282.239891,691.876416 282.14393,691.87088 282.04797,691.87088 L276.298169,691.87088 C274.884594,691.869034 273.737218,693.013643 273.735372,694.427679 C273.734911,694.525486 273.74137,694.624214 273.752904,694.722482 L274.491524,700.322344 Z M289.702221,696.81055 C290.965396,696.81055 291.989593,695.786815 291.989593,694.523179 C291.989593,693.260004 290.965396,692.235807 289.702221,692.235807 C288.44043,692.235807 287.416695,693.258158 287.41485,694.520872 C287.41485,695.784047 288.439046,696.809628 289.702221,696.81055 Z M286.165054,703.798152 C286.231949,704.422819 286.648548,704.954294 287.238614,705.168821 L288.186688,713.877257 C288.229593,714.256486 288.54977,714.542984 288.931306,714.542984 L290.432999,714.542984 C290.814074,714.542984 291.134712,714.256025 291.177617,713.877257 L292.127998,705.168821 C292.73052,704.965366 293.161882,704.432969 293.234314,703.80092 L293.798083,699.567114 C293.918495,698.504165 293.154039,697.545019 292.092012,697.424607 C292.020042,697.416302 291.94761,697.412612 291.874255,697.412612 L287.530187,697.412612 C286.462624,697.411689 285.595748,698.276258 285.594826,699.344282 C285.594364,699.41856 285.598978,699.492837 285.607282,699.567114 L286.165054,703.798152 Z" id="Icono_Familia"></path>
                </g>
            </g>
        </svg>
        <h4 style="color: #EE364D;display: inline-block; padding-left: 20px"><?php echo $at[get_att_name('Number of families prior to 2014') . '_num']  ?></h4>
      </li>
      <li><?php echo $at[get_att_name('Number of families prior to 2014')]  ?></li>
    </ul>

    <ul class="nineveh-general-content__list">
      <li><h4><?php echo $at[get_att_name('Number of Christians Returned') . '_num']  ?></h4></li>
      <li><?php echo $at[get_att_name('Number of Christians Returned')]  ?></li>
    </ul>

    <ul class="nineveh-general-content__list">
      <li><h4><?php echo $at[get_att_name('Families returned to Nineveh Plains') . '_num']  ?></h4></li>
      <li>
        <h4><?php echo $at[get_att_name('Families returned to Nineveh Plains') . '_percentage'] ?></h4>

        <img src="<?php echo wp_get_attachment_url($at[get_att_name('Families returned to Nineveh Plains') . '_graph']);  ?>" style="max-width: 300px;" />

        <?php echo $at[get_att_name('Families returned to Nineveh Plains')]  ?>
      </li>
    </ul>
	</div>
</div>

	<?php foreach($contents as $cont): ?>
		<?php require('points_content.php') ?>
	<?php endforeach; ?>
</div>

<?php
return ob_get_clean();
}

add_shortcode( 'acn_fullpage_slide_points', 'acn_fullpage_slide_points_sc' );
