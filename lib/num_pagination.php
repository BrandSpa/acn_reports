<?php

function numPaginationPll($current = 0) {
	$pages = 0;
	$links = [];

	if(function_exists('pll_count_posts') && function_exists('pll_current_language')){
		 $pages = ceil(pll_count_posts(pll_current_language()) / 10);
	} 

	if($pages <= 1) {
		return $links;
	}

	if ( $pages >= 3 ) {
		$links[] = $pages - 1;
		$links[] = $pages - 2;
	}

	if ( ( $pages + 2 ) <= $max ) {
		$links[] = $pages + 2;
		$links[] = $pages + 1;
	}

	return $links;
}