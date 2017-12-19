<?php

function getNavArr($locationName) {

  if(isset(get_nav_menu_locations()[$locationName])) {
    $menuId = get_nav_menu_locations()[$locationName];
    return json_encode(wp_get_nav_menu_items($menuId));
  } else {
    return json_encode(array());
  }
}
