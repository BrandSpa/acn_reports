<?php

function getLangTag() {
  if(function_exists("pll_current_language")) {

    switch (pll_current_language("name")) {
      case 'Español':
        return 'SPANISH';
        break;
      case 'Deutsch':
        return 'GERMAN';
        break;
      case 'Nederlands':
        return 'DUTCH';
        break;
      case 'Português':
        return 'PORTUGUESE';
      break;
      case 'Français':
        return 'FRENCH';
        break;
      case 'Italiano':
        return 'ITALIAN';
        break;
      default:
        return 'ENGLISH';
        break;
    }
  }

  return '';
}
