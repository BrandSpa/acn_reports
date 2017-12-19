<?php
function clean_menu($nav) {
  $menu = preg_replace( array( '#^<div[^>]*>#', '#</div>$#' ), '', $nav );
  return preg_replace( array( '#^<ul[^>]*>#', '#</ul>$#' ), '', $menu );
}
