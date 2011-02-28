<?php
// Include the definition of noodle_theme_get_default_settings().
include_once './' . drupal_get_path('theme', 'noodle') . '/template.theme-registry.inc';


/**
 * Implementation of THEMEHOOK_settings() function.
 *
 * @param $saved_settings
 *   An array of saved settings for this theme.
 * @param $subtheme_defaults
 *   Allow a subtheme to override the default values.
 * @return
 *   A form array.
 */
function noodle_settings($saved_settings, $subtheme_defaults = array()) {

  // Add the form's CSS
  //## drupal_add_css(drupal_get_path('theme', 'noodle') . '/theme-settings.css', 'theme');

  // Add javascript to show/hide optional settings
  //## drupal_add_js(drupal_get_path('theme', 'noodle') . '/theme-settings.js', 'theme');

  // Get the default values from the .info file.
  $defaults = noodle_theme_get_default_settings('noodle');

  // Allow a subtheme to override the default values.
  $defaults = array_merge($defaults, $subtheme_defaults);

  // Merge the saved variables and their default values.
  $settings = array_merge($defaults, $saved_settings);

  /*
   * Create the form using Forms API
   */
  $form['noodle-div-opening'] = array(
    '#value'         => '<div id="noodle-settings">',
  );

  $form['themedev'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Theme development settings'),
    '#attributes'    => array('id' => 'noodle-themedev'),
  );
  $form['themedev']['noodle_rebuild_registry'] = array(
    '#type'          => 'checkbox',
    '#title'         => t('Rebuild theme registry on every page.'),
    '#default_value' => $settings['noodle_rebuild_registry'],
    '#description'   => t('During theme development, it can be very useful to continuously <a href="!link">rebuild the theme registry</a>. WARNING: this is a huge performance penalty and must be turned off on production websites.', array('!link' => 'http://drupal.org/node/173880#theme-registry')),
    '#prefix'        => '<div id="div-noodle-registry"><strong>' . t('Theme registry:') . '</strong>',
    '#suffix'        => '</div>',
  );

  $form['noodle-div-closing'] = array(
    '#value'         => '</div>',
  );

  // Return the form
  return $form;
}
