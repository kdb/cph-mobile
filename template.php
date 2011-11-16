<?php
/**
 * Implementation of hook_preprocess_page.
 */ 
function cph_mobile_preprocess_page(&$vars) {
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

/**
 * Implementation of hook_theme.
 */
function cph_mobile_theme() {
  return array(
    'user_login' => array(
      'arguments' => array('form' => NULL),
    ),
    'ting_search_form' => array(
    'arguments' => array('form' => NULL),
    ),
  );
}

/**
 * Theme function used to change the login box.
 *
 * Alternator hiddes some information, that we do not... so we overwrite it here.
 */
function cph_mobile_user_login($form) {
  return drupal_render($form);
}

/**
 * Theme function that can be used to remove stuff form the search form. The
 * h2 headline can be disabled on the block for current theme.
 */
function cph_mobile_ting_search_form($form){
  // remove example text
  unset($form['example_text']);

  // Change submit button from input[type=submit] to submit[type=image]
  $form['submit']['#type'] = 'image_button';
  $form['submit']['#attributes']['src'] = "/" . drupal_get_path('theme', 'cph_mobile') . "/images/button-search.png";
  
  return drupal_render($form);
}