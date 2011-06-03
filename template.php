<?php
/**
 * Implementation of hook_preprocess_page.
 */ 
function aarhus_mobile_preprocess_page(&$vars) {
  // Don't display empty help from node_help().
  if ($vars['help'] == "<div class=\"help\"> \n</div>") {
    $vars['help'] = '';
  }

  // Set variables for the logo and site_name.
  if (isset($vars['logo'])) {
    // Return the site_name even when site_name is disabled in theme settings.
    $vars['logo_alt_text'] = (!isset($vars['logo_alt_text']) ? variable_get('site_name', '') : $vars['logo_alt_text']);
    $vars['site_logo'] = '<a class="site-logo" href="'. $vars['front_page'] .'" title="'. t('Home page') .'" rel="home"><img src="'. $vars['logo'] .'" alt="'. $vars['logo_alt_text'] .'" /></a>';
  }   

}
